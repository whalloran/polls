
<?php 

require_once "admin/config.php";

/* Template and database connection functions 
function pdo_connect_mysql() {

	$DATABASE_HOST = 'localhost';
	$DATABASE_USER = 'root';
	$DATABASE_PASS = '';
	$DATABASE_NAME = 'phppoll';

	 try {
    	return new PDO('mysql:host=' . $DATABASE_HOST . ';dbname=' . $DATABASE_NAME . ';charset=utf8', $DATABASE_USER, $DATABASE_PASS);
    } catch (PDOException $exception) {
    	// If there is an error with the connection, stop the script and display the error.
    	die ('Failed to connect to database!');
    }
}
*/

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

	function login_info() {
		echo <<<EOT
		
		EOT;
		}


// Template footer
function template_footer() {
echo <<<EOT
    </body>
</html>
EOT;
}

?>