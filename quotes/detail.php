<p><a href="index.php">Index Page</a></p>
<p><a href="modify.php?index=<?= $_GET['index']?>">Modify Page</a></p>
<p><a href="delete.php?index=<?= $_GET['index']?>">Delete Page</a></p>
<hr/>

<?php
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
        echo $line;
    }
    $line_counter++;

}
fclose($fh);