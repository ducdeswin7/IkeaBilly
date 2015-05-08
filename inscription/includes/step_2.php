<?php
$q = $db->query('UPDATE users SET step="'. $_GET['id'] .'" WHERE first_name ="'. $_SESSION['first_name'] .'"');?>

step 2

<a href="?id=step_3">step 3</a>