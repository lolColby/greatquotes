<p><a href="index.php">Index Page</a></p>
<p><a href="modify.php?index='.$_GET.'">Modify Page</a></p>
<hr/>

<?php
$line_counter=0;
$fh=fopen("../data/quotes.csv", "r");
while ($line=fgets($fh)) {
    if($line_counter==$_GET['index']) {
        echo $line;
    }
    $line_counter++;

}
fclose($fh);