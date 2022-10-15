<?php
require_once('../csv_util.php');
deleteQuote();
displayQuote();
displayAuthor();
?>
<form method="POST">
    <p>Are you sure you want to delete this quote?</p>
    <input type="submit" name="confirm" value="Confirm"/>
</form>
<p><a href="index.php">Index Page</a></p>

