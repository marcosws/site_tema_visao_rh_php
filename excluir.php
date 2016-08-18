<!DOCTYPE html>
<html>
	<head>
 		<meta charset="utf-8" />
		<link rel="icon" href="img/icone_visao_rh.ico" type="image/x-icon" />
		<link rel="stylesheet" href="css/site-style.css" media="all" />
		<title>Excluir</title>
	</head>
	<body>
		<div id="container">
			<img src="img/logo_visao_rh1.png" id="logo_body" />
			<div id="excluir">
				<?php
					if(isset($_GET['excluir_msg']))
					{
						include_once 'crud.php';
						$FaleConosco = new FaleConosco();
						$FaleConosco->FaleConosco_Exclusao($_GET['excluir_msg']);
						header('location:mensagens.php');
					}
					if(isset($_GET['excluir_mensagem_id']))
					{
						include_once 'crud.php';
						$FaleConosco = new FaleConosco();
						$result = $FaleConosco->FaleConosco_Consulta($_GET['excluir_mensagem_id']);
						$row = $result->fetch_array();
				?>
					<h1>Excluir</h1>
					<br />
					<h2>Deseja Excluir a Mensagem ?</h2>
					<p><?php echo $row['nome']; ?></p><br />
					<p><?php echo $row['assunto']; ?></p><br />
					<p><?php echo $row['email']; ?></p><br />
					<p><?php echo $row['mensagem']; ?></p><br />
					<p><a href="?excluir_msg=<?php echo $row['id_mensagem']; ?>" >Excluir</a> | <a href="mensagens.php">Cancelar</a></p>
				<?php
					}
					if(isset($_GET['excluir_usr_id']))
					{
						include_once 'crud.php';
						$Usuarios = new Usuarios();
						$Usuarios->Usuarios_Exclusao($_GET['excluir_usr_id']);
						header('location:usuarios.php');
					}
					if(isset($_GET['excluir_usuario_id']))
					{
						include_once 'crud.php';
						$Usuarios = new Usuarios();
						$result = $Usuarios->Usuarios_Consulta($_GET['excluir_usuario_id']);
						$row = $result->fetch_array();
				?>
					<h1>Excluir</h1>
					<br />
					<h2>Deseja Excluir o Usuário ?</h2>
					<p><?php echo $row['nome']; ?></p><br />
					<p><?php echo $row['login']; ?></p><br />
					<p><a href="?excluir_usr_id=<?php echo $row['id_usuario']; ?>" >Excluir</a> | <a href="usuarios.php">Cancelar</a></p>
				<?php
					}
					//excluir_vaga_id
					if(isset($_GET['excluir_vg_id']))
					{
						include_once 'crud.php';
						$Vagas = new Vagas();
						$Vagas->Vagas_Exclusao($_GET['excluir_vg_id']);
						header('location:vagas.php');
					}
					if(isset($_GET['excluir_vaga_id']))
					{
						include_once 'crud.php';
						$Vagas = new Vagas();
						$result = $Vagas->Vagas_Consulta($_GET['excluir_vaga_id']);
						$row = $result->fetch_array();
				?>
					<h1>Excluir</h1>
					<br />
					<h2>Deseja Excluir a Vaga ?</h2>
					<p><?php echo $row['titulo']; ?></p><br />
					<p><?php echo $row['descricao']; ?></p><br />
					<p><a href="?excluir_vg_id=<?php echo $row['id_vagas']; ?>" >Excluir</a> | <a href="vagas.php">Cancelar</a></p>
				<?php
					}
					//excluir_curriculo_id
					if((isset($_GET['excluir_cur_id'])) && (isset($_GET['curriculo'])))
					{
						include_once 'crud.php';
						$Curriculos = new Curriculos();
						$Curriculos->Curriculos_Exclusao($_GET['excluir_cur_id']);
						unlink($_GET['curriculo']);
						header('location:curriculos_cad.php');
					}
					if(isset($_GET['excluir_curriculo_id']))
					{
						include_once 'crud.php';
						$Curriculos = new Curriculos();
						$result = $Curriculos->Curriculos_Consulta($_GET['excluir_curriculo_id']);
						$row = $result->fetch_array();
				?>
					<h1>Excluir</h1>
					<br />
					<h2>Deseja Excluir o Curriculo ?</h2>
					<p><?php echo $row['nome']; ?></p><br />
					<p><?php echo $row['cpf']; ?></p><br />
					<p><?php echo $row['email']; ?></p><br />
					<p><a href="?excluir_cur_id=<?php echo $row['id_curriculo']; ?>&curriculo=<?php echo $row['curriculo']; ?>" >Excluir</a> | <a href="curriculos_cad.php">Cancelar</a></p>
				<?php
					}
				?>
			</div>
			<br /><br />
		</div>
	</body>
</html>