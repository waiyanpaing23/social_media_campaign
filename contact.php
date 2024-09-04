<!DOCTYPE html>
<?php
session_start();
$email = $_SESSION['email'];
include("dbconnect.php");
if (isset($_POST['btnMsg'])) {
    $msg = $_POST['msg'];
    $sql = " INSERT INTO contactus (message,email) VALUES ('$msg','$email') ";
    if ($conn->query($sql) == True) {
        header("location:contact.php?success=Message sent successfully.");
    }
}

?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Social Media Campaign</title>
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
                        <li class="link"><a href="home.php">Home</a></li>
                        <li class="dropdown link">
                            <a href="#">Social Media Safety</a>
                            <ul class="dropdown-content">
                                <li><a href="parentshelp.php">How Parents Can Help</a></li>
                                <li><a href="popular-apps.php">Popular Apps</a></li>
                                <li><a href="livestreaming.php">Livestreaming</a></li>
                            </ul>
                        </li>
                        <li class="link"><a href="legislation.php">Legislation</a></li>
                        <li class="link"><a href="information.php">Information</a></li>
                        <li class="link active"><a href="contact.php">Contact</a></li>
                        <li>
                            <div class="navbar-auth">
                                <a href="logout.php" class="sign-in">Logout</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="sub-container">
            <div class="setup contact">
                <h2>Contact Us</h2>
                <p>
                    Feel free to to share your thoughts and experiences with us using the form below. Your feedback means the world to us and helps us serve you better.
                </p>

                <!-- Contact Form -->
                <form action="#" method="post">

                    <label for="message">Message:</label><br>
                    <textarea id="message" rows="4" name="msg" required></textarea>
                    <br><br>
                    <input type="submit" name="btnMsg" value="Send Message">
                </form>

                <!-- Privacy Policy Link -->
                <p>
                    Before sending a message, please review our
                    <a href="privacy-policy.html" target="_blank">Privacy Policy</a>.
                </p>
            </div>
            <br>
            <?php
            if (isset($_GET['success'])) {
                echo "<div>" . $_GET['success'] . "</div>";
            }
            ?>
            <br>

        </div>
    </div>
    <?php include('footer.php'); ?>
    </div>
</body>

</html>