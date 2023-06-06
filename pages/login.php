<?php
include_once "../templates/header.php"; ?>

<style>
    @media only screen and (max-height: 625px) and (max-width: 701px) {
        .footer {
            position: relative;
        }
    }

    @media only screen and (max-height: 650px) {
        .footer {
            position: relative;
        }
    }
    
    .mobile-menu {
        z-index: 100;
    }

    .mobile-menu li {
        z-index: 1000;
    }

    .hamburger {
        z-index: 1000;
    }
</style>

<?php if (isset($_GET["error"])) {
	if ($_GET["error"] === "parola_incorecta") {
		echo "<script>alert('Parola incorecta!')</script>";
	} elseif ($_GET["error"] === "username_sau_parola_incorecte") {
		echo "<script>alert('Username sau parola incorecte!')</script>";
	} elseif ($_GET["error"] === "user_inexistent") {
		echo "<script>alert('User inexistent!')</script>";
	} elseif ($_GET["error"] === "nullInput") {
		echo "<script>alert('Nu ati introdus toate campurile!')</script>";
	}
} ?>

<div class="login">
    <h1>Log In</h1>
    <form class="login-form" action="../../Proiect final EWD/scripts/php/login_inc.php" method="post">
        <div>
            <label for="login_username">Email \ Nume utilizator:</label>
            <input type="text" id="login_username" name="login_username" />
        </div>
        <div>
            <label for="parola">Parola:</label>
            <input type="password" name="parola" />
        </div>
        <div class="form_buttons">
            <div>Nu aveti cont? <a href="../../Proiect final EWD/pages/signUp.php">Sign Up</a></div>
            <button type="submit" name="submit" style="width: 80px;font-size: 15px">Log In</button>
        </div>
    </form>
</div>

<?php include_once "../templates/footer.php"; ?>
