<?php
	
	include 'conexao_mysql.php';

	class FaleConosco
	{
		public $nome;
		public $assunto;
		public $email;
		public $mensagem;
		
		public function FaleConosco_Consulta($id_msg = "")
		{
			$mysql = new MySqlConexao();
			if($id_msg == "")
			{	
				$result = $mysql->Consulta("SELECT * FROM mensagens");
			}
			else
			{
				$result = $mysql->Consulta("SELECT * FROM mensagens WHERE id_mensagem = ".$id_msg);
			}
			$mysql->FechaConexao();
			return $result;
		}
		public function FaleConosco_Inclusao()
		{
			$mysql = new MySqlConexao();
			
			$this->nome = mysqli_real_escape_string($mysql->con,$this->nome);
			$this->assunto = mysqli_real_escape_string($mysql->con,$this->assunto);
			$this->email = mysqli_real_escape_string($mysql->con,$this->email);
			$this->mensagem = mysqli_real_escape_string($mysql->con,$this->mensagem);
			
			$mysql->Executa("INSERT INTO mensagens(nome, assunto, email, mensagem) VALUES('".$this->nome."','".$this->assunto."','".$this->email."','".$this->mensagem."')");
			
			$mysql->FechaConexao();
	 
		}
		public function FaleConosco_Exclusao($id_msg)
		{
			$mysql = new MySqlConexao();
			
			$mysql->Executa("DELETE FROM mensagens WHERE id_mensagem = ".$id_msg);
			
			$mysql->FechaConexao();
		}
	}
	
	class Usuarios
	{
		public $nome;
		public $login;
		public $senha;

		public function Usuarios_Consulta($id_usuario = "")
		{
			$mysql = new MySqlConexao();
			if($id_usuario == "")
			{	
				$result = $mysql->Consulta("SELECT * FROM usuarios");
			}
			else
			{
				$result = $mysql->Consulta("SELECT * FROM usuarios WHERE id_usuario = ".$id_usuario);
			}
			$mysql->FechaConexao();
			return $result;
		}
		public function Usuarios_Inclusao()
		{
		
			$mysql = new MySqlConexao();
			
			$this->nome = mysqli_real_escape_string($mysql->con,$this->nome);
			$this->login = mysqli_real_escape_string($mysql->con,$this->login);
			$this->senha = mysqli_real_escape_string($mysql->con,$this->senha);
		
			$mysql->Executa("INSERT INTO usuarios(nome, login, senha) VALUES('".$this->nome."','".$this->login."','".$this->senha."')");
			$mysql->FechaConexao();
			
		}
		public function Usuarios_Alteracao($id_usuario)
		{
			$mysql = new MySqlConexao();
			
			$this->nome = mysqli_real_escape_string($mysql->con,$this->nome);
			$this->login = mysqli_real_escape_string($mysql->con,$this->login);
			$this->senha = mysqli_real_escape_string($mysql->con,$this->senha);
		
			$mysql->Executa("UPDATE usuarios SET nome='".$this->nome."', login='".$this->login."', senha='".$this->senha."' WHERE id_usuario=".$id_usuario);
			$mysql->FechaConexao();
			
		}
		public function Usuarios_Exclusao($id_usuario)
		{
			$mysql = new MySqlConexao();
			
			$mysql->Executa("DELETE FROM usuarios WHERE id_usuario = ".$id_usuario);
			
			$mysql->FechaConexao();
		}
	}
	
	class Vagas
	{
		public $titulo;
		public $descricao;
		public $id_usuario;
		
		public function Vagas_Consulta($id_vagas = "")
		{
			$mysql = new MySqlConexao();
			if($id_vagas == "")
			{	
				$result = $mysql->Consulta("SELECT * FROM vagas");
			}
			else
			{
				$result = $mysql->Consulta("SELECT * FROM vagas WHERE id_vagas = ".$id_vagas);
			}
			$mysql->FechaConexao();
			return $result;
		}
		public function Vagas_Inclusao()
		{
			$mysql = new MySqlConexao();
			
			$this->titulo = mysqli_real_escape_string($mysql->con,$this->titulo);
			$this->descricao = mysqli_real_escape_string($mysql->con,$this->descricao);
			
			$mysql->Executa("INSERT INTO vagas(titulo, descricao, id_usuario) VALUES('".$this->titulo."','".$this->descricao."',".$this->id_usuario.")");
			
			$mysql->FechaConexao();
		}
		public function Vagas_Alteracao($id_vaga)
		{
			$mysql = new MySqlConexao();
			
			$this->titulo = mysqli_real_escape_string($mysql->con,$this->titulo);
			$this->descricao = mysqli_real_escape_string($mysql->con,$this->descricao);
			
			$mysql->Executa("UPDATE vagas SET titulo='".$this->titulo."', descricao='".$this->descricao."' WHERE id_vagas=".$id_vaga);
			
			$mysql->FechaConexao();
		}
		public function Vagas_Exclusao($id_vaga)
		{
			$mysql = new MySqlConexao();
			
			$mysql->Executa("DELETE FROM vagas WHERE id_vagas = ".$id_vaga);
			
			$mysql->FechaConexao();
		}
		
	}
	
	class Curriculos
	{
		public $nome;
		public $cpf;
		public $email;
		public $curriculo;
		
		public function Curriculos_Consulta($id_curriculo = "")
		{
			$mysql = new MySqlConexao();
			if($id_curriculo == "")
			{	
				$result = $mysql->Consulta("SELECT * FROM curriculos");
			}
			else
			{
				$result = $mysql->Consulta("SELECT * FROM curriculos WHERE id_curriculo = ".$id_curriculo);
			}
			$mysql->FechaConexao();
			return $result;
		}
		public function Curriculos_Inclusao()
		{
			$mysql = new MySqlConexao();
			
			$this->nome = mysqli_real_escape_string($mysql->con,$this->nome);
			$this->cpf = mysqli_real_escape_string($mysql->con,$this->cpf);
			$this->email = mysqli_real_escape_string($mysql->con,$this->email);
			$this->curriculo = mysqli_real_escape_string($mysql->con,$this->curriculo);
			
			$mysql->Executa("INSERT INTO curriculos(nome, cpf, email, curriculo) VALUES('".$this->nome."','".$this->cpf."','".$this->email."','".$this->curriculo."')");
			
			$mysql->FechaConexao();
		}
		public function Curriculos_Exclusao($id_curriculo)
		{
			$mysql = new MySqlConexao();
			
			$mysql->Executa("DELETE FROM curriculos WHERE id_curriculo = ".$id_curriculo);
			
			$mysql->FechaConexao();
		}
	}

?>