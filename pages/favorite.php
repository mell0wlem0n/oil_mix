<?php
include "../templates/header.php";
$u_name = "root";
$pwd = "";
$db_handler = new PDO("mysql:host=localhost;dbname=myDB", $u_name, $pwd);

$data = $db_handler->prepare("SELECT * FROM favorite WHERE user_id=?");
$data->execute([$_SESSION["idUser"]]);
?>
<style>
    /* @media only screen and (max-height: 1300px){
        .footer{
            position: relative;
        }
    }
    @media only screen and (max-width: 1844px){
        .footer{
            position: relative;
        }
    } */
    
    
   
</style>

<script src="../scripts/js/script.js"></script>


<h1 class="catalog-title">Favorite</h1>
<div id="catalog-container" class="catalog-container">
    <?php foreach ($data as $row) {

    	$aux = $db_handler->prepare("SELECT * FROM uleiuri WHERE id=?");
    	$aux->execute([$row["product_id"]]);
    	foreach ($aux as $roww);
    	?>
    <div class="catalog-item">
    <a href="../pages/item-page.php?ik=<?php echo $roww["id"]; ?>" class="card">
    <img src="<?php echo $roww["file_path"]; ?>" alt="image not found">
    <h2 class="catalog-item-title"><?php echo $roww["denumire"]; ?></h2>
    </a>
    <div class="catalog-buttons">
    <a href="<?php echo $roww[
    	"link"
    ]; ?>" target="_blank" class="catalog-buy-button">Cumpara</a>
    <?php
    $favorite = $db_handler->prepare(
    	"SELECT * FROM favorite WHERE product_id=?"
    );
    $favorite->execute([$roww["id"]]);
    if ($favorite->rowCount() != 0) { ?>
   
    <button class="catalog-delete-favorite-button"> <a href="../scripts/php/remove-favorite-page.php?id=<?php echo $roww[
    	"id"
    ]; ?>&uid=<?php echo $_SESSION[
	"idUser"
]; ?>">Sterge din favorite</a> </button><?php }
    ?>
    
</div>

    </div>
   <?php
    } ?>
</div>
<script src="../scripts/js/script.js"></script>
<?php include "../templates/footer.php";
?>
