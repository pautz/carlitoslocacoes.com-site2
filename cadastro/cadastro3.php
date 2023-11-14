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
$chassi=$_POST['chassi'];
$adesivo=$_POST['adesivo'];
$locado=$_POST['locado'];
$cv=$_POST['cv'];
$ano=$_POST['ano'];
$telefone=$_POST['telefone'];
$placa=$_POST['placa'];
$estado=$_POST['estado'];
$cidade=$_POST['cidade'];
$modelo=$_POST['modelo'];
$sql1=mysqli_query($conn, "INSERT INTO respostas (chassi, tipo, adesivo, locado, cv, ano, placa, estado, cidade, telefone, modelo)VALUES('$chassi', '$tipo', '$adesivo', '$locado', '$cv', '$ano', '$placa', '$estado', '$cidade', '$telefone', '$modelo')");

?>

<center>
<FONT FACE="Times New Roman" SIZE="5" COLOR="black">Enviado com sucesso! Aguarde um instante.<br />
<META HTTP-EQUIV="REFRESH" CONTENT="3; URL=https://127.0.0.1/site/nossasmaquinas">


</center>
</body>
</html>
