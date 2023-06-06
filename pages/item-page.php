<?php
include "../templates/header.php";
$u_name = "root";
$pwd = "";
$db_handler = new PDO("mysql:host=localhost;dbname=myDB", $u_name, $pwd);
$db_handler->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$test = $db_handler->query("SET NAMES 'utf8'");
$data = $db_handler->query(
	"SELECT * FROM uleiuri WHERE id=" . $_GET["ik"] . "; "
);
$favq = $db_handler->prepare(
	"SELECT * FROM favorite WHERE user_id=? AND product_id=?"
);
$favq->execute([$_SESSION["idUser"], $_GET["ik"]]);
?>
<style>
    @media only screen and (max-width: 979px) {
	.footer{
        position: relative;
    }}
    @media only screen and (max-height: 870px) {
	.footer{
        position: relative;
    }
    }

</style>
<script src="../scripts/js/script.js"></script>
<div class="item-container">
    <?php foreach ($data as $row) { ?>
    <div class="top-section">
    <div class="item-title">
    <img src="<?php echo $row["file_path"]; ?>" alt="image not found">
    <h1><?php echo $row["denumire"]; ?></h1>
    <div class="catalog-buttons">
    <a href="<?php echo $row[
    	"link"
    ]; ?>" target="_blank" class="catalog-buy-button">Cumpara</a>
    <?php if ($favq->rowCount() != 0) { ?>
   
            <button class="catalog-delete-favorite-button"> <a href="../scripts/php/remove-favorite-itemp.php?id=<?php echo $row[
            	"id"
            ]; ?>&uid=<?php echo $_SESSION[
	"idUser"
]; ?>">Sterge din favorite</a> </button><?php } else { ?>
        <button class="catalog-favorite-button"><a href="../scripts/php/add-favorite-itemp.php?id=<?php echo $row[
        	"id"
        ]; ?>&uid=<?php echo $_SESSION[
	"idUser"
]; ?>">Adauga la favorite</a></button>
    <?php } ?>
    </div>
    </div>
    <div class="item-description">
    <h1>Descriere</h1>
    <p><?php echo mb_convert_encoding(
    	$row["descriere"],
    	"UTF-8",
    	mb_detect_encoding($row["descriere"])
    ); ?></p>
  </div>
  </div>
  <div class="bottom-section">
        <div id="ingr" class="item-ingredients">
        <h1>Ingrediente</h1>
        <p>
            <?php echo mb_convert_encoding(
            	$row["ingrediente"],
            	"UTF-8",
            	mb_detect_encoding($row["ingrediente"])
            ); ?>
        </p>
        </div>
        <div class="item-instructions">
        <h1>Utilizare</h1>
        <p>
        <?php echo mb_convert_encoding(
        	$row["utilizare"],
        	"UTF-8",
        	mb_detect_encoding($row["utilizare"])
        ); ?>
        </p>
        </div>
        </div>
    <?php } ?>
</div>


<?php include "../templates/footer.php";
?>
