<?php
require_once ('includes/config.inc.php');
require_once ('mysqli_connect.php');
$page_title = 'les Etapes';
include ('includes/header.php');

if(!isset($_SESSION['first_name'])){
    $url = BASE_URL . 'login.php';
    ob_end_clean();
    header('Location: '.$url);
    exit();
}
//
//$s = $db->query("SELECT step FROM users WHERE first_name ='". $_SESSION['first_name'] ."'");
//$r = $s->fetch_assoc();
//
//if($r['step'] !== $_GET['id']){
    $q = $db->query('UPDATE users SET step='. $_GET['id'] .' WHERE first_name ="'. $_SESSION['first_name'] .'"');
//}

if($_GET['id'] == 'step_1'){
    include "includes/step_1.php";
}elseif ($_GET['id'] == 'step_2') {
    include "includes/step_2.php";
}elseif ($_GET['id'] == 'step_3') {
    include "includes/step_3.php";
}else {
    include "includes/step_4.php";
}



