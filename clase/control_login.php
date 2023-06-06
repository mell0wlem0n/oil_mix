<?php

class controllerLogin extends LogIn
{
	private $username;
	private $parola;

	public function __construct($username, $parola)
	{
		$this->username = $username;
		$this->parola = $parola;
	}

	public function LoginUsr()
	{
		if (!$this->null_inp()) {
			header("location: ../../pages/login.php?error=nullInput");
			exit();
		}

		$this->getUser($this->username, $this->parola);
	}

	private function null_inp()
	{
		if (empty($this->username)) {
			return false;
		} elseif (empty($this->parola)) {
			return false;
		}

		return true;
	}
}
