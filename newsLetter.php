<!DOCTYPE html>
<?php
session_start();
$email = $_SESSION['email'];
include("dbconnect.php");

$sql2 = "SELECT * from newsletter";
$resNews = $conn->query($sql2);

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
            <?php
            if (isset($_GET['newsid'])) {
                $id = $_GET['newsid'];
                $sql = "SELECT * FROM newsletter WHERE id='$id'";
                $resNews = $conn->query($sql);
                while($row = $resNews->fetch_assoc()) {

            ?>
                <div class="parentshelp">
                    <h2><?php echo $row['title']; ?></h2>
                    <p><?php echo $row['publishdate']; ?></p>
                    <img src="<?php echo "images\\" . $row['image']; ?>" alt="Newsletter">
                    <p><?php echo $row['content']; ?></p>
                    <hr>
                </div>
            <?php
            }
        }
            ?>
        </div>
        <?php include('footer.php'); ?>
    </div>
</body>

</html>