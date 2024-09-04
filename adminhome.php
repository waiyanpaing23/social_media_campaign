<!DOCTYPE html>
<?php
session_start();
$email = $_SESSION['email'];
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Social Media Campaign - Admin</title>
    <link rel="stylesheet" href="style.css">

<body>
    <div class="container">
        <nav>
            <div class="navbar admin">
                <div class="logo">
                    <img src="images/logo.png" alt="logo">
                    <span><strong>SMC</strong></span>
                </div>
                <div class="nav-link">
                    <ul class="menu">
                        <li class="link active"><a href="adminhome.php">Home</a></li>
                        <li class="link"><a href="serviceSetup.php">Services</a></li>
                        <li class="link"><a href="newsSetup.php">Newsletter</a></li>
                        <li class="link"><a href="parentshelpSetup.php">How Parents Help</a></li>
                        <li class="link"><a href="appSetup.php">Social Media Apps</a></li>
                        <li class="link"><a href="contactList.php">Help/Support</a></li>
                        <li class="link"><a href="memberList.php">Member List</a></li>
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
            <h1>Welcome to Social Media Campaign</h1>
            <h2>Admin Panel</h2>
            <div class="admin-box">
                <div class="admin-card">
                    <div class="card-info">
                        <h2>Service Setup</h2>
                        <a href="serviceSetup.php">Go to page >> </a>
                    </div>
                    <div class="card-img">
                        <img src="images/service_icon.png" alt="Service setup">
                    </div>
                </div>
                <div class="admin-card green">
                    <div class="card-info">
                        <h2>Newsletter Setup</h2>
                        <a href="newsSetup.php">Go to page >> </a>
                    </div>
                    <div class="card-img">
                        <img src="images/news.png" alt="Newsletter setup">
                    </div>
                </div>
                <div class="admin-card blue">
                    <div class="card-info">
                        <h2>How Parents Help Setup</h2>
                        <a href="parentshelpSetup.php">Go to page >> </a>
                    </div>
                    <div class="card-img">
                        <img src="images/parents.png" alt="Service setup">
                    </div>
                </div>
                <div class="admin-card yellow">
                    <div class="card-info">
                        <h2>Popular Apps Setup</h2>
                        <a href="appSetup.php">Go to page >> </a>
                    </div>
                    <div class="card-img">
                        <img src="images/app.png" alt="Service setup">
                    </div>
                </div>
                <div class="admin-card violet">
                    <div class="card-info">
                        <h2>Help/Support</h2>
                        <a href="contactList.php">Go to page >> </a>
                    </div>
                    <div class="card-img">
                        <img src="images/message.png" alt="Service setup">
                    </div>
                </div>
                <div class="admin-card sky">
                    <div class="card-info">
                        <h2>Member List</h2>
                        <a href="memberList.php">Go to page >> </a>
                    </div>
                    <div class="card-img">
                        <img src="images/member.png" alt="Service setup">
                    </div>
                </div>
            </div>
        </div>
        <footer>
            <div class="footer-content">
                <p>You are here: Home</p>
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