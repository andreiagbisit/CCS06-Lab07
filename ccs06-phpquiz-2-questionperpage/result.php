<?php

require "vendor/autoload.php";
require "download.php";

//session_start();

// 4.

use App\QuestionManager;

$score = null;
try {
    $manager = new QuestionManager;
    $manager->initialize();


    if (!isset($_SESSION['answers'])) {
        throw new Exception('Missing answers');
    }
    $score = $manager->computeScore($_SESSION['answers']);
	$_SESSION['Score'] = $score;
	$_SESSION['Qnumber'] = $manager->getQuestionSize();
} catch (Exception $e) {
    echo '<h1>An error occurred:</h1>';
    echo '<p>' . $e->getMessage() . '</p>';
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Thank You!</title>
</head>
<body style="background-image:url(bg/3.jpg); background-repeat: no-repeat; background-attachment: fixed; background-position: center; background-size: cover; font-family:Lucida Sans Unicode;">

<div style="background-color:rgba(255,255,255,0.7); border-radius:25px; padding:25px; margin-left:500px; margin-top:30px; margin-right:500px;" align="center">
<h1>Thank You!</h1>
<p style="color: gray">
    You've completed the exam.
</p>
</div>

<div style="background-color:rgba(255,255,255,0.7); border-radius:25px; padding:25px; margin-left:500px; margin-top:30px; margin-right:500px;" align="center">
<h3>
    Congratulations, <?php echo $_SESSION['user_fullname']; ?>!
    <?php echo "(". $_SESSION[ 'user_email' ]. ")"; ?><br>
    Your score is: <span style="color:#009600;"><?php echo $score; ?></span> out of <?php echo $manager->getQuestionSize() ;?><br>
<?php $ex = $manager->Question($_SESSION["answers"]);?> </h3>

<form action = "result.php" method ="POST">
<input type="submit" value="Download Results" name="download">
</form>
</div>

</body>
</html>

<!-- DEBUG MODE -->
<pre style="color:#fff; background-color:rgba(255,128,0,0.7); border-radius: 25px; padding: 25px; margin-top:30px; margin-bottom:30px; margin-left:500px; margin-right:500px;">
<?php
var_dump($_SESSION);
var_dump($_POST);
?>
</pre>