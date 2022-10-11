<a href="create.php">Create New</a>
<?php

$fh=fopen('../data/authors.csv','r');
$index=0;
while ($line=fgets($fh)) {
    if(strlen(trim($line))>0) 
        echo '<h1><a href="detail.php?index='.$index.'">'.trim($line).'</a>
        (<a href="detail.php?index='.$index.'">details</a>)
        (<a href="delete.php?index='.$index.'">delete</a>)
        (<a href="modify.php?index='.$index.'">modify</a>)
        </h1>';
    $index++;
}
fclose($fh);