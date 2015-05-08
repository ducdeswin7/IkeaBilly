<?php
$q = $db->query('UPDATE users SET step="'. $_GET['id'] .'" WHERE first_name ="'. $_SESSION['first_name'] .'"');?>

step 4

<a href="index.php">home</a>