<?php
// conection
require_once 'db_connect.php';

// session
session_start();

//verification
if(!isset($_SESSION['logado'])):
    header('Location: login.php');
endif;

// Data
$id = $_SESSION['id_usuario'];
$sql = "SELECT * FROM usuarios WHERE id = '$id'";
$resultado = mysqli_query($connect, $sql);
$dados = mysqli_fetch_array($resultado);
mysqli_close($connect);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>home</title>
</head>
<body>
    <h3>Olá, <?php echo $dados['nome']; ?></h3>
    <a href="logout.php">Sair</a>
</body>
</html>