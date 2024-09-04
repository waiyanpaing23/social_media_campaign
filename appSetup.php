<!DOCTYPE html>
<?php
session_start();
$email = $_SESSION['email'];
include('dbconnect.php');

if (isset($_POST['btnSubmit'])) {
    $name = $_POST['name'];
    $des = $_POST['description'];
    $login = $_POST['login'];
    $privacy = $_POST['privacy'];

    if (isset($_FILES["logo"]) && $_FILES["logo"]["error"] == 0) {
        // Real file name
        $filename = $_FILES["logo"]["name"];
        // file path
        $filepath = $_FILES["logo"]["tmp_name"];
    }

    $sql = "INSERT INTO socialmediaapps (name, description, logo, link, privacylink) VALUES ('$name', '$des', '$filename', '$login', '$privacy') ";
    if ($conn->query($sql)) {
        header("location:appSetup.php?success=App Inserted Successfully.");
        move_uploaded_file($filepath, "images/" . $filename);
    }
}

if (isset($_GET['deleteid'])) {
    $did = $_GET['deleteid'];
    $sql = "DELETE FROM socialmediaapps WHERE id='$did'";
    if ($conn->query($sql) == True) {
        header("location:appSetup.php" . "?success=One record deleted successfully.");
    }
}

if (isset($_GET['editid'])) {
    $eid = $_GET['editid'];
    $sql = "SELECT * FROM socialmediaapps WHERE id='$eid'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
} else {
    $sql = "SELECT * FROM socialmediaapps";
    $result = $conn->query($sql);
}

if (isset($_POST['btnUpdate'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $des = $_POST['description'];
    $login = $_POST['login'];
    $privacy = $_POST['privacy'];

    if (isset($_FILES['logo']) && $_FILES['logo']['error'] == 0) {
        $filename = $_FILES['logo']['name'];
        $filepath = $_FILES['logo']['tmp_name'];
    }

    $sql = "UPDATE socialmediaapps SET name='$name', logo='$filename', description='$des', link='$login', privacylink='$privacy' WHERE id='$id'";
    if ($conn->query($sql) == True) {
        header("location:appSetup.php?success=One record updated successfully");
        move_uploaded_file($filepath, "images/" . $filename);
    }
}

if (isset($_POST['btnSearch'])) {
    $search = $_POST['txtSearch'];
    $sql = "SELECT * FROM socialmediaapps WHERE name LIKE '%" . $search . "%'";
    $result = $conn->query($sql);
} else {
    $sql = "SELECT * from socialmediaapps";
    $result = $conn->query($sql);
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
            <div class="navbar admin">
                <div class="logo">
                    <img src="images/logo.png" alt="logo">
                    <span><strong>SMC</strong></span>
                </div>
                <div class="nav-link">
                    <ul class="menu">
                        <li class="link"><a href="adminhome.php">Home</a></li>
                        <li class="link"><a href="serviceSetup.php">Services</a></li>
                        <li class="link"><a href="newsSetup.php">Newsletter</a></li>
                        <li class="link"><a href="parentshelpSetup.php">How Parents Help</a></li>
                        <li class="link active"><a href="appSetup.php">Social Media Apps</a></li>
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
    </div>
    <div class="container">
        <main>
            <section id="contact">
                <div class="sub-container">
                    <div class="setup">
                        <h1>Social Media App Setup</h1>
                        <form action="#" method="POST" enctype="multipart/form-data">
                            <input type="hidden" id="id" name="id" value="<?php echo isset($row['id']) ? $row['id'] : ""; ?>" />

                            <label for="name">Name:</label><br>
                            <input type="text" id="name" name="name" value="<?php echo isset($row['name']) ? $row['name'] : ""; ?>" required /><br><br>

                            <label for="description">Description:</label><br>
                            <input type="text" id="description" name="description" value="<?php echo isset($row['description']) ? $row['description'] : ""; ?>" required /><br><br>

                            <label for="name">Logo:</label><br>
                            <input type="file" id="name" name="logo" required />
                            <?php if (isset($row['logo'])) {
                                echo isset($row['logo']) ? $row['logo'] : "";
                            }
                            ?>
                            <br><br>

                            <label for="login">Login Link:</label><br>
                            <input type="text" id="login" name="login" value="<?php echo isset($row['link']) ? $row['link'] : ""; ?>" required /><br><br>

                            <label for="privacy">Privacy Setting Link:</label><br>
                            <input type="text" id="privacy" name="privacy" value="<?php echo isset($row['privacylink']) ? $row['privacylink'] : ""; ?>" required /><br><br>

                            <?php
                            if (isset($_GET['editid'])) {
                            ?>
                                <input type="submit" name="btnUpdate" value="Update">
                            <?php
                            } else {
                            ?>
                                <input type="submit" name="btnSubmit" value="Save">
                            <?php
                            }
                            ?>
                        </form>
                    </div>
                    <?php
                    if (isset($_GET['success'])) {
                        echo "<div>" . $_GET['success'] . "</div>";
                    }
                    ?>
                    <hr>
                    <div class="search">
                        <form action="#" method="POST">
                            <input type="search" class="search-input" name="txtSearch" placeholder="Search by Name">
                            <button class="search-btn" name="btnSearch">Search</button>
                        </form>
                    </div>
                    <div class="setup-list">
                        <?php
                        if ($result->num_rows > 0 && !isset($_GET['editid'])) {
                        ?>

                            <h2> Social Media App List </h2>
                            <div class="setup-table">
                                <table border="1" cellspacing="5" cellpadding="5px">
                                    <tr>
                                        <th>Id</th>
                                        <th>Name</th>
                                        <th>Description</th>
                                        <th>Logo</th>
                                        <th>Login Link</th>
                                        <th>Privacy Setting Link</th>
                                        <th>Action</th>
                                    </tr>
                                    <?php
                                    while ($row = $result->fetch_assoc()) {
                                    ?>

                                        <tr>
                                            <td><?php echo $row['id']; ?></td>
                                            <td><?php echo $row['name']; ?></td>
                                            <td><?php echo $row['description']; ?></td>
                                            <td><img src="<?php echo "images\\" . $row['logo']; ?>" width="100px" height="100px"></td>
                                            <td><?php echo $row['link']; ?></td>
                                            <td><?php echo $row['privacylink']; ?></td>
                                            <td>
                                                <div class="action">
                                                    <a href="appSetup.php?editid=<?php echo $row['id']; ?>">
                                                        <button class="update">Edit</button>
                                                    </a>
                                                    <a href="appSetup.php?deleteid=<?php echo $row['id']; ?>">
                                                        <button class="delete">Delete</button>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                </table>
                            </div>
                        <?php
                        } else if ($result->num_rows <= 0) {
                            echo "<div>There is no data.</div>";
                        }
                        ?>
                    </div>

                </div>

            </section>
        </main>
    </div>
    <footer>
        <div class="footer-content">
            <p>You are here: Social Media App Setup</p>
            <p>&copy; 2024 Online Safety Campaign</p>
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