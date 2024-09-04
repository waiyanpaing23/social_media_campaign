<!DOCTYPE html>
<html lang="en">
<?php
session_start();
if (isset($_SESSION['attempt_again'])) {
    $now = time();
    if ($now >= $_SESSION['attempt_again']) {
        unset($_SESSION['attempt']);
        unset($_SESSION['attempt_again']);
        unset($_SESSION['msg']);
        unset($_SESSION['check']);
    }
}
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Social Media Campaign - Login</title>
    <link rel="stylesheet" href="style.css">

<body>
    <div class="container">
        <nav>
            <div class="navbar">
                <div class="logo">
                    <img src="images/logo.png" alt="logo">
                    <span><strong>SMC</strong></span>
                </div>
                <div class="nav-link">
                    <ul class="menu">
                        <li class="link"><a href="index.php">Home</a></li>
                        <li class="link"><a href="b-information.php">Information</a></li>
                        <li class="link"><a href="b-legislation.php">Legislation</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="sub-container">
            <div class="login-box">
                <h2>Login</h2>
                <?php
                if (isset($_SESSION['msg'])) {
                ?>
                    <div class="alert-msg">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-exclamation-triangle-fill" viewBox="0 0 16 16">
                            <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5m.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2" />
                        </svg>
                        <?php
                        echo $_SESSION['msg'];
                        ?>
                    </div>
                <?php
                }
                if (isset($_SESSION['check']) != 1) {
                ?>
                    <form action="loginsuccess.php" method="POST">

                        <label for="email">Email :</label><br>
                        <input type="email" id="email" name="email" required /><br><br>

                        <label for="password">Password :</label><br>
                        <input type="password" id="password" name="password" required /><br><br>
                        <input type="submit" name="btnLogin" value="Login">
                    </form>
                <?php

                }
                ?>
                <br>
                <div class="register-link">
                    Not a member?<a href="register.php">&nbsp;Register here </a>
                </div>
            </div>
        </div>
        <footer>
            <div class="footer-content">
                <p>You are here: Login</p>
                <p>&copy; 2024 Social Media Campaign</p>
                <div class="social-media-buttons">
                    <a href="#" target="_blank" title="Follow us on Facebook"><img src="images/icons/fb.png" alt="Facebook"></a>
                    <a href="#" target="_blank" title="Follow us on Twitter"><img src="images/icons/twitter.png" alt="Twitter"></a>
                    <a href="#" target="_blank" title="Follow us on Instagram"><img src="images/icons/ins.png" alt="Instagram"></a>
                </div>
            </div>
        </footer>
    </div>
</body>

</html>