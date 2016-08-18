<?php 
	session_start();
	if((!isset($_SESSION['login'])) && (!isset($_SESSION['senha'])))
	{
	}
	else
	{
		header('location:admin.php');
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<link rel="icon" href="img/icone_visao_rh.ico" type="image/x-icon" />
		<link rel="stylesheet" href="css/site-style.css" media="all" />
		<script src="js/valida-dados.js"></script>
		<title>Login</title>
	</head>
	<body>
		<div id="container">
			<div id="header">
				<img src="img/logo_visao_rh2.png" id="logo_header" />
				<h1>Login</h1>
				<ul>
					<li><a href="index.html"><span>Inicio</span></a></li>
					<li><a href="quem_somos.html"><span>Quem Somos</span></a></li>
					<li><a href="vagas.php"><span>Vagas</span></a></li>
					<li><a href="curriculos.php"><span>Envie seu Curriculo</span></a></li>
					<li><a href="fale_conosco.php"><span>Fale Conosco</span></a></li>
					<li class="selected"><a href="login_site.php"><span>Login</span></a></li>
				</ul>
			</div>
			<div id="body">
				<img src="img/logo_visao_rh1.png" id="logo_body" />
				<div id="box_text">
					<form method="post" action="login.php" id="formulario_fale_conosco" onSubmit="return validaLogin()">
						<label>Login</label><br />
						<input type="text" name="login" class="input_login" id="login" /><br />
						<label>Senha</label><br />
						<input type="password" name="senha" class="input_login" id="senha"><br /><br />
						<input type="submit" id="entrar" value="Entrar" /><br /><br />
					</form>
				</div>
			</div>
			<div id="footer">
				<p><small>Visão RH&reg - Desenvolvido Por Marcos Willian de Souza</small></p>
			</div>
		</div>
	</body>
</html>