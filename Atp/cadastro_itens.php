<?php
session_start();
$con = mysqli_connect('localhost:3307','root','abcd1234','coisasemprestadas');

$nome = $_POST['nome'];
$tipoitem = $_POST['tipoitem'];
$outro = $_POST['outro'];

$email = $_SESSION['email'];

$idUser = "SELECT idUser FROM usuarios WHERE email = '$email'";
$idUserQuery = mysqli_query($con, $idUser);
$rows_id = mysqli_fetch_assoc($idUserQuery);
$id = $rows_id['idUser'];


if($_POST['enviar'] == 'Enviar'){
    if($tipoitem == "outro"){
        $insert = "INSERT INTO itens(nomeitem, tipoitem, outro,idUser) 
        VALUES('$nome', '$tipoitem', '$outro', '$id')";
        $query = mysqli_query($con, $insert);
    }
    else{
        $insert = "INSERT INTO itens(nomeitem, tipoitem, idUser) 
        VALUES('$nome', '$tipoitem', '$id')";
        $query = mysqli_query($con, $insert);
    }
    header('Location: menu.php');
    exit();
}


?>