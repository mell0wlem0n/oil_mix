<?php

class signUp extends DB
{
	protected function setUser($nume, $prenume, $username, $email, $parola)
	{
		$stmt = $this->connect()->prepare(
			"INSERT INTO useri (nume_useri,prenume_useri,numeCont_useri,email_useri,parola_useri) VALUES (?,?,?,?,?);"
		);
		$pswHash = password_hash($parola, PASSWORD_DEFAULT);
		if (!$stmt->execute([$nume, $prenume, $username, $email, $pswHash])) {
			$stmt = null;
			header("location: ../../signUp.php?error=setUserFailed");
			exit();
		}
		$stmt = null;
	}
}
