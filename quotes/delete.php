<?php
if(!isset($_GET['index'])) {
    die('Please enter the quote you want to delete');
}

if(file_exists('../data/quotes.csv')) {
$line_counter=0;
$new_file_content='';
$fh=fopen('../data/quotes.csv','r');

while ($line=fgets($fh)) {
    if($line_counter==$_GET['index']) $new_file_content.=PHP_EOL;
    else $new_file_content.=$line;
    $line_counter++;
}
fclose($fh);
file_put_contents('../data/quotes.csv', $new_file_content);
echo "Quote successfully deleted.";

}
?>
<p><a href="index.php">Back to Index</a>