<?php
ini_set('display_errors', 1);

// demarrage de la bufferisation de sorti '
ob_start();

//initialisation de session

session_start();

// verification de la presehce d'une valeur $page_title

if(!isset($page_title)){
    $page_title = "User registration";
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo $page_title; ?></title>
    <link rel="stylesheet" href="layout.css"/>
</head>
<body>
<div id="header"></div>
<div id="content">