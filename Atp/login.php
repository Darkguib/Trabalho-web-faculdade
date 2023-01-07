<?php session_start();?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="estilo.css">
	<link rel="website icon" type="png" href="imagens/logomini.png">
	<title>Login</title>
</head>
<body>
	<div id="principal">
		<div id="header"><img src="imagens/logo.png">
			<div id="nav">
				<a href="index.php">HOME</a>
			</div>
		</div>
		<div class="login">
			<h2>Login</h2>
		</div>
		<?php
		if(isset($_SESSION['nao_autenticado'])):
		?>
		<div class="login">
			<h3>E-mail ou senha incorretos</h3>
		</div>
		<?php
		endif;
		unset($_SESSION['nao_autenticado']);
		?>
		<div class="login">
			<form name="entra" method="post" class="textoconta" action="login_envia.php">
				E-mail:<br>
				<input type="email" name="email"><br>
				Senha:<br>
				<input type="password" name="senha"><br>
				<a href="esqueceu_senha.php" id="esqueceusenha">Esqueceu a senha?</a>
				<br>
				<br>
				<input type="submit" name="entrar" value="Entrar"><br>
			</form>
			
		</div>
	</div>
</body>
</html>