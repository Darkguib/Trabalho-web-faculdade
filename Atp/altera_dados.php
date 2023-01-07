<?php
session_start();

$con = mysqli_connect('localhost:3307','root','abcd1234','coisasemprestadas') or die('Não foi possível conectar!');

$email = $_SESSION['email'];


if(!empty($_POST['alterarNome'])){
    $nome = $_POST['alterarNome'];
    $novonome = "UPDATE usuarios SET nome ='{$nome}' WHERE email = '$email'";
    $insert = mysqli_query($con, $novonome);
    $_SESSION['confirmado'] = true;
}
if(!empty($_POST['novoNumero'])){
    $numero = mysqli_real_escape_string($con, $_POST['novoNumero']);
    $novonumero = "UPDATE usuarios SET telefone ='{$numero}' WHERE email = '$email'";
    $insert = mysqli_query($con, $novonumero);
    $_SESSION['confirmado'] = true;
}
if(!empty($_POST['senhaNova']) && !empty($_POST['confirmarSenhanova'])){
    if($_POST['senhaNova'] <> $_POST['confirmarSenhanova']){
        $_SESSION['senha_diferente'] = true;
        header('Location: config-dados.php');
        exit();
    }
    else{
        $senha = mysqli_real_escape_string($con, $_POST['senhaNova']);
        $novasenha = "UPDATE usuarios SET senha= md5('{$senha}') WHERE email = '$email'";
        $insert = mysqli_query($con, $novasenha);
        $_SESSION['confirmado'] = true;
    }
}

header('Location: config-dados.php');
?>