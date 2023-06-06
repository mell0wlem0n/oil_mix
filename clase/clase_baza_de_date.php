<?php

class DB
{
	protected function connect()
	{
		try {
			$u_name = "root";
			$pwd = "";
			$db_handler = new PDO("mysql:host=localhost;dbname=myDB", $u_name, $pwd);
			return $db_handler;
		} catch (PDOException $error) {
			print $error->getMessage();
			die();
		}
	}
}
