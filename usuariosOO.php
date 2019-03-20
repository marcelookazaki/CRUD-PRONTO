<?php
	
	require_once 'conexao.php';
	// require_once 'crudoo.php';

	class usuariosOO extends conexao{
		protected $table = 'usuarios';
		private $nome;
		private $email;
		private $con;

		//construtor
		public function  __construct(){
			$this->con =  new conexao();
		}

		public function setNome($nome){
			$this->nome = $nome;
		}
		public function getNome(){
			return $this->nome;
		}
		public function setEmail($email){
			$this->email = $email;
		}
		public function getEmail(){
			return $this->email;
		}
		
		public function insert(){
			try {

				$in = $this->con->conectar()->prepare("INSERT INTO $this->table (nome,email) VALUES (:nome,:email);");
				$in->bindParam(':nome',$this->nome, PDO::PARAM_STR);
				$in->bindParam(':email',$this->email, PDO::PARAM_STR);

				return ($in->execute()) ? 'ok' : 'erro';
					
			} catch (Exception $e) {

				return 'erro: ' . $e->getMessage();
			}

			$conexao = null;
		}

		public function findAll(){
			try {
					$stmt = $this->con->conectar()->prepare("SELECT id,nome,email,status FROM $this->table");
					$stmt->execute();
					return $stmt->fetchAll(PDO::FETCH_ASSOC);
				} catch (PDOException $e) {
					return 'error' . $e->getMessage();
				}
			}

		public function find($id){
			try {
					$stmt = $this->con->conectar()->prepare("SELECT * FROM $this->table WHERE id = :id");
					$stmt->bindParam(":id",$id,PDO::PARAM_INT);
					//$sql = "SELECT * FROM $this->table WHERE id = :id";
					//$stmt = conexao::prepare($sql);
					//$stmt->bindParam(':id', $id, PDO::PARAM_INT);
					$stmt->execute();
					return $stmt->fetch();	
				} catch (PDOException $e) {
					return 'error' . $e->getMessage();
			}
		}

		
		public function deleteLogico($id)
		{
			try {
				//$sql = "DELETE FROM $this->table WHERE id = :id";
				$sql = "UPDATE $this->table set status = 0 WHERE id = :id";
				$stmt = conexao::prepare($sql);
				$stmt->bindParam(':id', $id, PDO::PARAM_INT);
				$stmt->execute();
			} catch (PDOException $e) {
					return 'error' . $e->getMessage();
			}
				
		}

		public function update($id,$nome,$email)
		{
			
			$sql = "UPDATE $this->table set nome = :nome , email = :email WHERE id = :id";
			
			$stmt = conexao::prepare($sql);
			$stmt->bindParam(':nome', $nome);
			$stmt->bindParam(':email',$email);
			$stmt->bindParam(':id',$id);
			return $stmt->execute();
		}	
	
}