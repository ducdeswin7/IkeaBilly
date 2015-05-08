<?php
require_once ('config.inc.php');
require_once ('mysqli_connect.php');
$page_title = 'les Etapes';

if(!isset($_SESSION['first_name'])){
    $url = BASE_URL . 'login.php';
    ob_end_clean();
    header('Location: '.$url);
    exit();
}
$q = $db->query('UPDATE users SET step='. $_GET['id'] .' WHERE first_name ="'. $_SESSION['first_name'] .'"');?>


sd'l;gklbsdhfdvflbldsjfgdsfuybhifvls