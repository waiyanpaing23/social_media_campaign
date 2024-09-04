<!DOCTYPE html>
<?php
session_start();
$email = $_SESSION['email'];
include("dbconnect.php");

$sql1 = "SELECT * from socialmediaapps";
$result = $conn->query($sql1);

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
                                <li class="active"><a href="popular-apps.php">Popular Apps</a></li>
                                <li><a href="livestreaming.php">Livestreaming</a></li>
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

            <h1>Popular Social Media Apps</h1>
            <div class="appcard">

                <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                ?>
                        <div class="app">
                            <div class="app-logo">
                                <img src="<?php echo "images\\" . $row['logo']; ?>" alt="facebook">
                            </div>
                            <div class="app-info">
                                <h2><?php echo $row['name']; ?></h2>
                                <p><?php echo $row['description']; ?></p>
                                <a href="<?php echo $row['link']; ?>">Login Link</a> |
                                <a href="<?php echo $row['privacylink']; ?>">Privacy Info</a>
                            </div>
                        </div>
                <?php
                    }
                }
                ?>

            </div>
            <hr>
            <div class="tips-app">
            <h2>General Safety Tips</h2>
            <ul>
                <li>Always use strong passwords and change them regularly.</li>
                <li>Enable two-factor authentication on your accounts.</li>
                <li>Be cautious of phishing attempts and suspicious links.</li>
                <li>Social media platforms frequently update their privacy policies and settings, so it's important to periodically review and adjust your settings to ensure your information remains protected.</li>
                <li>Avoid sharing sensitive personal details such as your home address, phone number, or financial information on social media platforms to protect your privacy and security.</li>
            </ul>
            </div>
            <div class="contents-app">
                <h2>Educational Contents</h2>
                <article>
                    <h3>How to Stay Safe on Instagram</h3>
                    <p>Instagram is a popular platform for sharing photos and videos, but maintaining your privacy and security is crucial. First, consider setting your account to private,
                        so only approved followers can see your posts. Enable two-factor authentication to add an extra layer of security to your account. Be mindful of the information you
                        share in your posts and stories, avoiding sensitive details such as your location or personal data. Utilize Instagram's privacy settings to manage who can comment on
                        your posts and send you direct messages. By staying vigilant and using these features, you can enjoy Instagram while keeping your account secure.</p>
                </article>
                <article>
                    <h3>Understanding Facebook's Privacy Settings</h3>
                    <p>Facebook offers a comprehensive set of privacy settings to help you manage who can see your information and interact with you on the platform.
                        By understanding and utilizing these settings, you can better protect your personal data. Start by accessing the Privacy Checkup tool, which guides you through
                        key settings such as who can see your future posts, how people can find you, and your ad preferences. Additionally, customize your timeline and tagging
                        settings to control who can post on your timeline and see posts you're tagged in. Regularly review and adjust these settings to stay up-to-date with
                        Facebook's frequent updates and ensure your profile remains secure.</p>
                </article>
                <article>
                    <h3>Securing Your Twitter Account</h3>
                    <p>Twitter is a dynamic platform for sharing short messages known as tweets, but it's important to keep your account secure. Start by enabling two-factor
                        authentication, which requires a second verification step when logging in. Regularly update your password to something strong and unique. Be cautious of
                        phishing attempts and suspicious links sent via direct messages or tweets. Review your privacy settings to control who can see your tweets, send you direct
                        messages, and tag you in photos. Additionally, be mindful of the information you share in your tweets to avoid revealing sensitive personal details.
                        By following these steps, you can enhance your Twitter account's security and enjoy a safer experience on the platform.</p>
                </article>
            </div>

        </div>
    </div>
    <?php include('footer.php'); ?>
    </div>
</body>

</html>