<?php

class DataBase extends PDO {

	private $dns, $db, $user, $pass;

	public function __construct ($dns, $db, $user, $pass) {
		$this->db = $db;
		$this->dns = $dns;
		$this->user = $user;
		$this->pass = $pass;

		try {
			parent::__construct("mysql:host=$dns;dbname=$this->db", "$this->user", "$this->pass");
		} catch (PDOException $e) {
			echo "Ocoreu um erro ao estabelecer conexão com banco de dados ".$e->getMessage();
		}
	}

	public function insert ($table, $datas = []) {
		$queryAttr = implode(',', array_keys($datas));
		$queryValues = "'". implode("','", $datas) ."'";

		$sql = "INSERT INTO $table($queryAttr) VALUES($queryValues)";
		$stmt = $this->prepare($sql);

		return $stmt->execute();
	}

	public function find ($table) {
		$stmt = $this->query("SELECT * FROM $table");
		return $stmt->fetchAll();
	}

	public function findById ($table, $id) {
		$stmt = $this->query("SELECT * FROM $table WHERE id=$id");
		return $stmt->fetch();
	}

	public function delete ($table, $id) {
		$sql = "DELETE FROM $table WHERE id=$id";
		$stmt = $this->prepare($sql);
		return $stmt->execute();
	}

	public function update ($table, $id, $datas = []) {
		$setValues = [];

		foreach ($datas as $key => $value) {
			$setValues[] = "$key = '$value'";
		}

		$setQuerys = implode(',', $setValues);

		$sql = "UPDATE $table SET $setQuerys WHERE id=$id";
		$stmt = $this->prepare($sql);
		return $stmt->execute();
	}
}
