<?php

if(file_exists('../data/quotes.csv')) {
    if(isset($_POST['confirm'])){
    $line_counter=0;
    $new_file_content='';
    $fh=fopen('../data/quotes.csv','r');
    while ($line=fgets($fh)) {
        if($line_counter==$_GET['index'])$new_file_content.=PHP_EOL;
        else $new_file_content.=$line;
        $line_counter++;
    }
    fclose($fh);
    file_put_contents('../data/quotes.csv', $new_file_content);
    echo "Quote successfully deleted.";
    ?>
    <p><a href="index.php">Back to Index</a>
    <?php
    die();
}
}
//display quote
$line_counter=0;
$fh=fopen("../data/quotes.csv", "r");
while ($line=fgets($fh)) {
    if($line_counter==$_GET['index']) {
        list($id,$quote)=explode(";", $line);
        echo '<h1>'.$quote.'</h1>';
    }
    $line_counter++;

}
//display author
fclose($fh);
$line_counter=0;
$fh=fopen("../data/authors.csv", "r");
while ($line=fgets($fh)) {
    if($line_counter==$_GET['index']) {
        echo '-'.$line.'<br />';
    }
    $line_counter++;

}
fclose($fh);

if(!isset($_GET['index'])) {
    die('Please enter the quote you want to delete');
}

?>
<form method="POST">
    <p>Are you sure you want to delete this quote?</p>
    <input type="submit" name="confirm" value="Confirm"/>
</form>

