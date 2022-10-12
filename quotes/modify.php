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
            $new_file_content.=$_POST['quote'].PHP_EOL;
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
            $quote=trim($line);
        }
        $line_counter++;

    }
    fclose($fh);

    ?>
    <form method="POST">
        <input type="text" name="quote" value="<?= $quote ?>"/> <br />
        <button type="submit"> Modify Quote </button>
    </form>
    <?php
}
?>

<p><a href="index.php">Index Page</a></p>