<?php 

	include 'crud.php';
	
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
					<li><a href="usuarios.php"><span>Usuarios Cadastro</span></a></li>
					<li class="selected"><a href="curriculos_cad.php"><span>Curriculos Cadastrados</span></a></li>
					<li><a href="mensagens.php"><span>Mensagens</span></a></li>
					<li><a href="logout.php"><span>Sair</span></a></li>
				</ul><br />
				<div id="box_text">
					<h2>Curriculos Cadastrados</h2>
					<table>
						<tr>
							<th>Nome</th>
							<th>CPF</th>
							<th>E-mail</th>
							<th>Curriculo</th>
							<th>Operação</th>
						</tr>
						<?php
							$Curriculos = new Curriculos();
							$result = $Curriculos->Curriculos_Consulta();
							while($rows = $result->fetch_array())
							{
						?>
						<tr>
							<td><?php echo $rows['nome']; ?></td>
							<td><?php echo $rows['cpf']; ?></td>
							<td><?php echo $rows['email']; ?></td>
							<td><a href="<?php echo $rows['curriculo']; ?>">Curriculo</a></td>
							<td><a href="excluir.php?excluir_curriculo_id=<?php echo $rows['id_curriculo']; ?>" >Excluir</a></td>
						</tr>
						<?php
							}
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