<?php
session_start();
require_once 'db_connect.php';

if(isset($_POST['btn-cadastrar'])):
    $nome = mysqli_escape_string($connect, $_POST['nome']);
    $sobrenome = mysqli_escape_string($connect, $_POST['sobrenome']);
    $email = mysqli_escape_string($connect, $_POST['email']);

    $query = "INSERT INTO testeapiphp (Nome, Sobrenome, Email) 
              VALUES 
              ('$nome', '$sobrenome', '$email')";

    if(mysqli_query($connect, $query)):
        $_SESSION['mensagem'] = "Cadastrado com sucesso";
        header("Location: ../index.php");
    else:
        $_SESSION['mensagem'] = "Erro ao cadastrar";
        header("Location: ../index.php");
    endif;
endif;
?>