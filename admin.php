<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true ){
    header("location: admin/login.php");
    exit;
}
elseif($_SESSION["username"] !== "admin") {
    header("location: index.php");
    exit;
}
?>

<?php
	include 'functions.php';
	// Connect to MySQL
	$pdo = pdo_connect_mysql();
	// MySQL query that selects all the polls and poll answers
	$stmt = $pdo->query('SELECT p.*, GROUP_CONCAT(pa.title ORDER BY pa.id) AS answers FROM polls p LEFT JOIN poll_answers pa ON pa.poll_id = p.id GROUP BY p.id');
	$polls = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<?=template_header('Polls')?>

<div class="content home">
    <div style="width: 1000px; margin: 0 auto;">
        Logged in as: <strong><?php echo $_SESSION["username"] ?></strong>
        <a href="admin/logout.php" class="logout">Logout</a> 
    </div>
	<h2>Poll Management</h2>
	<p>Welcome administrator! Here you can create, delete and view polls.</p>
	<a href="create.php" class="create-poll">Create Poll</a>
	<table>
        <thead>
            <tr>
                <td>#</td>
                <td>Title</td>
				<td>Answers</td>
                <td></td>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($polls as $poll): ?>
            <tr>
                <td><?=$poll['id']?></td>
                <td><?=$poll['title']?></td>
				<td><?=$poll['answers']?></td>
                <td class="actions">
					<a href="result.php?id=<?=$poll['id']?>" class="view" title="View Results"><i class="fas fa-poll fa-s"></i></a>
                    <a href="delete.php?id=<?=$poll['id']?>" class="trash" title="Delete Poll"><i class="fas fa-trash fa-s"></i></a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?=template_footer()?>