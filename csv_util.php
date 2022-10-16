<?php

//read content of csv file into a php array

function readIntoArray () {
    $author = file('../data/authors.csv', FILE_IGNORE_NEW_LINES);
}

//display list of quotes and their authors

function displayAllQuotes($path) {
    ?>
    <a href="../quotes/create.php">Create New Quote</a><br />
    <a href="../authors/create.php">Add new author</a><br />
    <?php
    $author = file('../data/authors.csv', FILE_IGNORE_NEW_LINES);
    $fh=fopen('../data/quotes.csv','r');
    $index=0;
    while ($line=fgets($fh)) {
        if(strlen(trim($line))>0) {
            list($id,$quote)=explode(";", $line);
            echo'<h1><p>'.$quote.'  -'.$author[$id].'</p>
            (<a href="'.$path.'detail.php?index='.$id.'">details</a>)
            </h1>';
            $index++;
        }
}
}

//create a new quote

function addQuote () {
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
            fputs($fh,$_POST['name'].';'.$_POST['quote'].PHP_EOL);
            fclose($fh);
            echo 'Thanks for adding '.$_POST['quote'].' to our website!';
        }
    };
}
// modify specific quote
function modifyQuote () {
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
}

//delete quote

function deleteQuote() {
    if(file_exists('../data/quotes.csv')) {
        if(isset($_POST['confirm'])){
        $line_counter=0;
        $new_file_content='';
        $fh=fopen('../data/quotes.csv','r');
        while ($line=fgets($fh)) {
            if($line_counter==$_GET['index'])$new_file_content.=PHP_EOL;
            else $new_file_content.=$line;
            $line_counter++;
        }
        fclose($fh);
        file_put_contents('../data/quotes.csv', $new_file_content);
        echo "Quote successfully deleted.";
        ?>
        <p><a href="../auth/private.php">Back to Index</a>
        <?php
        die();
    }
}
}

//display quote
function displayQuote(){
    $line_counter=0;
    $fh=fopen("../data/quotes.csv", "r");
    while ($line=fgets($fh)) {
        if($line_counter==$_GET['index']) {
            list($id,$quote)=explode(";", $line);
            echo '<h1>'.$quote.'</h1>';
        }
        $line_counter++;

    }
    fclose($fh);
}
//display author
function displayAuthor(){
    $line_counter=0;
    $fh=fopen("../data/authors.csv", "r");
    while ($line=fgets($fh)) {
        if($line_counter==$_GET['index']) {
            echo $line;
        }
        $line_counter++;

    }
    fclose($fh);
    }

    function displayAllQuotesPublic() {
        $author = file('../data/authors.csv', FILE_IGNORE_NEW_LINES);
        $fh=fopen('../data/quotes.csv','r');
        $index=0;
        while ($line=fgets($fh)) {
            if(strlen(trim($line))>0) {
                list($id,$quote)=explode(";", $line);
                echo'<h1><p>'.$quote.'  -'.$author[$id].'</p>
                (<a href="../quotes/detailPublic.php?index='.$id.'">details</a>)
                </h1>';
                $index++;
            }
    }
    }
    