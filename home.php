<?php
// conection
require_once 'db_connect.php';

// session
session_start();

//verification
if(!isset($_SESSION['logado'])):
    header('Location: login.php');
endif;
?>

<?php
    $id = $_SESSION['id_usuario'];
    $sql = "SELECT * FROM usuarios WHERE id = '$id'";
    $resultado = mysqli_query($connect, $sql);
    $dados = mysqli_fetch_array($resultado);
    mysqli_close($connect);
?>

<nav>
    <div class="nav-wrapper">
      <a href="home.php" class="brand-logo"><h5 class="light">Olá, <?php echo $dados['nome']; ?></h5>
      <ul id="nav-mobile" class="right hide-on-med-and-down">
        <li><a href="home.php">Início</a></li>
        <li><a href="abastecimentos.php">Abastecimentos</a></li>
        <li><a href="logout.php">Sair</a></li>
      </ul>
    </div>
</nav>
<style>
    .nav-wrapper {       
       border-left: 10px solid darkblue;
       background: darkblue;
    }
</style>

<!DOCTYPE html>
<html lang="pt-br">
<head>
<?php include_once 'includes/header.php';?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>home</title>
    


</head>
<body>    
    <br>    

    <div class="row" widht=100px>
        <div class="col s12 m6 push-m3">
            <form action="php_action/create.php" method="POST">
                <div class="input-field col s12">
                    <input type="text" name="veiculo" id="veiculo">
                    <label for="veiculo">Veículo</label>
                </div>

                <div class="input-field col s12">
                    <input type="text" name="km" id="km">
                    <label for="km">Km</label>                  
                </div>

                <div class="input-field col s12">
                    <input type="text" name="valor" id="valor">
                    <label for="valor">Valor</label>                  
                </div>

                <div class="input-field col s12">
                    <input type="text" name="litros" id="litros">
                    <label for="litros">Litros</label>                  
                </div>

                <div class="input-field col s12">
                    <input type="text" name="saldo" id="saldo">
                    <label for="saldo">Saldo Restante</label>                  
                </div>
                <button type="submit" name="btn-enviar" class="btn">Enviar</button>
            </form> 
             
        </div>
    </div>

<?php include_once 'includes/footer.php';?>
</body>
</html>