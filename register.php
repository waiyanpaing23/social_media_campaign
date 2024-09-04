<!DOCTYPE html>
<html lang="en">
<?php

include("dbconnect.php");

if (isset($_POST['btnReg'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $city = $_POST['city'];
    $sub = $_POST['sub'];

    if (strlen($password) < 6) {
        header("location:register.php?msg=Password must be at least 6 characters long.");
    } else {
        $sql = "INSERT INTO member (name,email,password,city,subscription,usertype) VALUES ('$name','$email','$password','$city','$sub',0) ";

        if ($conn->query($sql)==True) {
            session_start();
            $_SESSION['email'] = $email;
            header("location:home.php");
        }
    }
}
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Social Meida Campaign - Register</title>
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
            <div class="setup">
                <h2>Register</h2>
                <?php
                if (isset($_GET['msg'])) {
                ?>
                    <div class="alert-msg">
                        <?php
                        echo $_GET['msg'];
                        ?>
                    </div>
                <?php
                }
                ?>
                <form action="#" method="POST">
                    <label for="name">Userame:</label><br>
                    <input type="text" id="name" name="name" required /><br><br>

                    <label for="email">Email:</label><br>
                    <input type="email" id="email" name="email" required /><br><br>

                    <label for="name">Password:</label><br>
                    <input type="password" id="name" name="password" required /><br><br>

                    <label for="name">City:</label><br>
                    <input type="text" id="name" name="city" required /><br><br>

                    <label for="name">Newsletter Subscription:</label>
                    <input type="radio" id="name" name="sub" value="1" required />Yes
                    <input type="radio" id="name" name="sub" value="0" required />No
                    <br><br>

                    <input type="submit" name="btnReg" value="Register" />
                </form>
                <br>
                <div class="register-link">
                    Already have an account?<a href="login.php">&nbsp;Login </a>
                </div>
            </div>
        </div>
        <footer>
            <div class="footer-content">
                <p>You are here: Register</p>
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