<?php
$u_name = "root";
$pwd = "";
$db_handler = new PDO("mysql:host=localhost;dbname=myDB", $u_name, $pwd);
$data = $db_handler->prepare(
	"DELETE FROM favorite WHERE user_id=? and product_id=?"
);
$data->execute([$_GET["uid"], $_GET["id"]]);
$data = null;
header("location: ../../pages/catalog.php");
