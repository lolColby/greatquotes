<?php
session_start();
// if the user is alreay signed in, redirect them to the members_page.php page

//if(isset($_SESSION['logged']) && $_SESSION['logged']==true) header('location: private.php');


// use the following guidelines to create the function in auth.php
// instead of using "die", return a message that can be printed in the HTML page
if(count($_POST)>0){
	// check if the fields are empty
	if(!isset($_POST['email'])) die('please enter your email');
	if(!isset($_POST['password'])) die('please enter your email');
	
	// check if the email is valid
	if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) die('Your email is invalid');
	
	// check if password length is between 8 and 16 characters
	if(strlen($_POST['password'])<8) die('Please enter a password >=8 characters');
	if(strlen($_POST['password'])>16) die('Please enter a password <=16 characters');
	
	// check if the password contains at least 2 special characters
	if ( !preg_match("/[\'^£$%&*()}{@#~?><>,|=_+!-]/", $_POST['password'])) die('Please enter a password with a special character');
/*
	// check if the file containing banned users exists
	if(file_exists('../data/banned.csv.php')) {
		// check if the email has not been banned
		$fh=fopen('../data/banned.csv.php', 'r');
		$index=0;
		while ($line=fgets($fh)) {
			if ($line=$_POST['email']) die('This email has been banned');
		}
		fclose($fh);
	}

	// check if the file containing users exists
	if(file_exists('../data/users.csv')) {
		// check if the email is in the database already
		$fh=fopen('../data/users.csv', 'r');
		$index=0;
		while ($line=fgets($fh)) {
			if ($line=$_POST['email']) die('This email is already associated with another account');
		}
		fclose($fh);
	}
*/
	if(count($_POST)>0){
		$fh=fopen('../data/users.csv','a+');
		// encrypt password // save the user in the database 
		fputs($fh,$_POST['email'].';'.password_hash($_POST['password'],PASSWORD_DEFAULT).PHP_EOL);
		fclose($fh);
		// show them a success message and redirect them to the sign in page
		die('You created your account. Sign in please');
	} 

}
// improve the form
?>
<form method="POST">
	<input type="email" name="email" placeholder="Email" />
	<input type="password" name="password"  placeholder="password" />
	<button type="submit">Create account</button>
</form>
