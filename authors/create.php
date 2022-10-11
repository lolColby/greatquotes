<p><a href="index.php">Index Page</a></p>
<hr/>

<?php

if(count($_POST)>0){
    $error='';
    if(file_exists('../data/authors.csv')) {
    $fh=fopen('../data/authors.csv','r');
    while ($line=fgets($fh)) {
        if($_POST['name']==trim($line)) {
            $error='The author already exists';
        }
    }
    fclose($fh);
}
    if(strlen($error>0)) echo $error;
    else {
        $fh=fopen('../data/authors.csv','a');
        fputs($fh,$_POST['name'].PHP_EOL);
        fclose($fh);
        echo 'Thanks for adding '.$_POST['name'].' to our website!';
    }
};


?>




<form method="POST">
    <input type="text" name="name" /> <br />
    <button type="submit"> Add Author </button>
</form>