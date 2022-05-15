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
<div class="row">
    <div class="col s12 m4 push-m2"></div>
    <h3 class="light">Abastecimentos</h3>
        <table class="striped">
            <thead>
                <tr>
                    <th>Veículo</th>
                    <th>Km</th>
                    <th>Valor</th>
                    <th>Litros</th>
                    <th>Saldo Restante</th>
                </tr>
            </thead>

            <tbody>
                <?php
                $sql = "SELECT * FROM abastecimento";
                $resultado = mysqli_query($connect, $sql);
                while($dados = mysqli_fetch_array($resultado)):
                ?>
                <tr>
                    <td><?php echo $dados['veiculo']?></td>
                    <td><?php echo $dados['km']?></td>
                    <td><?php echo $dados['valor']?></td>
                    <td><?php echo $dados['litros']?></td>
                    <td><?php echo $dados['saldo']?></td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>

</div>