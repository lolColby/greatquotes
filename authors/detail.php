<?php
$line_counter=0;
$fh=fopen("../data/authors.csv", "r");
while ($line=fgets($fh)) {
    if($line_counter==$_GET['index']) {
        echo $line;
    }
    $line_counter++;

}
fclose($fh);