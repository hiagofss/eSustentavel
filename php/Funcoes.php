<?php
	session_start(); 
	require 'Users.php';
	require 'Connection.php';

	if(isset($_POST['acao'])){
		if($_POST['acao'] == "login"){
			//Users.php
			checkLogin();
		}

	}

	if(isset($_GET['acao'])){
		if($_GET['acao'] == "sair"){
			//User.php
			sair();
		}
	}






?>