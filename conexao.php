<?php
class Conexao{
	//ATRIBUTO PRIVADOS
	private $usuario;
	private $senha;
	private $banco;
	private $servidor;
	private static $pdo;
	//CONSTRUTOR
	public function __construct(){		
		$this->servidor = "localhost";
		$this->banco = "crudoo";
		$this->usuario = "root"; 
		$this->senha = "root";
	}
	//METODO PARA CONECTAR
	public function conectar(){
		try{
			if(is_null(self::$pdo)){
				self::$pdo = new PDO("mysql:host=".$this->servidor.";dbname=".$this->banco, $this->usuario, $this->senha);
			}
			return self::$pdo;
		}catch(PDOException $e){
			echo 'Error: '.$e->getMessage();
		}
	}
	// chamando do banco o $sql
	public static function prepare($sql){	
		return self::conectar()->prepare($sql);
	}
}
?>