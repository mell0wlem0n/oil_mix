<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$nume = htmlspecialchars($_POST["nume"], ENT_QUOTES, "UTF-8");
	$prenume = htmlspecialchars($_POST["prenume"], ENT_QUOTES, "UTF-8");
	$username = htmlspecialchars($_POST["username"], ENT_QUOTES, "UTF-8");
	$email = htmlspecialchars($_POST["email"], ENT_QUOTES, "UTF-8");
	$parola = htmlspecialchars($_POST["parola"], ENT_QUOTES, "UTF-8");
	$parola_rep = htmlspecialchars($_POST["psw_rep"], ENT_QUOTES, "UTF-8");
	include "../../clase/clase_baza_de_date.php";
	include "../../clase/clase_signup.php";
	include "../../clase/control_signup.php";
	$signUp = new controllerSignup(
		$nume,
		$prenume,
		$username,
		$email,
		$parola,
		$parola_rep
	);
	$signUp->SignUpUsr();

	header("location:../../index.php");
}
