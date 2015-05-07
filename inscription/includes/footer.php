    </div>
    <div id="menu">
        <ul>
            <li> <a href="index.php">Home</a></li>
            <?php
                if(isset($_SESSION['user_id'])) {
                    echo '<li><a href="logout.php">Logout</a></li>
                          <li><a href="change_password.php">Change password</a></li>';

                    // pour l'admin
                    if ($_SESSION['user_level'] == 1) {
                        echo '<li><a href="view_user.php">view user</a></li>
                              <li><a href="#.php">Some Admin Page</a></li>';
                    }
                }else {
                    echo '<li><a href="register.php">Register</a></li>
                          <li><a href="login.php">Login</a></li>
                          <li><a href="forgot_password.php">Retrieve password</a></li>';

                }
            ?>
            <li><a href="#">Some page</a></li>
            <li><a href="#">Another page</a></li>
        </ul>

    </div>
</body>
</html>

    <?php
        ob_end_flush();

    ?>
