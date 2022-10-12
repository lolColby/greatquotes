<?php
//check if quote exists already
if(count($_POST)>0){
    $error='';
    if(file_exists('../data/quotes.csv')) {
    $fh=fopen('../data/quotes.csv','r');
    while ($line=fgets($fh)) {
        if($_POST['quote']==trim($line)) {
            $error='The quote already exists';
        }
    }
    fclose($fh);
}
//add quote to database
    if(strlen($error>0)) echo $error;
    else {
        $fh=fopen('../data/quotes.csv','a');
        fputs($fh,$_POST['quote'].PHP_EOL);
        fclose($fh);
        echo 'Thanks for adding '.$_POST['quote'].' to our website!';
    }
};
?>



<!-- form for adding quote -->
<form method="POST">
    <input type="text" name="quote" /> <br />
    <button type="submit"> Add Quote </button>
</form>
<?php /*
<!-- drop down list for selecting author of the quote -->
<label for="name">Select the author of your quote:<label> <br/>
<select name="name">
    <?php
    
    $fh=fopen('../data/authors.csv','r');
    $index=0;
    while ($line=fgets($fh)) {
        if(strlen(trim($line))>0) 
            echo '<option value="'.$index.'">'.trim($line).'</option>';
        $index++;
    }
    fclose($fh);
    ?>
</select>
*/
?>
<p><a href="index.php">Back to Index</a>