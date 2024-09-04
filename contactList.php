<!DOCTYPE html>
<?php
session_start();
$email = $_SESSION['email'];
include('dbconnect.php');

if (isset($_GET['deleteid'])) {
    $did = $_GET['deleteid'];
    $sql = "DELETE FROM contactus WHERE id='$did'";
    if ($conn->query($sql) == True) {
        header("location:contactList.php?success=One message removed.");
    }
}

if (isset($_POST['btnSearch'])) {
    $search = $_POST['txtSearch'];
    $sql = "SELECT * FROM contactus WHERE email LIKE '%" . $search . "%'";
    $result = $conn->query($sql);
} else {
    $sql = "SELECT * from contactus";
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
                        <li class="link"><a href="appSetup.php">Social Media Apps</a></li>
                        <li class="link active"><a href="contactList.php">Help/Support</a></li>
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
            <div class="sub-container">
                <?php
                if (isset($_GET['success'])) {
                    echo "<div>" . $_GET['success'] . "</div>";
                }
                ?>
                <div class="search">
                        <form action="#" method="POST">
                            <input type="search" class="search-input" name="txtSearch" placeholder="Search by Email">
                            <button class="search-btn" name="btnSearch">Search</button>
                        </form>
                    </div>
                <div class="setup-list">
                    <?php
                    if ($result->num_rows > 0) {
                    ?>
                        <h2> Help/Support List </h2>
                        <div class="setup-table">
                            <table border="1" cellspacing="5" cellpadding="5px">
                                <tr>
                                    <th>Id</th>
                                    <th>Message</th>
                                    <th>Email</th>
                                    <th>Date</th>
                                    <th>Action</th>
                                </tr>
                                <?php
                                while ($row = $result->fetch_assoc()) {
                                ?>

                                    <tr>
                                        <td><?php echo $row['id']; ?></td>
                                        <td><?php echo $row['message']; ?></td>
                                        <td><?php echo $row['email']; ?></td>
                                        <td><?php echo $row['sentdate']; ?></td>
                                        <td>
                                            <div class="action">
                                                <a href="contactList.php?deleteid=<?php echo $row['id']; ?>">
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
                    }
                    ?>
                </div>
            </div>

        </main>
    </div>
    <footer>
        <div class="footer-content">
            <p>You are here: Help/Support</p>
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