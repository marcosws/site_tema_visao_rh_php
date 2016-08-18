<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<link rel="icon" href="img/icone_visao_rh.ico" type="image/x-icon" />
		<link rel="stylesheet" href="css/site-style.css" media="all" />
		<script src="js/valida-dados.js"></script>
		<title>Fale Conosco</title>
	</head>
	<body>
		<div id="container">
			<div id="header">
				<img src="img/logo_visao_rh2.png" id="logo_header" />
				<h1>Fale Conosco</h1>
				<ul>
					<li><a href="index.html"><span>Inicio</span></a></li>
					<li><a href="quem_somos.html">Quem Somos</span></a></li>
					<li><a href="vagas.php">Vagas</span></a></li>
					<li><a href="curriculos.php"><span>Envie seu Curriculo</span></a></li>
					<li class="selected"><a href="fale_conosco.php">Fale Conosco</span></a></li>
					<li><a href="login_site.php">Login</span></a></li>
				</ul>
			</div>
			<div id="body">
				<img src="img/logo_visao_rh1.png" id="logo_body" />
				<div id="box_text">
					<form method="post" id="formulario_fale_conosco" onSubmit="return validaFaleConosco()">
						<label>Nome</label><br />
						<input type="text" name="nome" class="input_fale_conosco" id="nome" /><br />
						<label>Assunto</label><br />
						<input type="text" name="assunto" class="input_fale_conosco" id="assunto"><br />
						<label>E-Mail</label><br />
						<input type="text" name="email" class="input_fale_conosco" id="email"><br />
						<label>Mensagem</label><br />
						<textarea rows="10" name="mensagem" cols="60" id="mensagem"></textarea><br /><br />
						<input type="submit" name="enviar" id="enviar" value="Enviar" /><br /><br />
					</form>
					<?php
						include_once 'crud.php';
						
						if(isset($_POST['enviar']))
						{
							$FaleConosco = new FaleConosco();
							$FaleConosco->nome = $_POST['nome'];
							$FaleConosco->assunto = $_POST['assunto'];
							$FaleConosco->email = $_POST['email'];
							$FaleConosco->mensagem = $_POST['mensagem'];
							
							$FaleConosco->FaleConosco_Inclusao();
						}
					?>
				</div>
			</div>
			<div id="footer">
				<p><small>Visão RH&reg - Desenvolvido Por Marcos Willian de Souza</small></p>
			</div>
		</div>
	</body>
</html>