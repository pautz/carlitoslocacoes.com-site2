<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Enviando dados</title>
</head>

<body>
<?php

 $dbhost = "localhost";
 $dbuser = "root";
 $dbpass = "";
 $db = "createaccount";
 $conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s\n". $conn -> error);
$tipo=$_POST['tipo'];

$cv=$_POST['cv'];
$ano=$_POST['ano'];
$telefone=$_POST['telefone'];
$modelo=$_POST['modelo'];
$estado=$_POST['estado'];
$cidade=$_POST['cidade'];
$eq_user=$_POST['eq_user'];
$sql1=mysqli_query($conn, "INSERT INTO respostas (eq_user, tipo, modelo, cv, ano, estado, cidade, telefone)VALUES('$eq_user', '$tipo', '$modelo', '$cv', '$ano', '$estado', '$cidade', '$telefone')");

?>

<center>
<FONT FACE="Times New Roman" SIZE="5" COLOR="black">Enviado com sucesso! Aguarde um instante.<br />
<META HTTP-EQUIV="REFRESH" CONTENT="3; URL=https://127.0.0.1/site/cadastrar.php">


</center>
</body>
</html>