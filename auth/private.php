<?php

session_start();
if(!isset($_SESSION['logged']) || $_SESSION['logged']!=true) {
    die( 'Go away!');
}
?>
<html>
    <body>
        <h1> Welcome, <?= $_SESSION['email'] ?>!</h1>
        <?php
            print_r($_SESSION['products']);
        ?>
    </body>
</html
