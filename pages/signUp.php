<?php
include_once "../templates/header.php"; ?>

<style>
	@media only screen and (max-height: 813px) {
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
	if ($_GET["error"] === "nume") {
		echo "<script>alert('Format nume invalid!')</script>";
	} elseif ($_GET["error"] === "prenume") {
		echo "<script>alert('Format prenume invalid!')</script>";
	} elseif ($_GET["error"] === "username") {
		echo "<script>alert('Format username invalid!')</script>";
	} elseif ($_GET["error"] === "email") {
		echo "<script>alert('Format email invalid!')</script>";
	} elseif ($_GET["error"] === "parole_diferite") {
		echo "<script>alert('Parolele nu se potrivesc')</script>";
	} elseif ($_GET["error"] === "UsernameOrEmailAlreadyExists") {
		echo "<script>alert('Username sau Email deja existent')</script>";
	} elseif ($_GET["error"] === "nullInput") {
		echo "<script>alert('Nu ati introdus toate campurile')</script>";
	} elseif ($_GET["error"] === "none") {
		echo "<script>alert('Contul a fost create cu succes!')</script>";
	}
} ?>

<div class="signUp">
	<h1>Sign Up</h1>
	<form class="signup-form" action="../../Proiect final EWD/scripts/php/signUp_inc.php"  method="post">
		<div class="nume">
			<label for="nume">Nume:</label>

			<input type="text" id="nume" name="nume" />
		</div>
		<div>
			<label for="prenume">Prenume:</label>
			<input type="text" name="prenume" id="prenume" />
		</div>
		<div>
			<label for="username">Nume cont:</label>
			<input type="text" name="username" id="username" />
		</div>
		<div>
			<label for="email">Email:</label>
			<input type="text" id="email" name="email" />
		</div>
		<div>
			<label for="parola">Parola:</label>
			<input type="password" name="parola" id="parola" />
		</div>
		<div>
			<label for="reenter_psw">Reintroduceti parola:</label>
			<input type="password" name="psw_rep" id="psw_rep" />
		</div>
		<div class="form_buttons">
			<div style="font-size: 15px;">
				Aveti deja cont?
				<a href="../../Proiect final EWD/pages/login.php">Log In</a>
			</div>
			<button type="submit" name="submit" style="width: 80px;font-size: 15px">Sign Up</button>
		</div>
	</form>
</div>

<?php include_once "../templates/footer.php";
?>
