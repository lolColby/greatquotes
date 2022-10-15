<?php
session_start();
// if the user is not logged in, redirect them to the public page
if(!isset($_SESSION['logged'])) header('location: public.php');
unset($_SESSION['logged']);
session_destroy();
header('location: public.php');
// use the following guidelines to create the function in auth.php
$_SESSION['logged']=false;
session_destroy();
// redirect the user to the public page.