<?php
$q = $db->query('UPDATE users SET step="'. $_GET['id'] .'" WHERE first_name ="'. $_SESSION['first_name'] .'"');?>



<a href="?id=step_4">step 4</a>