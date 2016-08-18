<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<link rel="icon" href="img/icone_visao_rh.ico" type="image/x-icon" />
		<link rel="stylesheet" href="css/site-style.css" media="all" />
		<script src="js/valida-dados.js"></script>
		<title>Currículos</title>
	</head>
	<body>
		<div id="container">
			<div id="header">
				<img src="img/logo_visao_rh2.png" id="logo_header" />
				<h1>Envie seu Currículo</h1>
				<ul>
					<li><a href="index.html"><span>Inicio</span></a></li>
					<li><a href="quem_somos.html"><span>Quem Somos</span></a></li>
					<li><a href="vagas.php"><span>Vagas</span></a></li>
					<li class="selected"><a href="curriculos.php"><span>Envie seu Curriculo</span></a></li>
					<li><a href="fale_conosco.php"><span>Fale Conosco</span></a></li>
					<li><a href="login_site.php"><span>Login</span></a></li>
				</ul>
			</div>
			<div id="body">
				<img src="img/logo_visao_rh1.png" id="logo_body" />
				<div id="box_text">
					<form method="post" id="formulario" enctype="multipart/form-data" onSubmit="return validaCurriculo()">
						<label>Nome</label><br />
						<input type="text" name="nome" class="input_curriculos" id="nome" /><br />
						<label>CPF</label><br />
						<input type="text" name="cpf" class="input_curriculos" id="cpf"><br />
						<label>E-Mail</label><br />
						<input type="text" name="email" class="input_curriculos" id="email"><br />
						<label>Curriculo (*.pdf, *.doc, *.docx, *.txt)</label><br />
						<input type="file" name="curriculo" id="curriculo" /><br /><br />
						<input type="submit" name="enviar" id="enviar" value="Enviar" /><br /><br />
					</form>
					<?php
					
						include 'crud.php';
					
					
						if(isset($_POST['enviar']))
						{
							$_UP['pasta'] = 'curriculos/';
							$_UP['tamanho'] = 1024 * 1024 * 2; // Tamanho maximo em bytes (2mb)
							$_UP['renomeia'] = true;
							
							$extencoes = array('pdf','doc','docx','txt');
			
							if ($_FILES['curriculo']['error'] != 0) 
							{
								die("Não foi possível fazer o upload, erro:<br />" . $_UP['erros'][$_FILES['curriculo']['error']]);
								exit; 
							}
							
							$nome_arquivo = $_FILES['curriculo']['name'];
							$extensao_array = explode('.', $nome_arquivo);
							$extensao = end($extensao_array);
							$extensao = strtolower($extensao);
							
							if(!in_array($extensao,$extencoes))
							{
								echo "Por favor, envie curriculos com as seguintes extensões: pdf, doc, docx ou txt";
							}
							else if ($_UP['tamanho'] < $_FILES['curriculo']['size']) 
							{
								echo "O arquivo enviado é muito grande, envie arquivos de até 2Mb.";
							}
							else 
							{
								if ($_UP['renomeia'] == true) {
									$nome_final = time().'.'.$extensao;
								} 
								else 
								{
									$nome_final = $_FILES['curriculo']['name'];
								}
								 
								if (move_uploaded_file($_FILES['curriculo']['tmp_name'], $_UP['pasta'] . $nome_final)) 
								{
								
									$nome_curriculo = $_UP['pasta'] . $nome_final;
									$Curriculos = new Curriculos();
									
									$Curriculos->nome = $_POST['nome'];
									$Curriculos->cpf = $_POST['cpf'];
									$Curriculos->email = $_POST['email'];
									$Curriculos->curriculo = $nome_curriculo;
									
									$Curriculos->Curriculos_Inclusao();
								
									echo "Curriculo enviado com sucesso!";
									echo '<br /><a href="' . $nome_curriculo . '">Clique aqui para acessar o curriculo</a><br /><br />';
								} 
								else 
								{
									echo "Não foi possível enviar o arquivo, tente novamente";
								}
							}
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