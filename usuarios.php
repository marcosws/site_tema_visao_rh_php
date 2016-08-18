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
					<li><a href="admin.php"><span>Vagas Cadastro</span></a></li>
					<li class="selected"><a href="usuarios.php"><span>Usuarios Cadastro</span></a></li>
					<li><a href="curriculos_cad.php"><span>Curriculos Cadastrados</span></a></li>
					<li><a href="mensagens.php"><span>Mensagens</span></a></li>
					<li><a href="logout.php"><span>Sair</span></a></li>
				</ul><br />
				<div id="box_text">
					<?php
						if(isset($_GET['alterar_id']))
						{
							include_once 'crud.php';
							$Usuarios = new Usuarios();
							$result = $Usuarios->Usuarios_Consulta($_GET['alterar_id']);
							$row = $result->fetch_array();
						}
					?>
					<h2>Usuarios</h2>
					<form method="post" id="formulario" onSubmit="return validaUsuariosCadastro()">
						<label>Nome</label><br />
						<input type="text" name="nome" class="input_vagas_titulo" id="nome" value="<?php if(isset($_GET['alterar_id'])) echo $row['nome'];  ?>"/><br />
						<label>Login</label><br />
						<input type="text" name="login" class="input_vagas_titulo" id="login" value="<?php if(isset($_GET['alterar_id'])) echo $row['login'];  ?>"/><br />
						<label>Senha</label><br />
						<input type="password" name="senha" class="input_vagas_titulo" id="senha" value="<?php if(isset($_GET['alterar_id'])) echo $row['senha'];  ?>"/><br />
						<label>Confirma Senha</label><br />
						<input type="password"  name="conf_senha" class="input_vagas_titulo" id="conf_senha" value="<?php if(isset($_GET['alterar_id'])) echo $row['senha']; ?>" /><br /><br />
						<?php
						if(isset($_GET['alterar_id']))
						{
						 ?>
						 <input type="submit" name="alterar" id="cadastrar" value="Alterar" /><br /><br />
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
					<?php
						include_once 'crud.php';
						if(isset($_GET['alterar_id']))
						{
							if(isset($_POST['alterar']))
							{
								include_once 'crud.php';
								$Usuarios = new Usuarios();
								$Usuarios->nome = $_POST['nome'];
								$Usuarios->login = $_POST['login'];
								$Usuarios->senha = $_POST['senha'];
								$Usuarios->Usuarios_Alteracao($_GET['alterar_id']);
								header('location:usuarios.php');
							}
						}
						if(isset($_POST['cadastrar']))
						{
							include_once 'crud.php';
							$Usuarios = new Usuarios();
							$Usuarios->nome = $_POST['nome'];
							$Usuarios->login = $_POST['login'];
							$Usuarios->senha = $_POST['senha'];
							$Usuarios->Usuarios_Inclusao();
							header('location:usuarios.php');
						}
					?>
					<table>
						<tr>
							<th>Nome</th>
							<th>Login</th>
							<th>Operação</th>
						</tr>
						<?php
							/*if(!isset($_GET['alterar_id']))
							{*/
								include_once 'crud.php';
								$Usuarios = new Usuarios();
								$result = $Usuarios->Usuarios_Consulta();
								while($rows = $result->fetch_array())
								{
									?>
									<tr>
										<td><?php echo $rows['nome']; ?></td>
										<td><?php echo $rows['login']; ?></td>
										<td><a href="?alterar_id=<?php echo $rows['id_usuario']; ?>" >Alterar</a> | <a href="excluir.php?excluir_usuario_id=<?php echo $rows['id_usuario']; ?>" >Excluir</a></td>
									</tr>
									<?php
								}
							/*}*/
						?>
					</table>
					<br /><br />
				</div>
			</div>
			<div id="footer">
				<p><small>Visão RH&reg - Desenvolvido Por Marcos Willian de Souza</small></p>
			</div>
		</div>
	</body>
</html>