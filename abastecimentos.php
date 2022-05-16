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

<div class="row">
    <div class="col s12 m4 push-m2-container"></div>
    <h3 class="light">Abastecimentos</h3>
        <table class="tabela">
            <thead>
                <tr>
                    <th>Veículo</th>
                    <th>Km</th>
                    <th>Valor</th>
                    <th>Litros</th>
                    <th>Saldo Restante (R$)</th>
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
                    <td><?php echo"R$ ". $dados['valor']?></td>
                    <td><?php echo $dados['litros']?></td>
                    <td><?php echo "R$ ". $dados['saldo']?></td>
                    <td><a href="edit.php?id=<?php echo $dados['id']?>" class="btn-floating orange"><i class="material-icons">
                        edit
                    </i></a></td>
                    <td><a href="" class="btn-floating red"><i class="material-icons">
                        delete
                    </i></a></td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
<style>
    .tabela {
        box-sizing: border-box;
        border: ;
        width: 95%;
        float: right;
    }

</style>
</div>