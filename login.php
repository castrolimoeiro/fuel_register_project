<?php
// conection
require_once 'db_connect.php';

// session
session_start();

// botão enviar
if(isset($_POST['btn-entrar'])):
    $erros= array();
    $login = mysqli_escape_string($connect, $_POST['login']);
    $senha = mysqli_escape_string($connect, $_POST['senha']);

    if(empty($login) or empty($senha)):
        $erros[] = "<li> O campo login/senha precisa ser preenchido. </li>";
    else:
        $sql = "SELECT login FROM usuarios WHERE login = '$login'";
        $resultado = mysqli_query($connect, $sql);

        if(mysqli_num_rows($resultado) > 0):
            $senha = md5($senha);
            $sql = "SELECT * FROM usuarios WHERE login = '$login' AND senha = '$senha'";
            $resultado = mysqli_query($connect, $sql);
                
                if(mysqli_num_rows($resultado) == 1):
                    $dados = mysqli_fetch_array($resultado);
                    mysqli_close($connect);
                    $_SESSION['logado'] = true;
                    $_SESSION['id_usuario'] = $dados['id'];
                    header('Location: home.php');
                else:
                    $erros[] = "<li>Usuário ou senha incorretos</li>";
                endif;

        else:
            $erros[] = "<li> Usuário inexistente </li>";
        endif;
    endif;
endif;
?>

<!DOCTYPE html>
<html lang="en">
<head>

    
    <title>Login</title>
</head>
<body>
    <?php include_once 'includes/header.php';?>
    
    <div align="center">
    <h1> Login </h1>
    </div>
    <?php
    if(!empty($erros)):
        foreach($erros as $erro):
            echo $erro;
        endforeach;
    endif;
    ?>
    <hr>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
        <div widht=100px>
        Login: <input type="text" name="login"><br>
        Senha: <input type="password" name="senha"><br><br>
        </div>
    <button type="submit" name="btn-entrar">Entrar</button>
    <?php include_once 'includes/footer.php';?>
    </form>
</body>
</html>