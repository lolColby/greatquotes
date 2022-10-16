
<?php
require_once('../csv_util.php');
session_start();
if(!isset($_SESSION['logged']) || $_SESSION['logged']!=true) {
    die( 'Go away!');
}
?>
<html>
    <body>
        <h1> Welcome, <?= $_SESSION['email'] ?>!</h1>
        <a href="signout.php">Sign out</a><br />

        <?php
            displayAllQuotes("../quotes/");
        ?>
    </body>
</html

