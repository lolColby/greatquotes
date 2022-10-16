<?php

function signup(){
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
		/*if(file_exists('../data/users.csv')) {
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
			echo 'You created your account. Sign in please';
			?>
			<br /><a href="signin.php">Sign in</a><br />
			<?php
			die();
		} 
	
	}
}

function signin(){
	if(count($_POST)>0){

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
				if ($line=$_POST['email']) die('You need to create an account');
			}
			fclose($fh);
		}
		*/
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
		
		
}

function signout(){
	// if the user is not logged in, redirect them to the public page
	if(!isset($_SESSION['logged'])) header('location: public.php');
	unset($_SESSION['logged']);
	session_destroy();
	// redirect the user to the public page.
	header('location: public.php');
}

function is_logged(){
	if(isset($_SESSION['logged']) && $_SESSION['logged']==true) header('location: private.php');
}