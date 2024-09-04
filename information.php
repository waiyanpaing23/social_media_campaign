<!DOCTYPE html>
<?php
session_start();
$email = $_SESSION['email'];
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
                        <li class="link active"><a href="information.php">Information</a></li>
                        <li class="link"><a href="contact.php">Contact</a></li>
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
            <div class="aboutus">
                <div class="aboutus-content">
                    <h1>Our Information</h1>
                    <div class="background">
                        <h2>About Us</h2>
                        <p>
                            Founded in 2024, SafeSocial aims to tackle the growing concerns surrounding online safety and digital well-being. Recognizing the transformative power of
                            social media and the risks associated with its misuse, we embarked on a mission to educate, protect, and empower users across the globe. Our dedicated team
                            combines expertise in cybersecurity, education, and community outreach to create a safer digital landscape for everyone.
                        </p>
                    </div>
                    <div class="box-info">
                        <div class="info">
                            <h2>Aims</h2>
                            <p>We aim to empower individuals and communities to navigate social media safely and responsibly. We aim to provide comprehensive education, tools, and
                                resources that promote awareness, prevent cyberbullying, protect personal information, and foster a positive online environment for all users</p>
                        </div>
                        <div class="info">
                            <h2>VIsion</h2>
                            <p>Our vision is a digital world where every user can confidently engage on social media platforms free from threats and harm. We strive to create a global community
                                that values digital literacy, respects privacy, and practices kindness, ensuring a safer and more inclusive online experience for everyone.</p>
                        </div>
                    </div>
                </div>
                <div class="aboutus-image">
                    <img src="images/employees.jpg" alt="Our Team">
                    <img src="images/socialmedia2.jpg" alt="social media">
                </div>
            </div>
        </div>
    </div>
    <?php include('footer.php'); ?>
</body>

</html>