<?php
require_once('includes/config.inc.php');
$page_title = 'Activate your account';
 include('includes/header.php');
$x = $y = FALSE;

if(isset($_GET['x']) && filter_var($_GET['x'], FILTER_VALIDATE_EMAIL)){

    $x = $_GET['x'];

}
if(isset($_GET['y']) && (strlen($_GET['y'])==32)){
    $y = $_GET['y'];
}

if($x && $y) {
    require_once(MYSQL);

    $q = "UPDATE users SET active = Null WHERE (email='" . mysqli_real_escape_string($db, $x) . "' AND active= '" . mysqli_real_escape_string($db, $y) . "')";
    $r = mysqli_query($db, $q) or trigger_error("Query: $q\n<br/>MySQL ERROR: " . mysqli_error($db));


    if (mysqli_affected_rows($db) == 1) {
        echo '<h3>Your accout is now active. You may now log in</h3>';
    } else {
        echo '<p class="error">Your account could not be activated.Please re-check the link or contact the administrator.</p>';
    }
    mysqli_close($db);
}else {
    $url = BASE_URL. 'login.php';
    ob_end_clean();
    header("Location: $url");
    exit();
}
include('includes/footer.php');