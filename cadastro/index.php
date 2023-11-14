<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.css">
<title>Cadastro de Veiculos</title>
</head>
<body>
<body background="" bgproperties="fixed">
<center><h2>Cadastro de Veiculos</h2></center>
<hr />
<form method="post" ACTION="cadastro3.php">
<script language='JavaScript'>

  function only_number(){

    if(event.keyCode<48 || event.keyCode>57)

      event.returnValue=false;

  }

</script>
<center>
    <FONT FACE="Times New Roman" SIZE="5" COLOR="black">Tipo:<br /> <input type="text" name="tipo" placeholder="Exemplo: Trator, Retro, Outros."<br /><br /><br /></FONT>
    
<FONT FACE="Times New Roman" SIZE="5" COLOR="black">N&uacute;mero do Chassi:<br /> <input type="text" name="chassi" OnKeyPress='only_number()' placeholder="Informe o n&uacute;mero do chassi."<br /><br /><br /></FONT>

<FONT FACE="Times New Roman" SIZE="5" COLOR="black">N&uacute;mero do Adesivo:<br /><input type="text" name="adesivo" OnKeyPress='only_number()' required placeholder="Informe o n&uacute;mero do adesivo."<br /><br /><br /></FONT>

<FONT FACE="Times New Roman" SIZE="5" COLOR="black">Locado:
<form>
<select name=locado>

<option name=yes value="Sim">Sim</option>
<option name=no value="Nao">Nao</option>
</select>
</form>

<br /><br />


<FONT FACE="Times New Roman" SIZE="5" COLOR="black">N&uacute;mero para contato:<br /><input type="text" name="telefone" OnKeyPress='only_number()' required placeholder="Informe o n&uacute;mero de contato."<br /><br /><br /></FONT>

<FONT FACE="Times New Roman" SIZE="5" COLOR="black">N&uacute;mero de Cavalos:<br /><input type="text" name="cv" OnKeyPress='only_number()' required placeholder="Informe o n&uacute;mero de cavalos."<br /><br /><br /></FONT>

<FONT FACE="Times New Roman" SIZE="5" COLOR="black">Ano:<br /><input type="text" name="ano" OnKeyPress='only_number()' required placeholder="Informe o ano do veiculo."<br /><br /><br /></FONT>
<FONT FACE="Times New Roman" SIZE="5" COLOR="black">Placa:<br /><input type="text" name="placa" required placeholder="Informe a placa do veiculo."<br /><br /><br /></FONT>
<FONT FACE="Times New Roman" SIZE="5" COLOR="black">Estado:<br /><input type="text" name="estado" required placeholder="Informe o estado onde se encontra o veiculo."<br /><br /><br /></FONT>
<FONT FACE="Times New Roman" SIZE="5" COLOR="black">Cidade:<br /><input type="text" name="cidade" required placeholder="Informe a cidade onde se encontra o veiculo."<br /><br /><br /></FONT>
<FONT FACE="Times New Roman" SIZE="5" COLOR="black">Modelo:<br /><input type="text" name="modelo" required placeholder="Informe o modelo do veiculo."<br /><br /><br /></FONT>



<INPUT TYPE="submit" VALUE="Enviar"> 
<form>
<input type="button" value="Voltar" onClick="JavaScript: window.history.back();">
</form>
<form>
</center>
</body>
</html>