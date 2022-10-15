<p><a href="index.php">Index Page</a></p>
<p><a href="modify.php?index=<?= $_GET['index']?>">Modify Page</a></p>
<p><a href="delete.php?index=<?= $_GET['index']?>">Delete Page</a></p>
<hr/>

<?php
require_once('../csv_util.php');
displayQuote();
displayAuthor();