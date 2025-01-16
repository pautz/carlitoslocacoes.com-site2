<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cálculo de Preços</title>
</head>
<body>
    <a href="welcome.php" class="btn btn-primary btn-xl">Início</a>
    <canvas id="qrcode"></canvas>

    <form id="calculoForm" method="post">
        <div class="page-header">
            <h1>Olá, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>Seja Bem Vindo.</h1>
            <input type="hidden" name="eq_user" required placeholder="Nome do cadastrante" value="<?php echo htmlspecialchars($_SESSION["username"]); ?>" id="input-hidden" readonly>
        </div>
        1 TYU = 1.54 reais<br>
        <label for="qtu">TYU:</label>
        <input type="text" id="qtu" name="qtu">
        <br>
        <button type="submit">Calcular</button>
    </form>
</body>
</html>
<?php
// Initialize the session
session_start();

// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Check if the user is logged in, if not then redirect him to login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: login.php");
    exit;
}

// Functions
function salvarDadosNoBanco($precoTotal)
{
    $host = 'localhost';
    $user = '';
    $password = '';
    $database = '';
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

$enderecoIota = 'iota1qpg8a6dr4zlegluepxkasaxddsu7pxr4rlpcjskg8ph6kj9nkf6dys2jt69';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $qtu = floatval($_POST['qtu']);
    $precoTotal = $qtu * 1.54;

    echo "
    <div id='resultado'>
        <p>{$qtu} TYU</p>
        <p>Preço total: {$precoTotal} reais</p>
    </div>";

    // Save data to the database
    salvarDadosNoBanco($precoTotal);

    // Generate QR code for deposit
    echo "
    <script src='https://cdn.jsdelivr.net/npm/qrcode@1.4.4/build/qrcode.min.js'></script>
    <div id='qrcode'><script>
        const enderecoIota = '{$enderecoIota}';
        const precoTotal = parseFloat('{$precoTotal}').toFixed(8);
        
        const qrData = `iota:${enderecoIota}?amount=${precoTotal}`;
        const qrDiv = document.getElementById('qrcode');
        if (qrDiv) {
            QRCode.toCanvas(document.getElementById('qrcode'), qrData, function (error) {
                if (error) console.error(error)
                console.log('success!');
            });
        } else {
            console.error('Elemento com ID \"qrcode\" não encontrado.');
        }
    </script></div>
    
    ";
}
?>


