<?php
$u_name = "root";
$pwd = "";
$db_handler = new PDO("mysql:host=localhost;dbname=myDB", $u_name, $pwd);
$data = $db_handler->prepare(
	"INSERT INTO favorite (user_id,product_id) VALUES (?,?);"
);
$data->execute([$_GET["uid"], $_GET["id"]]);
$data = null;
header("location: ../../pages/item-page.php?ik=".$_GET["id"]);
