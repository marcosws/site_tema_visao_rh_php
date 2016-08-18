<?php

	session_start();
	if((!isset($_SESSION['login'])) && (!isset($_SESSION['senha'])))
		header('location:index.html');
	else
		$login_nome = $_SESSION['login'];
		
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<link rel="icon" href="img/icone_visao_rh.ico" type="image/x-icon" />
		<link rel="stylesheet" href="css/site-style.css" media="all" />
		<title>Mensagens</title>
	</head>
	<body>
		<div id="container">
			<div id="header">
				<img src="img/logo_visao_rh2.png" id="logo_header" />
				<h1>Mensagens</h1>
				<ul>
					<li><a href="index.html"><span>Inicio</span></a></li>
					<li><a href="quem_somos.html"><span>Quem Somos</span></a></li>
					<li><a href="vagas.php"><span>Vagas</span></a></li>
					<li><a href="curriculos.php"><span>Envie seu Curriculo</span></a></li>
					<li><a href="fale_conosco.php"><span>Fale Conosco</span></a></li>
					<li class="selected"><a href="admin.php"><span>Administação</span></a></li>
				</ul>
			</div>
			<div id="body">
				<img src="img/logo_visao_rh1.png" id="logo_body" /><br />
				<ul>
					<li><a href="admin.php"><span>Vagas Cadastro</span></a></li>
					<li><a href="usuarios.php"><span>Usuarios Cadastro</span></a></li>
					<li><a href="curriculos_cad.php"><span>Curriculos Cadastrados</span></a></li>
					<li class="selected"><a href="mensagens.php"><span>Mensagens</span></a></li>
					<li><a href="logout.php"><span>Sair</span></a></li>
				</ul><br />
				<div id="box_text">
					<h2>Mensagens</h2>
					<?php
						include_once 'crud.php';
						$FaleConosco = new FaleConosco();
						$result = $FaleConosco->FaleConosco_Consulta();
						while($rows = mysqli_fetch_assoc($result))
						{
						?>
						<div id="mensagens">
							<small>Nome: <?php echo $rows['nome']; ?></small><br />
							<small>Assunto: <?php echo $rows['assunto']; ?></small><br />
							<small>E-Mail: <?php echo $rows['email']; ?></small><br /><br />
							<p><?php 
								
								$mensagem = $rows['mensagem'];
								$cont = 0;
								while(substr($mensagem,$cont,80) != "")
								{
									echo substr($mensagem,$cont,80) . "<br />";
									$cont = $cont + 80;
								}
							
							?></p>
							<br />
							<small>Mensagem - ID: <?php echo $rows['id_mensagem']; ?> | <a href="excluir.php?excluir_mensagem_id=<?php echo $rows['id_mensagem']; ?>" >Excluir</a></small>
						</div>
						<br />
						<?php
						}
						?>
					<br /><br />
				</div>
			</div>
			<div id="footer">
				<p><small>Visão RH&reg - Desenvolvido Por Marcos Willian de Souza</small></p>
			</div>
		</div>
	</body>
</html>