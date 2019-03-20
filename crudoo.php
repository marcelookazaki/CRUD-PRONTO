<?php

	require_once 'conexao.php';

	// abstract class crudoo extends conexao
	// {
	// 	protected $table;
	// 	private $con;
		//metodos abstratos 
		// abstract public function insert();
		// abstract public function update($id);

		// public function find(){
		// 	try {
		// 			$stmt = $this->con->conectar()->prepare("SELECT id,nome,email FROM $this->table");
		// 			$stmt->execute();
		// 			return $stmt->fetchAll(PDO::FETCH_NUM);
		// 			// $row = array_shift($stmt);
		// 		} catch (PDOException $e) {
		// 			return 'error' . $e->getMessage();
		// 		}
		// 	}
		

	// 	public function find($id){
	// 	try {
	// 		// $this->id = $id;
	// 		$stmt = $this->con->conectar()->prepare("SELECT * FROM $this->table WHERE id = :id");
	// 		//usando parametro para jogar dentro da query
	// 		$stmt->bindParam(":id",$this->id,PDO::PARAM_INT);
	// 		//excutar a query
	// 		$stmt->execute();
	// 		//retornar o dados nas posições a partit do fecth PDO
	// 		return $cat->fetch();
	// 	} catch (PDOException $e) {
	// 		return 'error' . $e->getMessage();
	// 	}
	// }
		//buscar 1 usuario do banco pelo ID 
		// public function find($id)
		// {
		// 	$sql = "SELECT * FROM $this->table WHERE id = :id";
		// 	$stmt = conexao::prepare($sql);
		// 	$stmt->bindParam(':id', $id, PDO::PARAM_INT);
		// 	$stmt->execute();
		// 	return $stmt->fetch();
		// }
		//buscar vaios Usuarios pelo ID
		// public function findAll(){
		// try {
		// 		$stmt = $this->con->conectar()->prepare("SELECT * FROM $this->table");
		// 		$stmt->execute();
		// 		return $stmt->fetchAll();
		// 	} catch (PDOException $e) {
		// 		return 'error' . $e->getMessage();
		// 	}
		// }
			
			
		// }

		//deletar usuario pelo ID
	// 	public function delete($id)
	// 	{
	// 		$sql = "DELETE FROM $this->table WHERE id = :id";
	// 		$stmt = DB::prepare($sql);
	// 		$stmt->bindParam(':id', $id, PDO::PARAM_INT);
	// 		$stmt->execute();
	// 	}
	}

