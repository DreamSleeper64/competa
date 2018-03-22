<?php

class Database
{
	private $conn;
	private $host = "localhost";
	private $db = "competa";
	private $username = "root";
	private $password = "";
	private $charset = "UTF-8";

	/**
	 * Database constructor.
	 */
	public function __construct()
	{
		try {
			$this->conn = new PDO("mysql:host=$this->host;dbname=$this->db", $this->username, $this->password);
			$this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		} catch (PDOException $e) {
			die($e->getMessage());
		}
	}

	public function create_db($req = null){

		try {
			$conn = $this->conn;
			$query = "CREATE DATABASE IF NOT EXISTS $req";
			$conn->prepare($query);
			$conn->exec($query);

			return true;
		}
		catch(PDOException $e) {
			echo $query . "<br>" . $e->getMessage();
		}
		$conn = null;
	}

	public function create_table($database, $table){

		try {
			$conn = $this->conn;
			$query = 'CREATE TABLE IF NOT EXISTS '.$database.'.'.$table.'(id int)';
			$conn->prepare($query);
			$conn->exec($query);

			echo "Database created";
		}
		catch(PDOException $e) {
			echo $query . "<br>" . $e->getMessage();
		}
		$conn = null;
	}

	public function insert($entity = null, $values = null) {

		//lazyload & unsplash

		try {
			$conn = $this->conn;

			$query = $conn->prepare("INSERT INTO $entity (title, description, price, happy, discount, gender) VALUES (?,?,?,?,?,?)");

			$query->bindParam(1,$values->title);
			$query->bindParam(2,$values->description);
			$query->bindParam(3,$values->price);
			$query->bindParam(4,$values->happy);
			$query->bindParam(5,$values->discount);
			$query->bindParam(6,$values->gender);

			$query->execute();
			session_start();
			$_SESSION['test'] = true;
			return true;
		}
		catch(PDOException $e) {
			echo $e->getMessage();
		}
		$conn = null;
	}

	public function get($entity = null, $amount = "*") {

		try {
			$conn = $this->conn;

			$query = $conn->prepare("SELECT * FROM request");

			$query->bindParam(":amount", $amount, PDO::PARAM_STR);
			$query->bindParam(":entity", $entity,PDO::PARAM_STR);

			$query->execute();

			return $query->fetchAll(PDO::FETCH_ASSOC);

		}
		catch(PDOException $e) {
			echo $e->getMessage();
		}
		$conn = null;
	}
}