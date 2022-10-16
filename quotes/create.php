<?php
require_once('../csv_util.php');
addQuote();
?>


<!-- form for adding quote -->
<form method="POST">
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
    <input type="text" name="quote" /> <br />
    <button type="submit"> Add Quote </button>
</form>



<p><a href="../auth/private.php">Index Page</a></p>