<?php

// add parameters
function signup(){

}

// add parameters
function signin(){
	// add the body of the function based on the guidelines of signin.php
	if(count($_POST)>0){
		$fh=fopen('users.csv','r');
		while($line=fgets($fh)){
			$line=trim($line);
			$line=explode(';',$line);
			echo $line[0];
			echo $_POST['email'];
			echo '<hr />';
			if($line[0]==$_POST['email']){
				if(password_verify($_POST['password'],$line[1])){
					$_SESSION['logged']=true;
					$_SESSION['email']=$line[0];
					$_SESSION['products']=[];
					header('location: private.php');
				}else die('Not today: incorrect password');
			}
		}
		fclose($fh);
		die('Not today: you must create an account first');
	}
	
}

function signout(){
	// add the body of the function based on the guidelines of signout.php
	
}

function is_logged(){
	// check if the user is logged
	//return true|false
}