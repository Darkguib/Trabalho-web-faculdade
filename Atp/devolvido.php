<?php
include('verifica_login.php');
$con = mysqli_connect('localhost:3307','root','abcd1234','coisasemprestadas') or die('Não foi possível conectar!');
$email = $_SESSION['email'];

$sel = "SELECT * FROM itensEmprestados INNER JOIN usuarios 
ON itensEmprestados.idUser = usuarios.idUser where email = '$email' ";
$query = mysqli_query($con, $sel);
$rows = mysqli_fetch_assoc($query);

$dataAtual = date('Y-m-d');   
$nome = $rows['nomeitem'];
$idUser = $rows['idUser'];           
$id = $rows['id'];
$insert = "INSERT INTO devolvido(idUser ,nomeitem, dataDevolvido) 
VALUES('$idUser' ,'$nome', '$dataAtual')";
$insertquery = mysqli_query($con, $insert);

$remove = "DELETE FROM itensEmprestados WHERE id = '$id'";
$removequery = mysqli_query($con, $remove);
header('Location: itens_emprestados.php');
exit();
                
?>