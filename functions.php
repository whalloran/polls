
<?php 

// Database Connection
require_once "admin/config.php";

// Header
function template_header($title) {
	echo <<<EOT
	<!DOCTYPE html>
	<html lang="en">
		<head>
			<meta charset="utf-8">
			<title>$title</title>
			<link href="style.css?v=1.1" rel="stylesheet" type="text/css">
			<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
			<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
			<link rel="stylesheet" href="https://code.jquery.com/jquery-3.6.0.min.js">
		</head>
		<body>
		<nav class="navtop">
			<div>
				<h1>Poll Machine</h1>
				<a href="index.php"><i class="fas fa-poll"></i>Polls</a>
			</div>
		</nav>
	EOT;
}

// Header - Admin Poll Management
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
				<h1><a href="../index.php" title="Poll Machine">Poll Machine</a></h1>
				<a href="../index.php"><i class="fas fa-poll"></i>Polls</a>
			</div>
		</nav>
	EOT;
}

// function login_info() {
	
// 	session_start();
	 
// 	if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
// 		header("location: admin/login.php");
// 		exit;
// 	}

// }


// Footer
function template_footer() {
	echo <<<EOT
	    </body>
	</html>
	EOT;
}

?>