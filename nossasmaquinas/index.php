<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Theme Made By www.w3schools.com - No Copyright -->
    <title>Carlito's Locações - LOCAÇÃO DE EQUIPAMENTOS & PRESTAÇÃO DE SERVIÇOS - Trator, Retroescavadeira, Camionetes.</title>
   <meta property="og:image:secure_url" content="https://127.0.0.1/site/carlitoslocacoes.png">
<meta property="og:image" content="https://127.0.0.1/site/carlitoslocacoes.png">
   
   <META name="title" content="Carlito's Locações tem seu trabalho voltado para a locação de máquinas e equipamentos para linha de transmissão. Empresa localiza-se no Brasil em Palmeira das Missões, Rio Grande do Sul. - LOCAÇÃO DE EQUIPAMENTOS & PRESTAÇÃO DE SERVIÇOS - Tratores, Retroescavadeiras, Camionetes.">
  <META NAME="KEYWORDS" CONTENT="carlitoslocacao,carlitoslocacoes,carlitos,carlitolocacoes,carlitolocacao, carlito's locações, carlito's locação, carlito locação, carlito locações,aluguel de trator, aluguel trator, trator, aluguel, tratores, locacao, locação, locaçao, locacão, camionetes, retroescavadeiras, retro-escavadeiras, linhadetransmissão, tratordepneu, linhadetransmissao, linhasdetransmissao, linhadetransmissões, linhasdetransmissões, linhadetransmissão, newholland, alugueltrator, tratoraluguel, alugeldetratores">
  <META NAME="description" CONTENT="Carlito's Locações tem seu trabalho voltado para a locação de máquinas e equipamentos para linha de transmissão. Empresa localiza-se no Brasil em Palmeira das Missões, Rio Grande do Sul. - LOCAÇÃO DE EQUIPAMENTOS & PRESTAÇÃO DE SERVIÇOS - Tratores, Retroescavadeiras, Camionetes.">
  <META NAME="comment" CONTENT="Carlito's Locações tem seu trabalho voltado para a locação de máquinas e equipamentos para linha de transmissão. Empresa localiza-se no Brasil em Palmeira das Missões, Rio Grande do Sul. - LOCAÇÃO DE EQUIPAMENTOS & PRESTAÇÃO DE SERVIÇOS - Tratores, Retroescavadeiras, Camionetes.">
  <link rel="canonical" href="https://www.127.0.0.1/site/">
<meta name="author" content="Carlito Pautz"> 
<meta name="rating" content="General">
<meta property="og:site_name" content="Carlito's Locações">
<meta property="og:type" content="website">
<meta property="og:region" content="Brasil">
      <meta property="og:title" content="Carlito's Locações tem seu trabalho voltado para a locação de máquinas e equipamentos para linha de transmissão. Empresa localiza-se no Brasil em Palmeira das Missões, Rio Grande do Sul. - LOCAÇÃO DE EQUIPAMENTOS & PRESTAÇÃO DE SERVIÇOS - Tratores, Retroescavadeiras, Camionetes.">
    <script async src='https://securepubads.g.doubleclick.net/tag/js/gpt.js'></script>
  <meta name="robots" content="index, follow" />
    <meta name="googlebot" content="index, follow" />
	 <meta name="geo.position" content="-27.8943674;27.8943674,-53.3135489,19z"> 
      <meta name="geo.placename" content="Palmeira das Missões-RS"> 
      <meta name="geo.region" content="RS-BR">
	  
  <meta name="robots" content="index, follow" />
    <meta name="googlebot" content="index, follow" />
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <style>
  body {
    font: 20px Montserrat, sans-serif;
    line-height: 1.8;
    color: #f5f6f7;
  }
  p {font-size: 16px;}
  .margin {margin-bottom: 45px;}
  .bg-1 { 
    background-image: url("/contato/t.jpg"); /* Green */
    color: #ffffff;
  }
  .bg-2 { 
    background-color: #474e5d; /* Dark Blue */
    color: #ffffff;
  }
  .bg-3 { 
    background-color: #ffffff; /* White */
    color: #4F4F4F;
  }
  .bg-4 { 
    background-color: #4F4F4F; /* Black Gray */
    color: #fff;
  }
  .container-fluid {
    padding-top: 70px;
    padding-bottom: 70px;
  }
  .navbar {
    padding-top: 3px;
    padding-bottom: 3px;
    border: 0;
    border-radius: 0;
    margin-bottom: 0;
    font-size: 11px;
    letter-spacing: 5px;
  }
  .navbar-nav  li a:hover {
    color: #1abc9c !important;
  }
 @import url("http://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css");

.thumbnail {
  display: block;
  padding-bottom: 100%;
  position: relative;
}
.thumbnail > .img-responsive {
  max-width: 100%;
  max-height: 100%;
  position: absolute;
  left: 0;
  right: 0;
  top: 0;
  bottom: 0;
  margin: auto;
}
.column {
  float: center;
  
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}
{
   margin: 0;
   padding: 0;
   -moz-box-sizing: border-box;
   -webkit-box-sizing: border-box;
   box-sizing: border-box;
}
.grid-container {
  display: grid;
  grid-template-columns: auto auto auto auto;
  grid-gap: 10px;
  background-color: #2196F3;
  padding: 10px;
}

.grid-container > div {
  background-color: rgba(255, 255, 255, 0.8);
  text-align: center;
  padding: 20px 0;
  font-size: 30px;
}
  </style>
  

</head>
<body>

<div class="container-fluid bg-3">    
 <center> <h2 class="margin">Nossas Máquinas</h2></center>

    <?php

$cx = mysqli_connect("127.0.0.1", "root", "");
$db = mysqli_select_db($cx, "createaccount");

$sql = mysqli_query($cx, "SELECT * FROM respostas ORDER by id DESC") or die( 
  mysqli_error($cx) //caso haja um erro na consulta 
  );
  
  while($aux = mysqli_fetch_assoc($sql)) { 
  
  echo '<div class="col-xs-12 col-sm-6">';
  echo '<div class="col-xs-12 col-sm-6">';
 echo '</div>';
  echo '<div class="col-xs-12 col-sm-6">';
  echo "<td><h9>ID:</h9></td>".$aux["id"]."<br>";
    echo "<td><h9>Tipo:</h9></td>".$aux["tipo"]."<br>"; 
 echo "<td><h9>Cavalos:</h9></td>".$aux["cv"]."<br>";
  echo "<td><h9>Ano:</h9></td>".$aux["ano"]."<br>"; 
   echo "<td><h9>Modelo:</h9></td>".$aux["modelo"]."<br>";
      echo "<td><h9>Estado:</h9></td>".$aux["estado"]."<br>";
    echo "<td><h9>Cidade:</h9></td>".$aux["cidade"]."<br>"; 
  echo "<br />";
  echo '</div>';

echo '</div>';

  

 
}
  ?>


</div>
</body>
</html>
