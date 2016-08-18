<?php
	class MySqlConexao
	{
		public $con;
		public $result;
				
		function __construct()
		{
			$this->con = mysqli_connect("localhost", "root", "adm32", "visaorh");
		}
			
		function Consulta($query)
		{

			if ($this->result = mysqli_query($this->con, $query))
			{
				return $this->result;
			}
			else
			{
				//mysqli_error();
				return false;
			}
	
		}
		function Executa($query)
		{
			mysqli_query($this->con, $query);
					
		}
		function FechaConexao()
		{
			mysqli_close($this->con);
		}
		function LiberaResultado()
		{
			mysqli_free_result($this->result);
		}
	}
?>