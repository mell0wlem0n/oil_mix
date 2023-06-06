<?php

class controllerSignup extends signUp
{
	private $nume;
	private $prenume;
	private $username;
	private $email;
	private $parola;
	private $parola_rep;

	public function __construct(
		$nume,
		$prenume,
		$username,
		$email,
		$parola,
		$parola_rep
	) {
		$this->nume = $nume;
		$this->prenume = $prenume;
		$this->username = $username;
		$this->email = $email;
		$this->parola = $parola;
		$this->parola_rep = $parola_rep;
	}

	public function SignUpUsr()
	{
		if (!$this->null_inp()) {
			header("location:../../pages/signUp.php?error=nullInput");
			exit();
		}

		if (!$this->validare_nume()) {
			header("location:../../pages/signUp.php?error=nume");
			exit();
		}
		if (!$this->validare_prenume()) {
			header("location:../../pages/signUp.php?error=prenume");
			exit();
		}
		if (!$this->validare_username()) {
			header("location:../../pages/signUp.php?error=username");
			exit();
		}
		if (!$this->validare_email()) {
			header("location:../../pages/signUp.php?error=email");
			exit();
		}
		if (!$this->validare_parola_repetata()) {
			header("location:../../pages/signUp.php?error=parole_diferite");
			exit();
		}
		if (!$this->verif_numeCont_existent()) {
			header(
				"location:../../pages/signUp.php?error=UsernameOrEmailAlreadyExists"
			);
			exit();
		}

		$this->setUser(
			$this->nume,
			$this->prenume,
			$this->username,
			$this->email,
			$this->parola
		);
	}

	private function null_inp()
	{
		if (empty($this->nume)) {
			return false;
		} elseif (empty($this->prenume)) {
			return false;
		} elseif (empty($this->username)) {
			return false;
		} elseif (empty($this->email)) {
			return false;
		} elseif (empty($this->parola)) {
			return false;
		} elseif (empty($this->parola_rep)) {
			return false;
		}

		return true;
	}
	private function validare_nume()
	{
		if (preg_match("/^[a-zA-Z]*$/", $this->nume)) {
			return true;
		} else {
			return false;
		}
	}

	private function validare_prenume()
	{
		if (preg_match("/^[a-zA-Z]*$/", $this->prenume)) {
			return true;
		} else {
			return false;
		}
	}
	private function validare_username()
	{
		if (preg_match("/^[a-zA-Z0-9_]*$/", $this->username)) {
			return true;
		} else {
			return false;
		}
	}

	private function validare_email()
	{
		if (filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
			return true;
		} else {
			return false;
		}
	}
	private function validare_parola_repetata()
	{
		if ($this->parola === $this->parola_rep) {
			return true;
		} else {
			return false;
		}
	}

	private function verif_numeCont_existent()
	{
		if ($this->validare_nume($this->username, $this->email)) {
			return true;
		} else {
			return false;
		}
	}
}
