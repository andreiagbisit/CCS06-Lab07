<?php

require "vendor/autoload.php";

session_start();
// 2. Why do you think the session variable assignments are wrapped inside an if-else and try-catch statements?
// Before a user can leave index.php to proceed to the quiz page/s (quiz.php), one must fill at least the user's
// full name that is mandatory as part of the collected inputs as part of the current session, for the quiz
// answers chosen by that user to be saved. Otherwise, it will not let the user proceed to the quiz proper
// (quiz.php) if they haven't filled out at least their full name. However, if there some of the variables or
// function names are mistyped or missing, it'll prompt to a blank page with an <h1> element with the phrase,
// "An error occurred", along with the specific error that the user has encountered.

try {
    if (isset($_POST['fullname'])) {
        $_SESSION['user_fullname'] = $_POST['fullname'];
        $_SESSION['user_email'] = $_POST['email'];
        $_SESSION['user_birthday'] = $_POST['birthday'];

        header('Location: quiz.php');
        exit;
    } else {
        throw new Exception('Missing the basic information.');
    }
} catch (Exception $e) {
    echo '<h1>An error occurred:</h1>';
    echo '<p>' . $e->getMessage() . '</p>';
}