<?php
session_start();

$con = mysqli_connect('localhost:3307','root','abcd1234','coisasemprestadas') or die('Não foi possível conectar!');

$email = mysqli_real_escape_string($con, $_POST['email']);
$senha = mysqli_real_escape_string($con, $_POST['senha']);

$sel = "SELECT idUser from usuarios where email='{$email}'";
$select = mysqli_query($con, $sel);

if(mysqli_num_rows($select) == 1){
	if($senha <> $_POST['confirmasenha']){
		$_SESSION['senha_errada'] = true;
		header('Location: esqueceu_senha.php');
		exit();
	}else{
		$senhanova = "UPDATE usuarios SET senha = md5('{$senha}') WHERE email = '$email'";
		$insert = mysqli_query($con, $senhanova);
			if($insert){
				header('Location: login.php');
				exit();
			}
	}
	
		
}
else{
	$_SESSION['nao_autenticado'] = true;
	header('Location: esqueceu_senha.php');
	exit();
}

?>