<?php session_start();?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="estilo.css">
        <link rel="website icon" type="png" href="imagens/logomini.png">
        <title>Página inicial</title>
    </head>
    <body>
        <div id="principal">
            <div id="header"><img src="imagens/logo.png">
                    <div id="nav">
                    <a href="index.php">HOME</a>|
                    <a href="cadastro.html">CRIAR CONTA</a>|
                    <a href="login.php">ENTRAR</a>
                    </div>
                    <div id="cadastro">
                        <h2>Alterar senha</h2>
                    </div>
                    <?php
                    if(isset($_SESSION['senha_errada'])):
                    ?>
                    <div class="erro">
                        <h3>As senhas não coincidem</h3>
                    </div>
                    <?php
                    endif;
                    unset($_SESSION['senha_errada']);
                    ?>
                    <?php
		            if(isset($_SESSION['nao_autenticado'])):
		            ?>
                    <div class="erro">
                       <h3> E-mail não cadastrado </h3>
                    </div>
                    <?php
		            endif;
		            unset($_SESSION['nao_autenticado']);
		            ?>
                    <div id="campo-cadastro">
                        <form method="post" action="troca_senha.php" class="textoconta">    
                            Endereço de e-mail:<br>
                            <input type="email" name="email"><br>
                            Nova senha:<br>
                            <input type="password" name="senha"><br>
                            Confiramar senha:<br>
                            <input type="password" name="confirmasenha"><br>
                            <br>
                            <input type="submit" name="envia" value="Enviar">
                        </form>	
                    </div>
            </div>
            
        </div>
    </body>
</html>