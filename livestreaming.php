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
                                <li class="active"><a href="livestreaming.php">Livestreaming</a></li>
                            </ul>
                        </li>
                        <li class="link"><a href="legislation.php">Legislation</a></li>
                        <li class="link"><a href="information.php">Information</a></li>
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
            <h1>Online Safety in Livestreaming</h1>
            <div class="parentshelp">
                <h2>Overview of Livestreaming</h2>
                <img src="images/live-streaming.webp" alt="Online Safety in Livestreaming">
                <p>Livestreaming allows individuals to broadcast real-time video content to an online audience. It has gained immense popularity due to its ability to connect people
                    instantly, whether for personal, educational, or professional purposes. Platforms like Twitch, YouTube Live, and Facebook Live offer users the ability to share
                    experiences, host events, or interact with viewers in real time. Livestreaming can be a powerful tool for engaging audiences and building communities, but it also
                    comes with certain risks that need to be managed effectively.</p>
                <h2>Ensuring Safety in Livestreaming</h2>
                <img src="images/livestream.webp" alt="Online Safety in Livestreaming">
                <p>To create a safe livestreaming environment, start by reviewing the community guidelines of any platform you use, whether it's a new one or an existing favorite.
                    These guidelines are designed to protect both you and your audience by setting clear rules for behavior and content. Adhering to these rules is crucial;
                    failure to follow them can result in penalties or even a ban from the platform, impacting your ability to stream in the future.
                    <br><br>
                    Additionally, adjust the platform’s privacy settings to control who can view your streams, and avoid sharing personal information like your home address or phone
                    number during broadcasts. Utilize available moderation tools to manage viewer interactions, including chat filters and trusted moderators who can enforce guidelines
                    and prevent inappropriate behavior.
                    <br><br>
                    Lastly, secure your account with strong, unique passwords and enable two-factor authentication to protect against unauthorized access. Regularly update your
                    passwords and be cautious with third-party applications. By following these safety tips, you can ensure a secure and enjoyable livestreaming experience for both
                    yourself and your audience.
                </p>
                <hr>
            </div>
        </div>
    </div>
    <?php include('footer.php'); ?>
    </div>
</body>

</html>