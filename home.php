<!DOCTYPE html>
<?php

session_start();
$email = $_SESSION['email'];
include("dbconnect.php");

include("textLimit.php");

use MyNamespace\TextLimit;

if (isset($_POST['btnSearch'])) {
    $search = $_POST['txtSearch'];
    $sql = "SELECT * FROM services WHERE title LIKE '%" . $search . "%' OR category LIKE '%" . $search . "%'";
    $resService = $conn->query($sql);
} else {
    $sql = "SELECT * from services";
    $resService = $conn->query($sql);
}

$sql2 = "SELECT * from newsletter";
$resNews = $conn->query($sql2);

$sql2 = "SELECT * from newsletter";
$resNews = $conn->query($sql2);

$sql3 = "SELECT * from socialmediaapps";
$resApp = $conn->query($sql3);

$sub = 0;
$sql1 = "SELECT * from member WHERE email='$email'";
$resSub = $conn->query($sql1);
if ($resSub->num_rows > 0) {
    $row1 = $resSub->fetch_assoc();
    $sub = $row1['subscription'];
}

if (isset($_POST['btnSub'])) {
    $sub = $_POST['sub'];
    $sql3 = "UPDATE member SET subscription = '$sub' WHERE email= '$email' ";
    if ($conn->query($sql3) == TRUE) {
        header("location:home.php?success=Subscription Added.");
    }
}
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Social Media Campaign - Home</title>
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
                        <li class="link active"><a href="home.php">Home</a></li>
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
        <?php
        if (isset($_GET['success'])) {
        ?>
            <div class="success-msg">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-circle-fill" viewBox="0 0 16 16">
                    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                </svg>
                <?php
                echo $_GET['success'];
                ?>
            </div>
        <?php
        }
        ?>
        <div class="box">
            <div class="slider">
                <h2>Welcome to Social Media Campaign</h2>
                <div class="search">
                    <form action="#" method="POST">
                        <input type="search" class="search-input" name="txtSearch" placeholder="Search by Keywords">
                        <button class="search-btn" name="btnSearch">Search</button>
                    </form>
                </div>
                <h1>Social Media Campaign</h1>
                <p>Your online presence reflects your offline character</p>
            </div>
            <div class="sub-container">
                <div class="features">
                    <h2>Services</h2>
                    <div class="features-service">
                        <?php
                        if ($resService->num_rows > 0) {
                            while ($rowSer = $resService->fetch_assoc()) {
                        ?>
                                <!--  Services -->
                                <div class="service-home">
                                    <img src="<?php echo "images\\" . $rowSer['image']; ?>" alt="Web Service">
                                    <div class="service-info">
                                        <p><b><?php echo $rowSer['category']; ?></b></p>
                                        <h3><?php echo $rowSer['title']; ?></h3>
                                        <p> <?php echo $rowSer['description']; ?></p>
                                        <p> <?php echo $rowSer['info']; ?></p>
                                    </div>
                                </div>
                        <?php
                            }
                        }
                        ?>
                    </div>
                    <hr>
                    <h2>Popular Social Media Apps</h2>
                    <div class="features-app">
                        <?php
                        if ($resApp->num_rows > 0) {
                            while ($rowApp = $resApp->fetch_assoc()) {
                        ?>
                                <div class="app-home">
                                    <img src="<?php echo "images\\" . $rowApp['logo']; ?>" alt="Popular App">
                                    <h3><?php echo $rowApp['name']; ?></h3>
                                </div>
                        <?php
                            }
                        }
                        ?>
                    </div>
                    <hr>
                    <h2>How Social Media Affects Teen's Brain</h2>
                    <div class="teenbrain">
                        <div class="teenbrain-info">
                            <img src="images/brainicon.png">
                            <p>The adolescent brain, known for its plasticity, is highly adaptable and changes quickly in response to its
                                surroundings. This means it can easily form new connections and adapt to new experiences, including those
                                encountered on social media.</p>
                        </div>
                        <div class="teenbrain-info">
                            <img src="images/teenbrain1.png">
                            <p>Positive interactions on social media can trigger the release of dopamine, a neurotransmitter associated
                                with pleasure. This release can make social media use feel rewarding and encourage teens to spend more
                                time online.</p>
                        </div>
                        <div class="teenbrain-info">
                            <img src="images/app.png">
                            <p>Social media likes, comments, and shares can activate the brain's reward system, similar to how other
                                pleasurable activities do. This can lead to a desire for more positive feedback, sometimes resulting
                                in excessive use.</p>
                        </div>
                    </div>
                    <hr>
                    <h2>Newsletters</h2>
                    <div class="features-service">
                        <?php
                        if ($sub == 1) {
                        ?>
                            <?php
                            if ($resNews->num_rows > 0) {
                                while ($rowNews = $resNews->fetch_assoc()) {
                            ?>
                                    <!--  Newsletter -->
                                    <div class="news">
                                        <img src="<?php echo "images\\" . $rowNews['image']; ?>" width="200px">
                                        <div class="service-info">
                                            <h3><?php echo $rowNews['title']; ?></h3>
                                            <p><strong><?php echo $rowNews['publishdate']; ?></strong></p>
                                            <p>
                                                <?php echo TextLimit::limit_text($rowNews['content'], 200); ?>
                                            </p>
                                            <a href="newsLetter.php?newsid=<?php echo $rowNews['id']; ?>">Learn More</a>
                                        </div>

                                    </div>
                            <?php
                                }
                            }
                        } else {
                            ?>
                            <div class="subscribe">
                                <form action="#" method="POST">
                                    <label for="name">Newsletter Subscription:</label>
                                    <input type="radio" id="name" name="sub" value="1" required />Yes
                                    <input type="submit" name="btnSub" value="Subscribe">
                                </form>
                            </div>

                        <?php }
                        ?>
                    </div>

                </div>
            </div>
            <?php include('footer.php'); ?>
        </div>
</body>

</html>