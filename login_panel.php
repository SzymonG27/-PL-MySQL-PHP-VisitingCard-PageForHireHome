<?php
	session_start();

	if (isset($_COOKIE['adm']) && isset($_COOKIE['zalogowany'])) {
		header("Location: index.php");
	}

	if (isset($_POST['issub'])) {

		$ok = true;
		if (empty($_POST['login']) || empty($_POST['haslo'])) {
			$ok = false;
			$_SESSION['warning'] = "Pole loginu lub hasła jest puste!";
		}

		if ($ok == true) {
			$conn = @new mysqli("localhost", "id10464215_userdb1", "Polak123", "id10464215_domki");
			if ($conn->connect_error) {
				die("Error: ".$conn->connect_error);
			}
			$conn->query("SET NAMES 'utf-8'");

			$login = $_POST['login'];
			$haslo = $_POST['haslo'];
			$login = htmlentities($login, ENT_QUOTES, "UTF-8");

			$sql_query = "SELECT * FROM konta_adm WHERE login='$login'";

			$result = $conn->query($sql_query);
			if ($result->num_rows > 0) {
				$row = $result->fetch_assoc();
				if (password_verify($haslo, $row['haslo'])) {
					setcookie("zalogowany", true, 0, "/");
					setcookie("adm", true, 0, "/");
					unset($_POST['issub']);
					header("Location: index.php");
				} else {
					unset($_POST['issub']);
					//warn2
				}
			} else {
				unset($_POST['issub']);
				//warn2
			}

			$conn->close();
		}

		unset($_POST['issub']);
	}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="libraries/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="style_login.css">
	<title>Logowanie</title>
</head>

<body>
	<main>
		<form method="post">
			<div class="container">
				<div class="form-row">
					<div class="holder col-lg-8 col-md-10 ml-auto mr-auto">
						<div class="form-group col-lg-7 col-md-10 ml-auto mr-auto">
							<label for="login">Login</label>
							<input type="text" class="form-control" id="login" name="login" placeholder="Login" onfocus="this.placeholder=''" onblur="this.placeholder='Login'">
						</div>

						<div class="form-group col-lg-7 col-md-10 ml-auto mr-auto">
							<label for="haslo">Hasło</label>
							<input type="password" class="form-control" id="haslo" name="haslo" placeholder="Hasło" onfocus="this.placeholder=''" onblur="this.placeholder='Hasło'">
						</div>

						<?php if (isset($_SESSION['warning'])): ?>
							<div class="col-lg-7 col-md-10 ml-auto mr-auto warn"><?php echo $_SESSION['warning'] ?></div>
							<?php unset($_SESSION['warning']) ?>
						<?php endif ?>

						<div class="form-group col-lg-7 col-md-10 ml-auto mr-auto">
							<input type="submit" class="btn btn-lg btn-outline-info button-sub" name="issub" value="Zaloguj się">
						</div>
					</div>
				</div>
			</div>
		</form>
	</main>
</body>
</html>