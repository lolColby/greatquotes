<?php
session_start();
require_once('auth.php');
is_logged();
signUp();
// improve the form
?>
<form method="POST">
	<input type="email" name="email" placeholder="Email" />
	<input type="password" name="password"  placeholder="password" />
	<button type="submit">Create account</button>
</form>
