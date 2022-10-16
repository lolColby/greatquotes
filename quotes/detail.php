<p><a href="../auth/private.php">Index Page</a></p>
<p><a href="modify.php?index=<?= $_GET['index']?>">Modify Quote</a></p>
<p><a href="delete.php?index=<?= $_GET['index']?>">Delete Quote</a></p>
<p><a href="../authors/modify.php?index=<?= $_GET['index']?>">Modify Author</a></p>
<p><a href="../authors/delete.php?index=<?= $_GET['index']?>">Delete Author</a></p>
<hr/>

<?php
require_once('../csv_util.php');
displayQuote();
displayAuthor();