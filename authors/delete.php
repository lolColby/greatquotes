<?php
if(file_exists('../data/authors.csv')) {
    if(isset($_POST['confirm'])){
    $line_counter=0;
    $new_file_content='';
    $fh=fopen('../data/authors.csv','r');
    while ($line=fgets($fh)) {
        if($line_counter==$_GET['index'])$new_file_content="Anonymous Author".PHP_EOL;
        else $new_file_content.=$line;
        $line_counter++;
    }
    fclose($fh);
    file_put_contents('../data/authors.csv', $new_file_content);
    echo "Auhtor successfully deleted.";
    ?>
    <p><a href="../auth/private.php">Back to Index</a>
    <?php
    die();
}
}
?>

<p><a href="index.php">Back to Index</a>
<form method="POST">
    <p>Are you sure you want to delete this author?</p>
    <input type="submit" name="confirm" value="Confirm"/>
</form>