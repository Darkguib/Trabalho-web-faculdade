<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="estilo.css">
	<link rel="website icon" type="png" href="imagens/logomini.png">
	<title>Alterar dados</title>
</head>
<body>
    <div id="principal">
		<?php 
		include('verifica_login.php');
		?>
		<div id="header"><img src="imagens/logo.png">
			<div id="nav">
				<a href="menu.php">HOME</a>|
			</div>
			<div id="campo-cadastro">
				<h2>Alterar dados</h2><br>
				<?php
				if(isset($_SESSION['senha_diferente'])):
				?>
				<h3>As senhas não coincidem</h3>
				<?php
				endif;
				unset($_SESSION['senha_diferente']);
				?>
				<?php
				if(isset($_SESSION['confirmado'])):
				?>
				<h3>Dados alterados com sucesso!</h3>
				<?php
				endif;
				unset($_SESSION['confirmado']);
				?>
				<form method="post"  class="textoconta" action="altera_dados.php">
					Alterar nome:<br>
					<input type="text" name="alterarNome"><br>
					Alterar número:<br>
					<input type="tel" name="novoNumero"><br>
					Nova senha:<br>
					<input type="password" name="senhaNova" placeholder="senha"><br>
					Confirmar senha:<br>
					<input type="password" name="confirmarSenhanova" placeholder="confirmar senha"><br>
					<br>
					<input type="submit" name="confirma" value="Enviar"><br>
				</form>
			</div>
		</div>
	</div>

</body>
</html>