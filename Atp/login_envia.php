<?php
session_start();

$con = mysqli_connect('localhost:3307','root','abcd1234','coisasemprestadas') or die('Não foi possível conectar!');

if(empty($_POST['email']) || empty($_POST['senha'])){
	header('Location: login.php');
	exit();
}
	
$email = mysqli_real_escape_string($con, $_POST['email']);
$senha = mysqli_real_escape_string($con, $_POST['senha']);


$sel = "SELECT idUser from usuarios where email='{$email}'AND senha= md5('{$senha}')";
$select = mysqli_query($con, $sel);
	
if(mysqli_num_rows($select) == 1){
	$_SESSION['email'] = $email;
	header('Location: menu.php');
	exit();
		
}
else{
	$_SESSION['nao_autenticado'] = true;
	header('Location: login.php');
	exit();
}
	
	
?>
