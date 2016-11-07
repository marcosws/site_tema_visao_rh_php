<?php 

	include 'crud.php';

	session_start();
	
	if((!isset($_SESSION['login'])) && (!isset($_SESSION['senha'])))
	{
		header('location:index.html');
	}
	else
	{
		$id_usuario = $_SESSION['id_usuario'];
		$nome_usuario = $_SESSION['nome'];
		$login_nome = $_SESSION['login'];
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<link rel="icon" href="img/icone_visao_rh.ico" type="image/x-icon" />
		<link rel="stylesheet" href="css/site-style.css" media="all" />
		<script src="js/valida-dados.js"></script>
		<title>Adminstração</title>
	</head>
	<body>
		<div id="container">
			<div id="header">
				<img src="img/logo_visao_rh2.png" id="logo_header" />
				<h1>Adminstração</h1>
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
					<li class="selected"><a href="admin.php"><span>Vagas Cadastro</span></a></li>
					<li><a href="usuarios.php"><span>Usuarios Cadastro</span></a></li>
					<li><a href="curriculos_cad.php"><span>Curriculos Cadastrados</span></a></li>
					<li><a href="mensagens.php"><span>Mensagens</span></a></li>
					<li><a href="logout.php"><span>Sair</span></a></li>
				</ul><br />
				<div id="box_text">
					<h2>Vagas Cadastro</h2>
					<?php
						if(isset($_GET['alterar_id']))
						{
							$Vagas = new Vagas();
							$result = $Vagas->Vagas_Consulta($_GET['alterar_id']);
							$row = $result->fetch_array();
						}
					?>
					<form method="post" id="formulario" onSubmit="return validaVagasCadastro()">
						<label>Titulo</label><br />
						<input type="text" name="titulo" class="input_vagas_titulo" id="titulo" value="<?php if(isset($_GET['alterar_id'])) echo $row['titulo'];  ?>"/><br />
						<label>Descrição</label><br />
						<textarea rows="10" cols="60" name="descricao" id="descricao"><?php if(isset($_GET['alterar_id'])) echo $row['descricao']; ?></textarea><br /><br />
						<?php
						if(isset($_GET['alterar_id']))
						{
						 ?>
						<input type="submit" name="alterar" id="alterar" value="Alterar" /><br /><br />
						<?php
						}
						else
						{
						?>
						<input type="submit" name="cadastrar" id="cadastrar" value="Cadastrar" /><br /><br />
						<?php
						}
						?>
					</form>
					<br />
				</div>
			</div>
			<?php //echo "ID: ".$id_usuario." Nome: ".$nome_usuario; 
			
				if(isset($_POST['cadastrar']))
				{
					$Vagas = new Vagas();
					$Vagas->titulo = $_POST['titulo'];
					$Vagas->descricao = $_POST['descricao'];
					$Vagas->id_usuario = $id_usuario;
					$Vagas->Vagas_Inclusao();
					header('location:vagas.php');
				}
				if(isset($_GET['alterar_id']))
				{
					if(isset($_POST['alterar']))
					{
						$Vagas = new Vagas();
						$Vagas->titulo = $_POST['titulo'];
						$Vagas->descricao = $_POST['descricao'];
						$Vagas->Vagas_Alteracao($_GET['alterar_id']);
						header('location:vagas.php');
					}
				}
			
			?>
			<div id="footer">
				<p><small>Visão RH&reg - Desenvolvido Por Marcos Willian de Souza</small></p>
			</div>
		</div>
	</body>
</html>
