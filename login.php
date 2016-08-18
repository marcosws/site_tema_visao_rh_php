<?php

	include 'conexao_mysql.php';	
		
	session_start();
	
	$mysql = new MySqlConexao();
	
	$login = mysqli_real_escape_string($mysql->con,$_POST['login']);
	$senha = mysqli_real_escape_string($mysql->con,$_POST['senha']);
	
	
	$resultado = $mysql->Consulta("SELECT id_usuario, nome, login, senha FROM usuarios WHERE login = '$login' AND senha = '$senha'");
	if($row = mysqli_fetch_assoc($resultado))
	{
		$_SESSION['id_usuario'] = $row['id_usuario'];
		$_SESSION['nome'] = $row['nome'];
		$_SESSION['login'] = $login;
		$_SESSION['senha'] = $senha;
		header('location:admin.php');
	}
	else
	{
		header('location:login_site.php');
	}

	$mysql->FechaConexao();
	
?>