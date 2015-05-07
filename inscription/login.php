<?php
require_once ('includes/config.inc.php');
$page_title = 'Login';
include ('includes/header.php');

if(isset($_POST['submitted'])){

    require_once (MYSQL);

    if(!empty($_POST['email'])) {
        $e = mysqli_real_escape_string($db, $_POST['email']);
    }else {
        $e = FALSE;
        echo '<p class="error">You forgot to enter email adress!!</p>';
    }

    if (!empty($_POST['pass'])){
        $p = mysqli_real_escape_string($db, $_POST['pass']);
    }else {
        $p = FALSE;
        echo '<p class="error">You forgot to enter your password!!</p>';
    }


    if($e && $p){
        $q = "SELECT user_id, first_name, user_level FROM users WHERE
                email = '$e' AND pass = SHA1('$p') AND active IS NOT NULL";
        $r = mysqli_query($db, $q) or trigger_error("Query: $q\n<br/> MySql Error: " . mysqli_error($db));
var_dump($r);

        if(mysqli_affected_rows($db) == 1) {

var_dump(mysqli_num_rows($r) == 1);

            $_SESSION = mysqli_fetch_array($r, MYSQLI_ASSOC);
            mysqli_free_result($r);
            mysqli_close($db);
            $url = BASE_URL . 'index.php';
            ob_end_clean();
            header('Location: '. $url);
            exit();
        } else {
            echo '<p class="error">Either the email adress and password entered dossier not match those file or you have noe yet activate your account !!!</p>';
        }
    } else {
        echo '<p class="error">Please try again!!</p>';
    }
    mysqli_close($db);

}
?>

<h1>Login</h1>
<p>Your browser must allow cookies in order to log in.</p>
<form action="login.php" method="post">
    <fieldset>
        <p><b>Email adress : </b><input type="text" name="email" size="20" maxlength="40"/></p>
        <p><b>Password: </b><input type="password" name="pass" size="20" maxlength="20"/></p>
        <div align="center"><input type="submit" name="submit" value="login"/></div>
        <input type="hidden" name="submitted" value="TRUE"/>
    </fieldset>
</form>


<?php

include('includes/footer.php');

?>