<?php

class CModel
{
	protected $host = "127.0.0.1:3306";
	protected $dbname = "mydb";
	protected $username = "root";
	protected $password = "root";
	protected $conn;
	protected $error;

	public function __construct()
	{
		$this->connection();
	}

	public function connection()
	{
		$this->conn = new \mysqli($this->host, $this->username, $this->password, $this->dbname);

		if (!$this->conn) {
			$this->error = "Connection failed";
		}
	}


	public function addUser($firstName, $lastName, $birthd, $active)
	{
		$this->conn->query("INSERT INTO `users`(`firstname`, `lastname`, `birthd`, `active`) VALUES ('$firstName', '$lastName', '$birthd', '$active')");
	}


	public function getUsers()
	{
		$data = [];
		if ($result = $this->conn->query("SELECT `id`, `firstname`, `lastname`, `birthd`, `active` FROM `users` WHERE 1")) {
			while ($row = $result->fetch_row()) {
				$data[] = $row;
			}
			$result->free_result();
		}
		return $data;
	}

	public function deleteUser($id)
	{
		$this->conn->query("DELETE FROM `users` WHERE id = $id ");
	}


	public function updateUser($firstName, $lastName, $birthd, $active, $id)
	{
		$this->conn->query("UPDATE `users` SET `firstname` = '$firstName', `lastname` = '$lastName', `birthd` = '$birthd', `active` = '$active' WHERE id = $id ");
	}
}
