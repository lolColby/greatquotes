<a href="create.php">Create New Quote</a>

<?php
//list all entries
$fh=fopen('../data/authors.csv','r');
$index=0;
while ($line=fgets($fh)) {
    if(strlen(trim($line))>0)
        $author=trim($line);
        $index++;
        $fh=fopen('../data/quotes.csv','r');
        $index=0;
            while ($line=fgets($fh)) {
                if(strlen(trim($line))>0)
                    list($id,$quote)=explode(";", $line);
                    echo'<h1><p>'.$quote.'  -'.$author.'</p>
                        (<a href="detail.php?index='.$index.'">details</a>)
                        (<a href="delete.php?index='.$index.'">delete</a>)
                        (<a href="modify.php?index='.$index.'">modify</a>)
                        </h1>';
                        $index++;
    }
}

fclose($fh);



/*$fh2=fopen('../data/authors.csv','r');
        $index2=0;
        while ($line=fgets($fh2)) {
            if(strlen(trim($line))>0)
            $id=$index;
            echo '<h1><a href="detail.php?index='.$index.'">'.$quote.'</a>
            (<a href="detail.php?index='.$index.'">details</a>)
            (<a href="delete.php?index='.$index.'">delete</a>)
            (<a href="modify.php?index='.$index.'">modify</a>)
            </h1>';
            $index2++;
        }
*/