<?php
session_start();
$con = mysqli_connect('localhost:3307','root','abcd1234','coisasemprestadas');

$dataAtual = date('Y-m-d');
$dataFutura = $_POST['datadevolucao'];
$diferenca = strtotime($dataFutura) - strtotime($dataAtual);
$dias = abs($diferenca/(60 * 60)/24);

$email = $_SESSION['email'];

$idUser = "SELECT idUser FROM usuarios WHERE email = '$email'";
$idUserQuery = mysqli_query($con, $idUser);
$rows_id = mysqli_fetch_assoc($idUserQuery);
$id = $rows_id['idUser'];

$item = $_POST['item'];
$nomePessoa = $_POST['nomePessoa'];

$itens = "SELECT * FROM itens INNER JOIN usuarios 
ON itens.idUser=usuarios.idUser WHERE email = '$email' AND id = '$item'";
$resultadoitens = mysqli_query($con, $itens);
$rows_itens = mysqli_fetch_assoc($resultadoitens);
$nomeitem = $rows_itens['nomeitem'];


if($_POST['envia'] == 'Enviar'){
    $insert = "INSERT INTO itensEmprestados(idItem, dataDevolucao, dataEmprestado,nomepessoa, idUser, tempoDevolver, nomeitem) 
    VALUES ('$item', '$dataFutura', '$dataAtual','$nomePessoa', '$id', '$dias','$nomeitem')";
    $query = mysqli_query($con, $insert);
    header('Location: menu.php');
    exit();
}


?>