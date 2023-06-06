<?php

class LogIn extends DB
{
	protected function getUser($username, $parola)
	{
		$stmt = $this->connect()->prepare(
			"SELECT parola_useri FROM useri WHERE numeCont_useri = ? OR email_useri = ?;"
		);

		if (!$stmt->execute([$username, $username])) {
			$stmt = null;
			header("location: ../../pages/login.php?error=getUserFailed");
			exit();
		}

		if ($stmt->rowCount() == 0) {
			$stmt = null;
			header("location: ../../pages/login.php?error=user_inexistent");
			exit();
		}

		$pswHash = $stmt->fetchAll(PDO::FETCH_ASSOC);
		$verif_psw = password_verify($parola, $pswHash[0]["parola_useri"]);
		if ($verif_psw) {
			$stmt = $this->connect()->prepare(
				"SELECT * FROM useri WHERE numeCont_useri = ? OR email_useri = ? AND parola_useri = ?"
			);
			if (!$stmt->execute([$username, $username, $parola])) {
				$stmt = null;
				header(
					"location: ../../pages/login.php?error=username_sau_parola_incorecte"
				);
				exit();
			}
			if ($stmt->rowCount() == 0) {
				$stmt = null;
				header("location: ../../pages/login.php?error=user_inexistent");
				exit();
			}

			$login = $stmt->fetchAll(PDO::FETCH_ASSOC);

			session_start();
			$_SESSION["idUser"] = $login[0]["id_useri"];
			$_SESSION["unameUser"] = $login[0]["numeCont_useri"];

			$stmt = null;
		} else {
			$stmt = null;
			header("location: ../../pages/login.php?error=parola_incorecta");

			exit();
		}
	}
}
