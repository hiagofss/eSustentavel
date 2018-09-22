<?php 

function checkLogin(){
	$login = filter_input(INPUT_POST, 'inpLogin');
	$senha = filter_input(INPUT_POST, 'inpSenha');

	if(empty($login) || empty($senha)){
		$_SESSION['msgErro'] = "Preencha todos os campos";
		header("Location: ../login.php");
	}else{
		$con = startConnection();
		$stmt = $con->prepare("SELECT * FROM acesso WHERE login_usu = :login AND senha_usu = :senha");
		$stmt->bindValue(':login', $login);
		$stmt->bindValue(':senha', $senha);
		$stmt->execute();

		if($stmt->rowCount() != 0){
			$row = $stmt->fetchAll(PDO::FETCH_OBJ);
			
			foreach($row as $value){
				$_SESSION['id_usu'] = $value->id_usu;
				$_SESSION['nome'] = $value->nm_usu;
			}

			header("Location: ../index.php");

		}else{
			$_SESSION['msgErro'] = "Login ou Senha inválidos";
			header("Location: ../login.php");
		}
	}
}

function sair(){
	session_destroy();
	header("Location: ../index.php");
}


?>