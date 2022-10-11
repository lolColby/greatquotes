<p><a href="index.php">Index Page</a></p>
<p><a href="modify.php?index=.'.$_GET['index'].'">Modify Page</a></p>
<hr/>

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


//<p><a href="delete.php?index='.$_GET['index'].'">Delete</a></p>