<?php
if(!isset($_GET['index'])) {
    die('Please enter the author you want to delete');
}

if(file_exists('../data/authors.csv')) {
$line_counter=0;
$new_file_content='';
$fh=fopen('../data/authors.csv','r');

while ($line=fgets($fh)) {
    if($line_counter==$_GET['index']) $new_file_content.=PHP_EOL;
    else $new_file_content.=$line;
    $line_counter++;
}
fclose($fh);

file_put_contents('../data/authors.csv', $new_file_content);

}












?>