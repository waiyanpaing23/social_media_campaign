<!DOCTYPE html>
<?php
session_start();
$email = $_SESSION['email'];
include('dbconnect.php');

if (isset($_POST['btnSubmit'])) {
    $title = $_POST['title'];
    $content = $_POST['content'];

    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        $filename = $_FILES['image']['name'];
        $filepath = $_FILES['image']['tmp_name'];
    }

    $sql = "INSERT INTO newsletter (title, content, image) VALUES ('$title', '$content', '$filename')";
    if ($conn->query($sql) == TRUE) {
        header("location:newsSetup.php?success=Newsletter uploaded successfully.");
        move_uploaded_file($filepath, "images/" . $filename);
    }
}

if (isset($_GET['deleteid'])) {
    $did = $_GET['deleteid'];
    $sql = "DELETE FROM newsletter WHERE id='$did'";
    if ($conn->query($sql) == True) {
        header("location:newsSetup.php" . "?success=One record deleted successfully.");
    }
}

if (isset($_GET['editid'])) {
    $eid = $_GET['editid'];
    $sql = "SELECT * FROM newsletter WHERE id='$eid'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
} else {
    $sql = "SELECT * FROM newsletter";
    $result = $conn->query($sql);
}

if (isset($_POST['btnUpdate'])) {
    $id = $_POST['id'];
    $title = $_POST['title'];
    $content = $_POST['content'];

    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        $filename = $_FILES['image']['name'];
        $filepath = $_FILES['image']['tmp_name'];
    }

    $sql = "UPDATE newsletter SET title='$title', content='$content', image='$filename' WHERE id='$id'";
    if ($conn->query($sql) == True) {
        header("location:newsSetup.php?success=One record updated successfully");
        move_uploaded_file($filepath, "images/" . $filename);
    }
}

if (isset($_POST['btnSearch'])) {
    $search = $_POST['txtSearch'];
    $sql = "SELECT * FROM newsletter WHERE title LIKE '%" . $search . "%'";
    $result = $conn->query($sql);
} else {
    $sql = "SELECT * from newsletter";
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
                        <li class="link active"><a href="newsSetup.php">Newsletter</a></li>
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
    </div>
    <div class="container">
        <main>
            <section id="contact">
                <div class="sub-container">
                    <div class="setup">
                        <h1>Newsletter Setup</h1>
                        <form action="#" method="POST" enctype="multipart/form-data">
                            <input type="hidden" id="id" name="id" value="<?php echo isset($row['id']) ? $row['id'] : ""; ?>" />

                            <label for="title">Title:</label><br>
                            <input type="text" id="title" name="title" value="<?php echo isset($row['title']) ? $row['title'] : ""; ?>" required /><br><br>

                            <label for="content">Content:</label><br>
                            <textarea id="content" name="content" rows="4" required><?php echo isset($row['content']) ? $row['content'] : ""; ?></textarea><br><br>

                            <label for="image">Image:</label><br>
                            <input type="file" id="image" name="image" required />
                            <?php if (isset($row['image'])) {
                                echo isset($row['image']) ? $row['image'] : "";
                            }
                            ?>
                            <br><br>

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
                            <input type="search" class="search-input" name="txtSearch" placeholder="Search by Title">
                            <button class="search-btn" name="btnSearch">Search</button>
                        </form>
                    </div>
                    <div class="setup-list">
                        <?php
                        if ($result->num_rows > 0 && !isset($_GET['editid'])) {
                        ?>

                            <h2> Newsletter List </h2>
                            <div class="setup-table">
                                <table border="1" cellspacing="5" cellpadding="5px">
                                    <tr>
                                        <th>Id</th>
                                        <th>Title</th>
                                        <th>Content</th>
                                        <th>Image</th>
                                        <th>Published Date</th>
                                        <th>Action</th>
                                    </tr>
                                    <?php
                                    while ($row = $result->fetch_assoc()) {
                                    ?>

                                        <tr>
                                            <td><?php echo $row['id']; ?></td>
                                            <td><?php echo $row['title']; ?></td>
                                            <td><?php echo $row['content']; ?></td>
                                            <td><img src="<?php echo "images\\" . $row['image']; ?>" width="100px" height="100px"></td>
                                            <td><?php echo $row['publishdate']; ?></td>
                                            <td>
                                                <div class="action">
                                                    <a href="newsSetup.php?editid=<?php echo $row['id']; ?>">
                                                        <button class="update">Edit</button>
                                                    </a>
                                                    <a href="newsSetup.php?deleteid=<?php echo $row['id']; ?>">
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
            <p>You are here: Newsletter Setup</p>
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