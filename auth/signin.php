<?php
session_start();
require_once('auth.php');
is_logged();
signIn();
// if the user is alreay signed in, redirect them to the members_page.php page

//if(isset($_SESSION['logged']) && $_SESSION['logged']==true) header('location: private.php');

// use the following guidelines to create the function in auth.php
//instead of using "die", return a message that can be printed in the HTML page
/*if(count($_POST)>0){

	// 1. check if email and password have been submitted
	if(!isset($_POST['email']) || !isset($_POST['password'])) die('please enter your email and password');

	// 2. check if the email is well formatted
	if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) die('Your email is invalid');

	// 3. check if the password is well formatted
	/*if(strlen($_POST['password'])<8 || strlen($_POST['password'])>16 || 
	!preg_match("/[\'^£$%&*()}{@#~?><>,|=_+!-]/", $_POST['password'])) die('Incorrect password format');

	// 4. check if the file containing banned users exists
	if(file_exists('../data/banned.csv.php')) {
		// 5. check if the email has been banned
		$fh=fopen('../data/banned.csv.php', 'r');
		$index=0;
		while ($line=fgets($fh)) {
			if ($line=$_POST['email']) die('This email has been banned');
		}
		fclose($fh);
	}

	// 6. check if the file containing users exists
	if(file_exists('../data/users.csv')) {
		// 7. check if the email is registered
		$fh=fopen('../data/users.csv', 'r');
		$index=0;
		while ($line=fgets($fh)) {
			if (!$line=$_POST['email']) die('You need to create an account');
		}
		fclose($fh);
	}
	$fh=fopen('../data/users.csv','r');
	while($line=fgets($fh)){
		$line=trim($line);
		$line=explode(';',$line);;
		if($line[0]==$_POST['email']){
			// 8. check if the password is correct
			if(password_verify($_POST['password'],$line[1])){
				// 9. store session information
				$_SESSION['logged']=true;
				$_SESSION['email']=$_POST['email'];
				// 10. redirect the user to the members_page.php page
				header('location: private.php');
			}else die('Not today: incorrect password');
		}
	}
	fclose($fh);
	die('Not today: you must create an account first');
}
	
	

	
	
	/*
	echo 'check email+password';
	if(true){
		$_SESSION['logged']=true;
		
	}else $_SESSION['logged']=false;
	*/

// improve the form
?>
<form method="POST">
	<input type="email" name="email" placeholder="email" />
	<input type="password" name="password" placeholder="password"/>
	
	<input type="submit" value="submit" />
</form>
