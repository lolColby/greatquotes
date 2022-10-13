<?php
if(count($_POST)>0) {
    if(!isset($_GET['index'])) {
        die('Please enter the quote you want to delete');
    }
    if(file_exists('../data/quotes.csv')) {
        $line_counter=0;
        $new_file_content='';
        $fh=fopen('../data/quotes.csv','r');
        
        while ($line=fgets($fh)) {
            if($line_counter==$_GET['index'])
            $new_file_content.=$_GET['index'].';'.$_POST['quote'].PHP_EOL;
            else $new_file_content.=$line;
            $line_counter++;
        };
        fclose($fh);
        
        file_put_contents('../data/quotes.csv', $new_file_content);
        echo "You have successfully modified the quote";
        }
}
else {
    $quote='';
    $line_counter=0;
    $fh=fopen("../data/quotes.csv", "r");
    while ($line=fgets($fh)) {
        if($line_counter==$_GET['index']) {
            list($id,$quote)=explode(";", $line);
        }
        $line_counter++;

    }
    fclose($fh);
    $author='';
    $line_counter=0;
    $fh=fopen("../data/authors.csv", "r");
    while ($line=fgets($fh)) {
        if($line_counter==$_GET['index']) {
            $author=trim($line);
        }
        $line_counter++;
    }
    fclose($fh);

    ?>
    <form method="POST">
        <input type="text" name="quote" value="<?= $quote ?>"/> <br />
        <label for="modify"><?= $author ?></label><br />
        <button type="submit" name="modify"> Modify Quote </button>
    </form>
    <?php
}
?>

<p><a href="index.php">Index Page</a></p>