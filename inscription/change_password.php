<?php


require_once ('includes/config.inc.php');
$page_title = 'change password';
include ('includes/header.php');

if(!isset($_SESSION['first_name'])){
    $url = BASE_URL . 'login.php';
    ob_end_clean();
    header('Location: '.$url);
    exit();
}

if(isset($_POST['submitted'])){
    require_once (MYSQL);

    $p = FALSE;
    if(isset( $_POST['password1'] ) && trim( $_POST['password1'] ) != ''  ){
        if($_POST['password1'] == $_POST['password2']) {
            $p = mysqli_real_escape_string($db, $_POST['password1']);

        }else {
            echo '<p class="error">Your password did not match the confirmed password!</p>';

        }

    }else {
        echo '<p class="error">Please enter a valid password!</p>';

    }
    if($p) {
        $q = "UPDATE users SET pass=SHA('$p') WHERE user_id={$_SESSION['user_id']} LIMIT 1";
        $r = mysqli_query($db, $q) or trigger_error("Query: $q\n<br/> MySql Error: " . mysqli_error($db));

        if(mysqli_affected_rows($db) == 1) {
            echo '<h3>Your password has been changed</h3>';
            mysqli_close($db);
            include('includes/footer.php');
            exit();
        } else {
            echo '<p class="error">Your password was not changed . Make sure your new password is different than the current password
                    Contact the adminitrator if you think an error occurred.</p>';

        }
    }else {
        echo '<p class="error">Please try again!</p>';

    }
    mysqli_close($db);
}?>


    <h1>Reset password</h1>
    <p>Enter your email adress below and your password will be reset.</p>
    <form action="change_password.php" method="post">
        <fieldset>
            <p><b>New password: </b><input type="password" name="password1" size="20" maxlength="20" >
                <small>Use only letters and numbers. Must be between 4 and 20 characters long.</small></p>
            <p><b>Confirm New password: </b><input type="password" name="password2" size="20" maxlength="20"></p>
            <div align="center"><input type="submit" name="submit" value="change password"/></div>
            <input type="hidden" name="submitted" value="TRUE"/>
        </fieldset>
    </form>

<?php
include('includes/footer.php');
?>