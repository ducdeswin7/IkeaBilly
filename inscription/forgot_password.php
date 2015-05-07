<?php

require_once ('includes/config.inc.php');
$page_title = 'Forgot password';
include ('includes/header.php');
// verification du formulaire

if(isset($_POST['submitted'])){
    require_once (MYSQL);
    $uid = FALSE;
    if(!empty($_POST['email'])){
        $q = "SELECT user_id FROM users WHERE email = '".mysqli_real_escape_string($db, $_POST['email'])."'";
        $r = mysqli_query($db, $q) or trigger_error("Query: $q\n<br/> MySql Error: " . mysqli_error($db));

        if(mysqli_affected_rows($db) == 1 ){
            $row = mysqli_fetch_array($r, MYSQLI_NUM)[0];
            $uid = $row;

        }else {
            echo '<p class="error">The submitted email adress does\'nt match those on file!!!</p>';

        }
    }else {
        echo '<p class="error">You forgot to enter your adress email!!</p>';

    }

    if($uid) {
        $p = substr( md5(uniqid(rand(), true)), 3, 10);
        $q = "UPDATE users SET pass = SHA1('$p') WHERE user_id= $uid LIMIT 1";
        $r = mysqli_query($db, $q) or trigger_error("Query: $q\n<br/> MySql Error: " . mysqli_error($db));
        if(mysqli_affected_rows($db)==1){
            $body = "Your password to log into our site has been temporaly change to ' $p '.
                    Please log in using this password and this email adress. Then you may change your password to something more familiar!!! ";
            mail($_POST['email'], 'Your temporaly password', $body , 'From: admin@localhost.com');
            echo '<h3>Your password has been changed. you will receive the new temporaly password at the email adress with which you registered.
                    Once you have logged in which this passwird , you may change it by clicking on the "Change Password" Link.</h3>';
            mysqli_close($db);
            include('includes/footer.php');
            exit();


        }else {
            echo '<p class="error">Your password could not be changed due to system error. We apologize for any inconvenience.</p>';

        }
    }else {
        echo '<p class="error">Please try again</p>';

    }
    mysqli_close($db);
}?>

<h1>Reset password</h1>
<p>Enter your email adress below and your password will be reset.</p>
<form action="forgot_password.php" method="post">
    <fieldset>
        <p><b>Email adress: </b><input type="email" name="email" size="20" maxlength="40" value="<?php
            if(isset($_POST['email'])){  echo $_POST['email']; }?>"/></p>
        <div align="center"><input type="submit" name="submit" value="Reset password"/></div>
        <input type="hidden" name="submitted" value="TRUE"/>
    </fieldset>
</form>

<?php
include('includes/footer.php');
?>