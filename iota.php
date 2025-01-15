<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}

// Functions
function calcularValores($o_t, $p_y, $q_u) {
    $o_tyu = $o_t;
    $p_tyu = $p_y * 60;
    $q_tyu = $q_u * 3600;
    return [$o_tyu, $p_tyu, $q_tyu];
}

function calcularPrecos($o_tyu, $p_tyu, $q_tyu, $precoPorSegundo = 0.0083) {
    $preco_o_tyu = $o_tyu * $precoPorSegundo;
    $preco_p_tyu = $p_tyu * $precoPorSegundo;
    $preco_q_tyu = $q_tyu * $precoPorSegundo;
    return [$preco_o_tyu, $preco_p_tyu, $preco_q_tyu];
}

function salvarDadosNoBanco($precoTotal) {
    $host = 'localhost';
    $user = 'SEUUSER';
    $password = 'SEUPWD';
    $database = 'SUADB';
    $mysqli = new mysqli($host, $user, $password, $database);

    if ($mysqli->connect_error) {
        die('Erro de conexão: ' . $mysqli->connect_error);
    }

    $username = htmlspecialchars($_SESSION["username"]);
    $stmt = $mysqli->prepare('INSERT INTO respostas (preco_total, eq_user) VALUES (?, ?)');
    $stmt->bind_param('ds', $precoTotal, $username);
    $stmt->execute();

    if ($stmt->error) {
        echo 'Erro: ' . $stmt->error;
    } else {
        echo 'Dados salvos no banco de dados com sucesso!';
    }

    $stmt->close();
    $mysqli->close();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $o_t = floatval($_POST['o_t']);
    $p_y = floatval($_POST['p_y']);
    $q_u = floatval($_POST['q_u']);

    [$o_tyu, $p_tyu, $q_tyu] = calcularValores($o_t, $p_y, $q_u);
    [$preco_o_tyu, $preco_p_tyu, $preco_q_tyu] = calcularPrecos($o_tyu, $p_tyu, $q_tyu);
    $precoTotal = $preco_o_tyu + $preco_p_tyu + $preco_q_tyu;
    $tyus = ($o_tyu/60+$p_tyu/60+$q_tyu/60)/3;
    echo "
    <div id='resultado'>
        <p>o_tyu: {$o_tyu} s</p>
        <p>p_tyu: {$p_tyu} s</p>
        <p>q_tyu: {$q_tyu} s</p>
        <p>Preço de o_tyu: {$preco_o_tyu} reais</p>
        <p>Preço de p_tyu: {$preco_p_tyu} reais</p>
        <p>Preço de q_tyu: {$preco_q_tyu} reais</p>
        <p>Tyus: {$tyus} tyus</p>
        <p>Preço total: {$precoTotal} reais</p>
    </div>
    <div id='qrcode'></div>
    <script src='https://cdn.jsdelivr.net/npm/qrcode/build/qrcode.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/crypto-js/3.1.9-1/crypto-js.js'></script>
    <script>
        const enderecoIota = 'iota1qpg8a6dr4zlegluepxkasaxddsu7pxr4rlpcjskg8ph6kj9nkf6dys2jt69';
        const precoTotal = {$precoTotal}.toFixed(8);

        const qrData = 'iota:' + enderecoIota + '?amount=' + precoTotal;
        QRCode.toDataURL(qrData, function (err, url) {
            if (err) throw err;
            const qrDiv = document.getElementById('qrcode');
            qrDiv.innerHTML = '<img src=\"' + url + '\">';
        });

        async function realizarPagamento() {
            const apiKey = 'SUAAPIAQUI'; //API KEY BINANCE APAGAR //
            const apiSecret = 'SUASECRETAQUI'; //API SECRET BINANCE APAGAR //
            const timestamp = Date.now();
            const query = `coin=IOTA&address=${enderecoIota}&amount=${precoTotal}&timestamp=${timestamp}`;
            const signature = CryptoJS.HmacSHA256(query, apiSecret).toString(CryptoJS.enc.Hex);
            const url = `https://api.binance.com/sapi/v1/capital/withdraw/apply?${query}&signature=${signature}`;

            const response = await fetch(url, {
                method: 'POST',
                headers: {
                    'X-MBX-APIKEY': apiKey
                }
            });

            const result = await response.json();
            console.log(result);
        }

        realizarPagamento();
    </script>
    ";

    salvarDadosNoBanco($precoTotal);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <br>
    <a href="welcome.php" class="btn btn-primary btn-xl">Início</a>
    <title>Cálculo de Preços</title>
</head>
<body>
        <form id="calculoForm" method="post">
         <div class="page-header">
            <h1>Olá, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>. Seja Bem Vindo.</h1>
            <input type="text" name="eq_user" required placeholder="Nome do cadastrante" value="<?php echo htmlspecialchars($_SESSION["username"]); ?>" id="input-hidden" readonly>
        </div>
        10 tyus = 30 Minutos = 1800s = 14.94 R$<br>
        <label for="o_t">Segundos (o_t):</label>
        <input type="text" id="o_t" name="o_t">
        <br>
        <label for="p_y">Minutos (p_y):</label>
        <input type="text" id="p_y" name="p_y">
        <br>
        <label for="q_u">Horas (q_u):</label>
        <input type="text" id="q_u" name="q_u">
        <br>
        <button type="submit">Calcular</button>
    </form>
</body>
</html>
