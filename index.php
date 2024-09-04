<!DOCTYPE html>
<?php

include("dbconnect.php");

$sql3 = "SELECT * from socialmediaapps";
$resApp = $conn->query($sql3);

if (isset($_POST['btnSearch'])) {
    $search = $_POST['txtSearch'];
    $sql = "SELECT * FROM services WHERE title LIKE '%" . $search . "%' OR category LIKE '%" . $search . "%'";
    $resService = $conn->query($sql);
} else {
    $sql = "SELECT * from services";
    $resService = $conn->query($sql);
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
                        <li class="link active"><a href="index.php">Home</a></li>
                        <li class="link"><a href="b-information.php">Information</a></li>
                        <li class="link"><a href="b-legislation.php">Legislation</a></li>
                        <li>
                            <div class="navbar-auth">
                                <a href="login.php" class="sign-in">Sign In</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
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
                    <!-- Popular Apps -->
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
                    <!-- Teen's brain -->
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
                </div>
            </div>
            <!-- footer -->
            <?php include('b-footer.php'); ?>
        </div>
</body>

</html>