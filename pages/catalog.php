<?php
include "../templates/header.php";
$u_name = "root";
$pwd = "";
$db_handler = new PDO("mysql:host=localhost;dbname=myDB", $u_name, $pwd);

$data = $db_handler->query("SELECT * FROM uleiuri");
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
    .footer{
        position: relative;
        overflow: hidden;
    }
    
   
</style>




<h1 class="catalog-title">Catalog</h1>
<div class="catalog-container">
    <?php foreach ($data as $row) { ?>
    <div class="catalog-item">
    <a href="../pages/item-page.php?ik=<?php echo $row["id"]; ?>" class="card">
    <img src="<?php echo $row["file_path"]; ?>" alt="image not found">
    <h2 class="catalog-item-title"><?php echo $row["denumire"]; ?></h2>
    </a>
    <div class="catalog-buttons">
    <a href="<?php echo $row[
    	"link"
    ]; ?>" target="_blank" class="catalog-buy-button">Cumpara</a>
    <?php
    $favorite = $db_handler->prepare(
    	"SELECT * FROM favorite WHERE product_id=?"
    );
    $favorite->execute([$row["id"]]);
    if ($favorite->rowCount() == 0) { ?>
    <button class="catalog-favorite-button"><a href="../scripts/php/add-favorite.php?id=<?php echo $row[
    	"id"
    ]; ?>&uid=<?php echo $_SESSION[
	"idUser"
]; ?>">Adauga la favorite</a></button>
    <?php } else { ?>
    <button class="catalog-delete-favorite-button"> <a href="../scripts/php/remove-favorite.php?id=<?php echo $row[
    	"id"
    ]; ?>&uid=<?php echo $_SESSION[
	"idUser"
]; ?>">Sterge din favorite</a> </button><?php }
    ?>
</div>

    </div>
   <?php } ?>
</div>
<script src="../scripts/js/script.js"></script>
<?php include "../templates/footer.php";
?>
