<?php

// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: admin/login.php");
    exit;
}

// Get user id from users table

// Check if user has voted for this poll
// If has voted, redirect to results
$voteuser = $_SESSION['id'];
$votepoll = $_GET['id'];
// $voteanswer = $_POST['poll_answer'];

/* List of answers for the specified poll, answer selection */

include 'functions.php';
// Connect to MySQL
$pdo = pdo_connect_mysql();
// If the GET request "id" exists (poll id)...
if (isset($_GET['id'])) {
    // MySQL query that selects the poll records by the GET request "id"
    $stmt = $pdo->prepare('SELECT * FROM polls WHERE id = ?');
    $stmt->execute([$_GET['id']]);


    // Fetch the record
    $poll = $stmt->fetch(PDO::FETCH_ASSOC);
    
    // Check if the poll record exists with the id specified
    if ($poll) {
        $poll_id = $_GET['id'];
        // MySQL query that selects all the poll answers
        $stmt = $pdo->prepare('SELECT * FROM poll_answers WHERE poll_id = ?');
        $stmt->execute([$poll_id]);
        
        // Fetch all the poll anwsers
        $poll_answers = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        // If the user clicked the "Vote" button...
        if (isset($_POST['poll_answer'])) {
            
            // Check if user has already voted in the poll
            $vote_check_query = "SELECT * FROM votes WHERE poll_id = $poll_id AND users_id = ?";
            $stmt = $pdo->prepare($vote_check_query);
            $stmt->execute([$_SESSION['id']]);
            $uservotecount = $stmt->rowCount();

            // If user has already voted, notify and redirect to Results Page
            if ($uservotecount !== 0) {
                //echo "<script>alert('You have already voted in this poll.');</script>";
                header("Location: result.php?id=$poll_id");                
                
             
            } 
            
            // If user has not previously voted in this poll, process the vote
            else {
            
            // Update 'poll_answers' table - increase vote for user's answer        
            $answers_query = "UPDATE poll_answers SET votes = votes + 1 WHERE id = ?";
            $stmt = $pdo->prepare($answers_query);
            $stmt->execute([$_POST['poll_answer']]);

            // Declare variables for votes table.. user id, poll id, answer id
            $voteuser = $_SESSION['id'];
            $votepoll = $_GET['id'];
            $voteanswer = $_POST['poll_answer'];
            
            // Update 'votes' table - record the vote 
            $votequery = "INSERT INTO votes (users_id, poll_id, user_answer) VALUES (?, ?, ?)";
            $stmt = $pdo->prepare($votequery);
           
            $stmt->execute([$voteuser, $votepoll, $voteanswer]);
            
            // Redirect user to the result page
            header ('Location: result.php?id=' . $_GET['id']);
            exit;
            }
        }
    } else {
        die ('Poll with that ID does not exist.');
    }
} else {
    die ('No poll ID specified.');
}

?>

<?=template_header('Poll Vote - ' . $poll['title'])?>

<div class="content poll-vote">
    
	<h2><?=$poll['title']?></h2>
	<p><?=$poll['desc']?></p>
    <form action="vote.php?id=<?=$_GET['id']?>" method="post">
        <?php for ($i = 0; $i < count($poll_answers); $i++): ?>
        <label>
            <input type="radio" name="poll_answer" value="<?=$poll_answers[$i]['id']?>"<?=$i == 0 ? ' checked' : ''?>>
            <?=$poll_answers[$i]['title']?>
        </label>
        <?php endfor; ?>
        <div>
            <input type="submit" value="Vote">
            <a href="result.php?id=<?=$poll['id']?>">View Results</a>
            <a href="index.php" id="go-back">Polls</a>
        </div>
    </form>
</div>

<?=template_footer()?>