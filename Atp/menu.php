<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="estilo.css">
	<link rel="website icon" type="png" href="imagens/logomini.png">
	<title>Menu</title>
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
		<div id="itens-emprestados">
			<div id="header-emprestados">
				<h3>ITENS EMPRESTADOS</h3>
			</div>
			<article id="clique">para ver seus itens emprestados,<a href="itens_emprestados.php">clique aqui</a></article>
		</div>
		<div id="emprestar-itens">
			<div id="header-emprestar">
				<h3> EMPRESTAR ITENS </h3>
			</div>
			<div class="itens">
                <form name="empresta-itens" method="post" action="emprestar.php" class="textoconta">
                   	Item:<br>
					<select name="item">
					<option>Selecione</option>
					<?php
					$itens = "SELECT * FROM itens INNER JOIN usuarios 
					ON itens.idUser=usuarios.idUser WHERE email = '$email'";
					$resultadoitens = mysqli_query($con, $itens);
					while($rows_itens = mysqli_fetch_assoc($resultadoitens)){?>
					<option value="<?php echo $rows_itens['id'];?>"><?php echo $rows_itens['nomeitem'];?>
					</option><?php
						}
					?>
					</select> <br>               
                    Data de devolução:<br>
                    <input type="date" name="datadevolucao"><br>
                    Nome de quem pegou emprestado:<br>
                    <input type="text" name="nomePessoa"><br>
                    <br>
                    <input type="reset" name="resetar" value="Reiniciar">
					<input type="submit" name="envia" value="Enviar">
                </form>
            </div>
		</div>
		<div id="cadastraritens">	
			<div id="header-cadastrar">
				<h3>CADASTRAR ITENS</h3>
			</div>
			<div class="itens">
				<form name="cadastroitens" method="post" action="cadastro_itens.php" class="textoconta">
					Nome do item:<br>
					<input type="text" name="nome"><br>
					Tipo do item:<br>
					<select name="tipoitem">
						<option value="eletronico">Eletrônico</option>
						<option value="eletrodomestico">Eletrodomestico</option>
						<option value="ferramenta">Ferramenta</option>
						<option value="instrumento">Instrumento músical</option>
						<option value="computador">Computador</option>
						<option value="outro">Outro</option>
					</select><br>
					Caso tenha selecionado outro, digite o tipo do item abaixo:<br>
					<input type="text" name="outro"><br>
					<br>
					<input type="reset" name="reset" value="Reiniciar">
					<input type="submit" name ="enviar" value="Enviar">
				</form>
			</div>
			
		</div>
	</div>
</body>
</html>