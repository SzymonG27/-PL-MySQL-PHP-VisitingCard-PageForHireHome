<?php
	$adm = false;
	if (isset($_COOKIE['adm']) && isset($_COOKIE['adm']) == true) {
		$adm = true;
	}

	$conn = @new mysqli("localhost", "id10464215_userdb1", "Polak123", "id10464215_domki");
	if ($conn->connect_error) {
		die("Error: ".$conn->connect_error);
	}
	$conn->query("SET NAMES 'utf8'");

	$sql_query = "SELECT * FROM content";
	$result = $conn->query($sql_query);
	if ($result->num_rows > 0) {
		$row = $result->fetch_assoc();
		$header = $row['fheader'];
		$motto = $row['sheader'];
		$desc = $row['description'];
		$name = $row['full_name'];
		$mail = $row['mail'];
		$phone = $row['phone'];
	}

	$conn->close();
?>


<!DOCTYPE html>
<html lang="pl-PL">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,700&display=swap&subset=latin-ext" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=DM+Serif+Display&display=swap&subset=latin-ext" rel="stylesheet"> 
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
	<link href="libraries/css/aos.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Righteous&display=swap&subset=latin-ext" rel="stylesheet"> 
	<link rel="stylesheet" href="libraries/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="style_nav.css">
	<link rel="stylesheet" type="text/css" href="style_index.css">
	<meta name="description" content="Przyjechałeś do pracy do Żor lub okolic i potrzebujesz pokojów do wynajęcia? Świetnie trafiłeś! Zapoznaj się z naszą ofertą pokoi dla pracowników!">
	<title>Pokoje dla pracowników | Żory</title>
</head>

<body>
	<?php include "nav.php" ?>
	<script src="nav_resp.js"></script>

	<section class="parallax-window aos-init aos-animate" data-parallax="scroll" data-image-src="chmurki.jpg" data-speed="0.4">
		<div id="parallax-text-center" data-aos="zoom-in" data-aos-duration="1200">
			<h1><?php echo $header ?></h1>
			<h3><?php echo $motto ?></h3>
		</div>
	</section>

	<?php if ($adm === true): ?>
		<form action="content_settings.php" id="form-settings" method="post">
			<input type="submit" name="photo_settings" value="Opcje Administratora" class="btn btn-outline-info btn-lg">
		</form>
	<?php endif ?>

	<div class="container">
		<div class="row">
			<section id="o-nas" class="col-md-10 ml-auto mr-auto mt-5 w-100">
				<h2>O Domku</h2>
				<div id="carousel" class="carousel slide" data-ride="carousel" data-interval="3500">
				  <div class="carousel-inner">
				    <div class="carousel-item active">
				      <img class="d-block w-100 img-fluid" src="pok1.jpg" alt="First slide">
				    </div>
				    <div class="carousel-item">
				      <img class="d-block w-100 img-fluid" src="pok2.jpg" alt="Second slide">
				    </div>
				    <div class="carousel-item">
				      <img class="d-block w-100 img-fluid" src="pok3.jpg" alt="Third slide">
				    </div>
				  </div>
				</div>
				<div id="text-onas" class="ml-auto mr-auto col-sm-10 col-md-8">
					<p><?php echo $desc ?></p>
				</div>
			</section>
		</div>
	</div>

	<div id="section-box-small" class="container">
		<div class="container">
			<div class="row">
				<section class="ml-auto mr-auto w-100" style="margin-top: 80px">
					<div class="row">
						<article class="box-small col-11 col-md-5 mr-auto" id="box-contact" data-aos="zoom-in-right">
							<h2>Kontakt</h2>
							<div class="box-sm-text" id="box-contact-text">
								<p><?php echo $name ?></p>
								<br>
								<p><?php echo $mail ?></p>
								<br>
								<p>Telefon <?php echo $phone ?></p>
							</div>
						</article>

						<article class="box-small col-11 col-md-5 ml-auto" id="box-price" data-aos="zoom-in-left">
							<h2>Cennik</h2>
							<div class="box-sm-text">
								<p>Cena za 1 dzień: xxx-xxx PLN</p>
								<br>
								<p>Cena za 2 dni: xxx-xxx PLN</p>
								<br>
								<p>Cena za miesiąc</p>
								<br>
								<p>Cena za rok i 6 miesięcy: xxxxxx PLN</p>
							</div>
						</article>
					</div>
					<div style="clear: both;"></div>
				</section>
			</div>
		</div>
	</div>

	<footer>
		
	</footer>


	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="libraries/js/aos.js"></script>
	<script src="libraries/js/bootstrap.min.js"></script>
	<script src="libraries/parallax/parallax.js"></script>
	<script type="text/javascript">
		AOS.init({
			duration: 600
		});
	</script>
</body>
</html>