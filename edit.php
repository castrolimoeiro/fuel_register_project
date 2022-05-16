<?php
// conection
include_once 'db_connect.php';
include_once 'includes/header.php';

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
    
?>




<nav>
    <div class="nav-wrapper">
      <a href="#" class="brand-logo"><h5 class="light">Olá, <?php echo $dados['nome']; ?></h5></a>
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

<?php
    $id = $_SESSION['id_usuario'];
    $sql = "SELECT * FROM usuarios WHERE id = '$id'";
    $resultado = mysqli_query($connect, $sql);
    $dados = mysqli_fetch_array($resultado);

if(isset($_GET['id'])):
    $id = mysqli_escape_string($connect, $_GET['id']);
    $sql = "SELECT * FROM abastecimento WHERE id = '$id'";
    $resultado = mysqli_query($connect, $sql);
    $dados = mysqli_fetch_array($resultado);
endif;
?>

<div class="row">
        <div class="col s12 m6 push-m3">
            <h3 class="light"> Editar Abastecimento </h3>
            <form action="php_action/update.php" method="POST">
                <div class="">
                    <label for="veiculo">Veículo</label>
                    <input type="text" name="veiculo" id="veiculo" value=<?php echo $dados['veiculo']?>>                    
                </div>

                <div class="">
                    <label for="km">Km</label> 
                    <input type="text" name="km" id="km" value=<?php echo $dados['km']?>>                                   
                </div>

                <div class="">
                    <label for="valor">Valor</label>
                    <input type="text" name="valor" id="valor" value=<?php echo $dados['valor']?>>                                      
                </div>

                <div class="">
                    <label for="litros">Litros</label> 
                    <input type="text" name="litros" id="litros" value=<?php echo $dados['litros']?>>                                     
                </div>

                <div class="">
                    <label for="saldo">Saldo Restante</label>
                    <input type="text" name="saldo" id="saldo" value=<?php echo $dados['saldo']?>>                                      
                </div>
                <button type="submit" name="btn-enviar" class="btn">Atualizar</button>
            </form> 
             
        </div>
    </div>