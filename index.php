<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: admin/login.php");
    exit;
}

if ($_SESSION["admin"] !== 0) {
    header("location: admin.php");
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
		<!-- <a href="admin/logout.php" class="logout">Logout</a>  -->
	</div>
<h2>Polls</h2>
    
    <div>
	<p style="padding-left: 5px;">Welcome! Let your voice be heard and vote in the polls below.</p>
	
    <!-- Polls Table -->
    <table>
        <thead>
            <tr>
                <td>Title</td>
                <td><!-- Buttons --></td>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($polls as $poll): ?>
                <tr>
                    <td class="poll-titles"> 
                        <a href="vote.php?id=<?=$poll['id']?>"><?=$poll['title']?></a>
                    </td>
                    <td class="actions">
					    <a href="vote.php?id=<?=$poll['id']?>" class="vote" title="Vote"><i class="fas fa-check-square fa-s"></i></a>
                        <a href="result.php?id=<?=$poll['id']?>" class="view" title="View Results"><i class="fas fa-poll fa-s view-poll"></i></a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?=template_footer()?>