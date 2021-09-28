<?php 

// Database Connection
require_once "admin/config.php";

// Header - Main
function template_header($title) {
	echo <<<EOT
	<!DOCTYPE html>
	<html lang="en">
		<head>
			<meta charset="utf-8">
			<title>$title</title>
			<link href="style.css?v=1.2" rel="stylesheet" type="text/css">
			<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
			<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
			<link href="https://fonts.googleapis.com/css2?family=Gluten:wght@300&display=swap" rel="stylesheet">
		</head>
		<body>
		<nav class="navtop">
			<div>
				<h1 >
					<a href="../index.php" title="Poll Machine" style="font-family: 'Gluten', cursive;">
						<i class="fas fa-cogs fa-lg"></i>
						Poll Machine
					</a>
				</h1>
				<a href="index.php"><i class="fas fa-poll"></i>Polls</a>
				<a href="admin/logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a>
			</div>
		</nav>
	EOT;
}

// Header - Admin Pages
function template_header_admin($title) {
	echo <<<EOT
	<!DOCTYPE html>
	<html lang="en">
		<head>
			<meta charset="utf-8">
			<title>$title</title>
			<link href="../style.css?v=1.1" rel="stylesheet" type="text/css">
			<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
			<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
		</head>
		<body>
		<nav class="navtop">
			<div>
				<h1 >
					<a href="../index.php" title="Poll Machine" style="font-family: 'Gluten', cursive;">
						<i class="fas fa-cogs fa-lg"></i>
						Poll Machine
					</a>
				</h1>
				<a href="../index.php"><i class="fas fa-poll"></i>Polls</a>
				<a href="logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a>
			</div>
		</nav>
	EOT;
}

// Footer
function template_footer() {
	echo <<<EOT
	    </body>
	</html>
	EOT;
}

?>