<?php
	if($_POST['cadastrar'] == 'Cadastrar'){
		$nome = $_POST['nome'];
		$email = $_POST['email'];
		$senha = $_POST['senha'];
		$nascimento = $_POST['nascimento'];
		$telefone = $_POST['telefone'];
		
		$con = mysqli_connect('localhost:3307','root','abcd1234','coisasemprestadas');
		$sel = "SELECT email from usuarios where email = '$email'";
		$select = mysqli_query($con, $sel);

		if(mysqli_num_rows($select)>0){
			header('Location: cadastro.html');
			exit();
			}
		else{
			if($_POST['senha'] <> $_POST['senhaconfirma']){
				echo "As senhas não coincidem";
			}
				
			else{	
					
				if($_POST['Newsletter'] == "sim"){
					$newsletter = 1;
				}
				else{
					$newsletter = 0;
				}

				if($_POST['sexo'] == "M"){
					$sexo = 1;
				}
				elseif($_POST['sexo'] == "F"){
					$sexo = 2;
				}
				elseif($_POST['sexo'] == "N"){
					$sexo = 3;
				}
				if($_POST['cadastrar'] == 'Cadastrar'){
					$query = "INSERT INTO usuarios (nome, email,senha,sexo,dataNascimento,telefone,newsletter)
					VALUES ('$nome', '$email', md5('$senha'), '$sexo', '$nascimento', '$telefone', '$newsletter')";
					$insert = mysqli_query($con, $query);
					if($insert){
						header('Location: login.php');
						exit();
					}
				}
			}
		}
			mysqli_close($con);
	}
		
?>


