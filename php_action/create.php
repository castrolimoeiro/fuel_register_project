<?php
//session
session_start();
// conection
require_once '../db_connect.php';

if(isset($_POST['btn-enviar'])):
    $veiculo = mysqli_escape_string($connect, $_POST['veiculo']);
    $km = mysqli_escape_string($connect, $_POST['km']);
    $valor = mysqli_escape_string($connect, $_POST['valor']);
    $litros = mysqli_escape_string($connect, $_POST['litros']);
    $saldo = mysqli_escape_string($connect, $_POST['saldo']);

    $sql = "INSERT INTO abastecimento (veiculo, km, valor, litros, saldo) VALUES ('$veiculo', 
    '$km', '$valor', '$litros', '$saldo')";

    if(mysqli_query($connect, $sql)):
        
        header('Location: ../home.php?sucesso');
    else:
        
        header('Location: ../home.php?erro');
    endif;
endif;