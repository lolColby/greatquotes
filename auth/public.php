<?php
    require_once('../csv_util.php');
?>
<html>
    <body>
        <h1> Welcome to great quotes!</h1>
        <a href="signup.php">Sign up</a><br />
        <a href="signin.php">Sign in</a><br />
        <?php
            displayAllQuotesPublic("../quotes/");
        ?>
    </body>
</html