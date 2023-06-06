<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$username = htmlspecialchars($_POST["login_username"],ENT_QUOTES,"UTF-8");
	$parola = htmlspecialchars($_POST["parola"],ENT_QUOTES,"UTF-8");

	include "../../clase/clase_baza_de_date.php";
	include "../../clase/clase_login.php";
	include "../../clase/control_login.php";
	$login = new controllerLogin($username, $parola);
	$login->LoginUsr();

	header("location:../../index.php");
}
