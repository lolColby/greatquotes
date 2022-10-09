<?php

$fh=fopen('../data/authors.csv','r');
$index=0;
while ($line=fgets($fh)) {
    if(strlen(trim($line))>0) 
        echo '<h1>(<a href="detail.php?index='.$index.'">detail</a>)
        (<a href="delete.php?index='.$index.'">delete</a>)</h1>';
    $index++;
}
fclose($fh);