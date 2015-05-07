<?php
require_once('includes/config.inc.php');

$page_title = 'Register Page';

include ('includes/header.php');

if(isset($_POST['submitted'])){

    require_once (MYSQL);

   /* $trimmed = array_map('trim', $_POST);*/

$fn = $ls = $e = $p = FALSE;

// verification du first name

    if( isset( $_POST['first_name'] ) && trim( $_POST['first_name'] ) != ''  ){
//    if(preg_match('/^[A-Za-z \'.-]{2,50} $/i', $_POST['first_name'])){
        $fn = mysqli_real_escape_string($db, $_POST['first_name']);
    } else {
        echo '<p class="error">Please enter your first name!</p>';
    }
// verification du last name
    if(isset( $_POST['last_name'] ) && trim( $_POST['last_name'] ) != '') {
        $ln = mysqli_real_escape_string($db, $_POST['last_name']);

    }else {
        echo '<p class="error">Please enter your last name!</p>';

    }
    // verification de l'email
    if(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
        $e = mysqli_real_escape_string($db, $_POST['email']);
    }else {
        echo '<p class="error">Please enter a valid email!</p>';
    }
// verification du password
    if(isset( $_POST['password1'] ) && trim( $_POST['password1'] ) != ''  ){
        if($_POST['password1'] == $_POST['password2']){
            $p = mysqli_real_escape_string($db, $_POST['password1']);
        }else {
            echo '<p class="error">Your password didn\'t match the confirmed password!</p>';

        }
    }else {
        echo '<p class="error">Please enter a valid password!</p>';

    }

    //si les test ont reussi , verifier que l'adresse mail n'est pas deja utilise

    if($fn && $ln && $e && $p) {
        $q = "SELECT user_id FROM users WHERE email='$e'";
        $r = mysqli_query($db, $q) or trigger_error("Query: $q\n<br/> MySql Error: " . mysqli_error($db));


        // si l'adresse mail n'est as encore utiliser , inscrire l'utilisateur
        if (mysqli_num_rows($r) == 0) {

            $a = md5(uniqid(rand(), true));
            $q = "INSERT INTO
                      users
                        (email,
                         pass ,
                         first_name,
                         last_name,
                         active,
                         registration_date
                         ) VALUES (
                         '$e',
                         SHA1('$p'),
                         '$fn',
                         '$ln',
                         '$a',
                         NOW()
                         )";

            $r = mysqli_query($db, $q) or trigger_error("Query: $q\n<br/> MySql Error: " . mysqli_error($db));

// envoyer un email si la requete fonctionne

            if (mysqli_affected_rows($db) == 1) {
                $body = "Thank you for registering at our fucking website. Please to activate your account , click on this link: \n\n";
                $body .= '<a href="'. BASE_URL . 'activate.php?x=' . urlencode($e) . '&y=$a" target="_blank" >VALIDATE</a>' ;
                mail($_POST['email'], 'Registration Confirmation', $body, 'From: admin@localhost.com');
                echo '<h3>Thank you for registering! A confiration email has been set to your adress email.
                    Please clink on the link in that email in order to activate your account</h3>';

                include('includes/footer.php');
                exit();
            } else {
                echo '<p class="error">You could not be registered due to a system error. We apologize for any inconvience.</p>';
            }
        } else {
            echo '<p clas="error">That email adress has already been registered.
                If you have forgotten your password, use the link at right to have your password sent to you .</p>';
        }
    } else{
        echo '<p class="error">Please re-enter your passwords an try again.</p>';
    }
mysqli_close($db);
}
?>

<h1>Register</h1>
<form action="register.php" method="post">
    <fieldset>
        <p><b>First name: </b><input type="text" name="first_name" size="20" maxlength="50" value="<?php
            if(isset($_POST['first_name'])) echo $_POST['first_name'];?>"/></p>
        <p><b>Last name: </b><input type="text" name="last_name" size="20" maxlength="50" value="<?php
            if(isset($_POST['last_name'])) echo $_POST['last_name'];?>"/></p>
        <p><b>Email Adress: </b><input type="email" name="email" size="20" maxlength="100" value="<?php
            if(isset($_POST['email'])) echo $_POST['email'];?>"/></p>
        <p><b>Password: </b><input type="password" name="password1" size="20" maxlength="20" required/>
            <small>Use only letters and numbers. Must be between 4 and 20 characters long.</small></p>
        <p><b>Confirm password: </b><input type="password" name="password2" size="20" maxlength="20" required/>
            <small>retype the same password.</small></p>
    </fieldset>
    <div align="center">
        <input type="submit" name="submit" value="register"/>
    </div>
    <input type="hidden" name="submitted" value="TRUE"/>
</form>

<?php
include('includes/footer.php');
?>