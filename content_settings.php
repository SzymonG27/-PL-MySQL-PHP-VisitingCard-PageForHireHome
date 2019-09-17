<?php
	if ($_COOKIE['adm'] != true || $_COOKIE['zalogowany'] != true) {
		header("Location: index.php");
	}

	if (isset($_POST['log_out'])) {
		setcookie("zalogowany", "", time()-3600, "/");
		setcookie("adm", "", time()-3600, "/");
		unset($_COOKIE['zalogowany']);
		unset($_COOKIE['adm']);
		unset($_POST['log_out']);

		if (!isset($_COOKIE['zalogowany']) && !isset($_COOKIE['adm'])) {
			header("Location: index.php");
		}
	}


	$conn = @new mysqli("localhost", "id10464215_userdb1", "Polak123", "id10464215_domki");
	if ($conn->connect_error) {
		die("Error: ".$conn->connect_error);
	}
	$conn->query("SET NAMES 'utf8'");

	$sql_query = false;

	if (isset($_POST['set_header'])) {
		$header = $_POST['fheader'];
		$sql_query = "UPDATE content SET fheader='$header' WHERE ID='1'";
	} elseif (isset($_POST['set_motto'])) {
		$sheader = $_POST['sheader'];
		$sql_query = "UPDATE content SET sheader='$sheader' WHERE ID='1'";
	} elseif (isset($_POST['set_desc'])) {
		$desc = $_POST['desc'];
		$sql_query = "UPDATE content SET header='$desc' WHERE ID='1'";
	} elseif (isset($_POST['set_name'])) {
		$full_name = $_POST['full_name'];
		$sql_query = "UPDATE content SET name='$full_name' WHERE ID='1'";
	} elseif (isset($_POST['set_mail'])) {
		$mail = $_POST['mail'];
		$sql_query = "UPDATE content SET mail='$mail' WHERE ID='1'";
	} elseif (isset($_POST['set_phone'])) {
		$phone = $_POST['phone_nr'];
		$sql_query = "UPDATE content SET phone='$phone' WHERE ID='1'";
	}

	if (isset($sql_query) && $sql_query != false) {
		if ($conn->query($sql_query) === true) {
			header("Location: success.php");
		}
	}

	$conn->close();
?>

<!DOCTYPE html>
<html lang="pl-PL">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" type="text/css" href="libraries/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="style_content_settings.css">
	<title>Ustawienia strony</title>
</head>
<body>
	
	<div id="container">
		<div id="opis">
			<h1>Panel do konfiguracji strony</h1>
		</div>

		<div class="row">
			<main class="col-lg-8 col-md-10 ml-auto mr-auto">
				<form method="post">
					<input type="submit" name="log_out" value="Wyloguj się" class="btn btn-outline-info btn-lg d-block ml-auto mr-auto mb-5 mt-2">

					<div class="form-group col-lg-8 col-md-10 ml-auto mr-auto ml-2">
						<label for="fheader">Pierwszy nagłówek (max. 50 liter)</label>
						<input type="text" name="fheader" id="fheader" class="form-control">
						<input type="submit" name="set_header" value="Zmień nagłówek" class="btn btn-outline-info btn-lg d-block ml-auto mr-auto mb-5 mt-2">
					</div>

					<div class="form-group col-lg-8 col-md-10 ml-auto mr-auto ml-2">
						<label for="sheader">Motto (max. 30 liter)</label>
						<input type="text" name="sheader" id="sheader" class="form-control">
						<input type="submit" name="set_motto" value="Zmień motto" class="btn btn-outline-info btn-lg d-block ml-auto mr-auto mb-5 mt-2">
					</div>

					<div class="form-group col-lg-8 col-md-10 ml-auto mr-auto ml-2">
						<label for="textarea_home">Opis domku/firmy</label>
						<textarea class="form-control" name="desc" id="desc" rows="3"></textarea>
						<input type="submit" name="set_desc" value="Zmień opis" class="btn btn-outline-info btn-lg d-block ml-auto mr-auto mb-5 mt-2">
					</div>

					<div class="form-group col-lg-8 col-md-10 ml-auto mr-auto ml-2">
						<label for="full_name">Imię i nazwisko</label>
						<input type="text" name="full_name" id="full_name" class="form-control">
						<input type="submit" name="set_name" value="Zmień dane osobowe" class="btn btn-outline-info btn-lg d-block ml-auto mr-auto mb-5 mt-2">
					</div>

					<div class="form-group col-lg-8 col-md-10 ml-auto mr-auto ml-2">
						<label for="mail">Mail</label>
						<input type="text" name="mail" id="mail" class="form-control">
						<input type="submit" name="set_mail" value="Zmień e-mail" class="btn btn-outline-info btn-lg d-block ml-auto mr-auto mb-5 mt-2">
					</div>

					<div class="form-group col-lg-8 col-md-10 ml-auto mr-auto ml-2">
						<label for="phone_nr">Numer telefonu</label>
						<input type="text" name="phone_nr" id="phone_nr" class="form-control">
						<input type="submit" name="set_phone" value="Zmień numer" class="btn btn-outline-info btn-lg d-block ml-auto mr-auto mb-5 mt-2">
					</div>
				</form>
			</main>
		</div>
	</div>

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="libraries/js/bootstrap.min.js"></script>
</body>
</html>