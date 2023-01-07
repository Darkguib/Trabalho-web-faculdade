<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="estilo.css">
	<link rel="website icon" type="png" href="imagens/logomini.png">
	<title>Itens emprestados</title>
</head>
<body>
	<div id="principal">
<?php
include('verifica_login.php');
$con = mysqli_connect('localhost:3307','root','abcd1234','coisasemprestadas') or die('Não foi possível conectar!');
$email = $_SESSION['email'];
?>		
		<div id="header"><img src="imagens/logo.png">
			<div id="nav">
				<a href="menu.php">HOME</a>|
				<a href="config-dados.php">ALTERAR SEUS DADOS</a>|
				<a href="sair.php">SAIR</a>
			</div>
		</div>
        <div id="itens_emprestados">
            <div class="header_itens">
            <h3> ITENS EMPRESTADOS </h3>
            </div>
            <div class="textoconta">
                <?php
                $sel = "SELECT * FROM itensEmprestados INNER JOIN usuarios 
                ON itensEmprestados.idUser = usuarios.idUser where email = '$email' ";
                $query = mysqli_query($con, $sel);
                while($rows = mysqli_fetch_assoc($query)){?>
                <h3>Item: <?php echo $rows['nomeitem']?><br>
                Quem pegou emprestado: <?php echo $rows['nomepessoa']?><br>
                Data que foi emprestado: <?php echo $rows['dataEmprestado']?><br>
                Data de devolução: <?php echo $rows['dataDevolucao']?><br>
                Dias restantes: <?php echo $rows['tempoDevolver']?><br></h3>
                <form method="post" action = "devolvido.php">
                    O item foi devolvido? <input type="submit" name="enviar" value="Sim">
                </form>
              <?php
                }
                ?>
            </div>
        </div>

        <div id="itens_devolvidos">
            <div class="header_itens">
            <h3> ITENS DEVOLVIDOS </h3>
            </div>
            <div class="textoconta">
                <?php
                $sel = "SELECT * FROM devolvido INNER JOIN usuarios 
                ON devolvido.idUser = usuarios.idUser where email = '$email' ";
                $query = mysqli_query($con, $sel);
                while($rows = mysqli_fetch_assoc($query)){?>
                <h3>Item: <?php echo $rows['nomeitem']?><br>
                Data que foi devolvido: <?php echo $rows['dataDevolvido']?><br>
                </h3>
              <?php
                }
                ?>
            </div>
        </div>
	</div>
</body>
</html>