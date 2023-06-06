<footer class="footer">
    <div class="footer-flex">
        <div class="footer-left">
            <div class="footer-logo">
                <a href="index.php"><img src="../../Proiect final EWD/media/poze/logouri/logo.jpg" alt="" /></a>
            </div>
            <div class="footer-menu">
                <ul class="footer-menu-left" style="width: 130px;">
                    <li><a href="../../Proiect final EWD/index.php">Acasa</a></li>
                    <?php if (isset($_SESSION["idUser"])) { ?>
                        <li><a href="../../Proiect final EWD/pages/catalog.php">Catalog</a></li>
                        <li><a href="../../Proiect final EWD/pages/favorite.php"> Favorite</a></li>
                    <?php } ?>
                </ul>
                <ul class="footer-menu-right">
                <?php if (!isset($_SESSION["idUser"])) { ?>
                   <li> <a href="../../Proiect final EWD/pages/login.php">Login</a></li>
                   <li><a href="../../Proiect final EWD/pages/signUp.php">Sign Up</a></li>
                    <?php } else { ?>
                   <li> <a href="../../Proiect final EWD/scripts/php/logout_inc.php">Log Out</a></li>
                    <?php } ?>
                </ul>
            </div>
        </div>
        <div class="title">
            <p>OIL MIX</p>
        </div>
        <div class="footer-right">
            <ul>
                <li class="contact"> Contact </li>
                <li class="email">Email:<a rel="noreferrer" href="mailto:vlad.stoie03@e-uvt.ro" target="_blank">
                        vlad.stoie03@e-uvt.ro</a></li>
            </ul>
        </div>
    </div>
</footer>
</div>
</body>

</html>