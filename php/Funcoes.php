<?php
	session_start(); 
	require 'Users.php';
	require 'Connection.php';
	require 'Residuo.php';
	require 'Empresa.php';

	if(isset($_POST['acao'])){
		if($_POST['acao'] == "login"){
			//Users.php
			checkLogin();
		}

		if ($_POST['acao'] == "cadastrarEmpresa"){
            //Empresa
            cadastrarEmpresa();
        }

        if ($_POST['acao'] == "cadastrarSegmento"){
            //Segmentro
            cadastrarSegmento();
        }

	}

	if(isset($_GET['acao'])){
		if($_GET['acao'] == "sair"){
			//User.php
			sair();
		}
	}
?>