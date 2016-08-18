<?php
	
	include 'crud.php';
	
	session_start();

?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<link rel="icon" href="img/icone_visao_rh.ico" type="image/x-icon" />
		<link rel="stylesheet" href="css/site-style.css" media="all" />
		<title>Vagas</title>
	</head>
	<body>
		<div id="container">
			<div id="header">
				<img src="img/logo_visao_rh2.png" id="logo_header" />
				<h1>Vagas</h1>
				<ul>
					<li><a href="index.html"><span>Inicio</span></a></li>
					<li><a href="quem_somos.html"><span>Quem Somos</span></a></li>
					<li class="selected"><a href="vagas.php"><span>Vagas</span></a></li>
					<li><a href="curriculos.php"><span>Envie seu Curriculo</span></a></li>
					<li><a href="fale_conosco.php"><span>Fale Conosco</span></a></li>
					<li><a href="login_site.php"><span>Login</span></a></li>
				</ul>
			</div>
			<div id="body">
				<img src="img/logo_visao_rh1.png" id="logo_body" />
				<div id="box_text">
					<?php
						$Vagas = new Vagas();
						$result = $Vagas->Vagas_Consulta();
						while($rows = $result->fetch_array())
						{
					?>
					<div id="vagas">
						<h2><?php echo $rows['titulo']; ?></h2>
						<p><?php echo $rows['descricao']; ?></p>
						<br />
						<small><?php
						$Usuarios = new Usuarios();
						$resultado = $Usuarios->Usuarios_Consulta($rows['id_usuario']);
						if($row = mysqli_fetch_assoc($resultado))
						{
							echo "Cadastrado Por: ".$row['nome']." | ";
						}
						if((isset($_SESSION['login'])) && (isset($_SESSION['senha'])))
						{
						?>
						<a href="admin.php?alterar_id=<?php echo $rows['id_vagas']; ?>" >Alterar</a> | <a href="excluir.php?excluir_vaga_id=<?php echo $rows['id_vagas']; ?>" >Excluir</a>
						<?php
						}
						?></small>
					</div>
					<br />
					<?php
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