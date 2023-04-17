<?php

require "vendor/autoload.php";

// 1. What does this function session_start() do to the application?
// It stores every bit of user information that the user has
// inputted across the website to maintain changes that has been
// made. Although, it will only last when the current web browser
// is still open.

session_start();
session_destroy();
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Analogy Exam Registration</title>
</head>
<body style="background-image:url(bg/1.jpg); background-repeat:no-repeat; background-attachment:fixed; background-position:center; background-size:cover; font-family:Lucida Sans Unicode;">

<div style="background-color:rgba(255,255,255,0.7); border-radius:25px; padding:25px; margin-top:30px; margin-left:500px; margin-right:500px;" align="center">
	<h1>Analogy Exam Registration</h1>
	<h3>Kindly register your basic information before starting the exam.</h3>
</div>
	
	<div style="background-color:rgba(255,255,255,0.7); border-radius: 25px; padding: 25px; margin-top:30px; margin-left:500px; margin-right:500px;" align="center">
		<form method="POST" action="register.php">
			<b>Enter your full name</b>.<br />
			<input type="text" name="fullname" placeholder="Full Name" required />
			<br />

			<b>Enter your Email</b>.<br />
			<input type="email" name="email" placeholder="Email"/>
			<br />

			<b>Enter your Birthdate.</b><br />
			<label for="birthday">Birthday:</label>
			<input type="date" id="birthday" name="birthday"><br />

			<br /><input type="submit">
		</form>
	</div>
</body>
</html>

<!-- DEBUG MODE -->
<pre style="color:#fff; background-color:rgba(255,128,0,0.7); border-radius:25px; padding:25px; margin-top:30px; margin-left:500px; margin-right:500px;">
<?php
var_dump($_SESSION);
?>
</pre>