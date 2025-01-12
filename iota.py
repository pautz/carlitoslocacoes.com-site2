import qrcode
import keyboard
from PIL import Image
import mysql.connector
from binance.client import Client

# Configuração da API da Binance
api_key = ''
api_secret = ''

client = Client(api_key, api_secret)

def calcular_valores(o_t, p_y, q_u):
    o_tyu = o_t
    p_tyu = p_y * 60
    q_tyu = q_u * 3600
    return o_tyu, p_tyu, q_tyu

def calcular_precos(o_tyu, p_tyu, q_tyu, preco_por_segundo=0.0083):
    preco_o_tyu = o_tyu * preco_por_segundo
    preco_p_tyu = p_tyu * preco_por_segundo
    preco_q_tyu = q_tyu * preco_por_segundo
    return preco_o_tyu, preco_p_tyu, preco_q_tyu

def salvar_dados_no_banco(preco_total):
    try:
        conexao = mysql.connector.connect(
            host="",
            user="",
            password="",
            database=""
        )

        cursor = conexao.cursor()
        comando_sql = "INSERT INTO respostas (preco_total) VALUES (%s)"
        valores = (preco_total,)
        cursor.execute(comando_sql, valores)
        conexao.commit()
        print("Dados salvos no banco de dados com sucesso!")

    except mysql.connector.Error as err:
        print(f"Erro: {err}")
    
    finally:
        if conexao.is_connected():
            cursor.close()
            conexao.close()

def verificar_pagamento(endereco_iota, preco_total):
    # Verifica o histórico de depósitos da Binance
    depositos = client.get_deposit_history(asset='IOTA')
    for deposito in depositos:
        if deposito['address'] == endereco_iota and float(deposito['amount']) >= preco_total:
            return True
    return False

while True:
    # Introdução
    print("\nBem-vindo! Este script calcula os valores baseados em tempo.")
    print("0.0083 é o preço de apenas 1 segundo.")
    print("0.498 é o preço de um minuto.")
    print("29.88 é o preço de uma hora.\n")

    # Solicita os valores de entrada ao usuário
    try:
        o_t = float(input("Digite o valor em segundos que gostaria (o_t): ").replace(',', '.'))
        p_y = float(input("Digite o valor em minutos que gostaria (p_y): ").replace(',', '.'))
        q_u = float(input("Digite o valor em horas que gostaria (q_u): ").replace(',', '.'))

        # Verifica se os valores são negativos
        if o_t < 0 or p_y < 0 or q_u < 0:
            print("Os valores não podem ser negativos. Por favor, insira valores válidos.\n")
            continue

        # Verifica se todos os valores são zero
        if o_t == 0 and p_y == 0 and q_u == 0:
            print("Todos os valores não podem ser zero. Por favor, insira pelo menos um valor válido.\n")
            continue

    except ValueError:
        print("Entrada inválida. Por favor, insira valores numéricos.\n")
        continue

    # Calcula os valores
    o_tyu, p_tyu, q_tyu = calcular_valores(o_t, p_y, q_u)

    # Calcula os preços
    preco_o_tyu, preco_p_tyu, preco_q_tyu = calcular_precos(o_tyu, p_tyu, q_tyu)
    preco_total = preco_o_tyu + preco_p_tyu + preco_q_tyu

    # Exibe os resultados
    print(f"\no_tyu: {o_tyu} segundos")
    print(f"p_tyu: {p_tyu} segundos")
    print(f"q_tyu: {q_tyu} segundos")

    # Exibe os preços com explicação
    print(f"\nPreço de o_tyu: {preco_o_tyu} reais (calculado com base em {o_tyu} segundos a R$0.0083 por segundo)")
    print(f"Preço de p_tyu: {preco_p_tyu} reais (calculado com base em {p_tyu} segundos a R$0.0083 por segundo)")
    print(f"Preço de q_tyu: {preco_q_tyu} reais (calculado com base em {q_tyu} segundos a R$0.0083 por segundo)")
    print(f"\nPreço total: {preco_total} reais")

    # Solicita confirmação de compra
    print("\nDeseja realizar a compra? (Pressione Enter para confirmar e Esc para voltar ao início)")

    while True:
        if keyboard.is_pressed('enter'):
            # Gera o código QR de pagamento
            endereco_iota = "iota1qpg8a6dr4zlegluepxkasaxddsu7pxr4rlpcjskg8ph6kj9nkf6dys2jt69"
            # Gera o QR Code com os dados corrigidos
            qr_data = f"iota:{endereco_iota}?amount={preco_total:.8f}"  # Formatação adequada
            qr_img = qrcode.make(qr_data)
            qr_img.save("pagamento_iota_qrcode.png")

            # Exibe o código QR na tela
            img = Image.open("pagamento_iota_qrcode.png")
            img.show()

            # Instruções para a confirmação
            print("\nVerifique o código QR e realize o pagamento.")
            print("Pressione Enter para verificar o pagamento ou Esc para voltar ao início.")

            # Aguarda a confirmação do usuário para verificar o pagamento
            while True:
                if keyboard.is_pressed('enter'):
                    # Verifica o pagamento usando a API da Binance
                    print("Verificando o pagamento...")
                    pagamento_confirmado = verificar_pagamento(endereco_iota, preco_total)
                    if pagamento_confirmado:
                        print("Pagamento confirmado com sucesso!")
                        salvar_dados_no_banco(preco_total)
                    else:
                        print("Pagamento não confirmado. Verifique a transação.")
                    break
                elif keyboard.is_pressed('esc'):
                    print("Compra não realizada. Voltando ao início...\n")
                    break
            break

        elif keyboard.is_pressed('esc'):
            print("Compra não realizada. Voltando ao início...\n")
            break

    # Solicita reinício do script
    print("Pressione Esc para voltar ao início do código.")

    while True:
        if keyboard.is_pressed('esc'):
            break
