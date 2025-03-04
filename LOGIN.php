<?php
ob_start();

error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "haruna";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


if (isset($_POST["login"])) {
    $Name = $_POST['Username'];
    $Password = $_POST['password'];

    $sql = "SELECT * FROM tblusers WHERE BINARY `username` = ?";
    $stmt = $conn->prepare($sql);

    if ($stmt) {
        $stmt->bind_param("s", $Name);
        $stmt->execute();
        $result = $stmt->get_result();
        $user = $result->fetch_assoc(); 

        if ($user) {
            if ($Password === $user["password"]) {
                $_SESSION['user_id'] = $user['user_id']; // Store user_id in session
                $_SESSION['username'] = $user['username'];
                header("Location: index.php");
                exit(); 
            } else {
                $alertMessage = "<div class='alert alert-danger'>Password does not match</div>";
            }
        } else {
            $alertMessage = "<div class='alert alert-danger'>Username does not exist</div>";
        }
    } else {
        $alertMessage = "<div class='alert alert-danger'>Query failed: " . $conn->error . "</div>";
    }
}


$conn->close();

ob_end_flush();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="icon" type="image/jpeg" sizes="32x32" href="images/tab_logo.jpg">
    <link rel="stylesheet" href="style(HF).css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
</head>
<body>

<header>
    <nav>
        <ul>
            <a href="index.php" class="logo">
                <img src="images/logo.jpg" alt="Company Logo" style="height: 60px;">
            </a>
            <li><a href="buypage.php">Buy</a></li>
            <li><a href="My_Car.php">Sell</a></li>
            <li>
                <a href="#">News</a>
                <ul>
                    <li><a href="All_News.php">All News</a></li>
                    <li><a href="Car_News.php">Car News</a></li>
                    <li><a href="Videos.php">Videos</a></li>
                    <li><a href="Reviews.php">Reviews</a></li>
                </ul>
            </li>
            <li><a href="popularnewcar.php">Popular New Cars</a></li>
            <li><a href="#">About us/Contact us</a>
                <ul>
                    <li><a href="AboutUs.php">About us</a></li>
                    <li><a href="ContactUs.php">Contact us</a></li>
                </ul>
            </li>
        </ul>

        <div class="auth">
                <?php if (isset($_SESSION['username'])): ?>
            <span class="username"> 
                <?php echo htmlspecialchars($_SESSION['username']); ?>
            </span>
                <ul class="dropdown-content">
                    <li>
                        <a href="logout.php">Logout</a>
                    </li>
                </ul>
            <?php else: ?>
                <a href="LOGIN.php">Login</a>
                <span>OR</span>
                <a href="REGISTER.php">Register</a>
            <?php endif; ?>
        </div>
    </nav>
</header>
    


    <div class="login-form">
        <div class="container">
            <div class="main">
                <div class="content">
                    <h2>Login</h2>
                    <form action="LOGIN.php" method="post">
                        <input type="text" name="Username" placeholder="Username" required autofocus="">
                        <input type="password" name="password" placeholder="Password" required autofocus="">
                        <button class="button" type="submit" name="login">Login</button>

                    </form>
                    <p class="account">Don't Have An Account? <a href="REGISTER.php">Register Here</a></p>
                </div>
                <div class="form-img">
                    <img src="https://img.freepik.com/premium-vector/phone-hand-entering-right-correct-password-security-unlocking-smartphone-with-check-mark-screen-login-safe-access-concept-flat-graphic-vector-illustration-isolated-white-background_198278-18010.jpg">

                    <!-- Display alert message at the bottom of the page -->
                <div class="container">
                        <?php if (!empty($alertMessage)) { echo $alertMessage; } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
 
    <footer>
        <div class="footer-content">
            <div class="brand-info">
                <img src="images/logo.jpg" alt="logo" style="width: 180px; height: 100px;">
                <h4 style="color: #E2FCFB; margin-top: 5px;">Your Ultimate Car Companion</h4>
            </div>
        <div class="footer-links">
            <ul>
                <li><strong>Buy</strong></li>
                <li><a href="buypage.php">All Cars</a></li>
                <li><a href="popularnewcar.php">New Cars</a></li>
            </ul>
            <ul>
                <li><strong>Sell</strong></li>
                <li><a href="My_Car.php">Sell your car</a></li>
            </ul>
            <ul>
                <li><strong>News</strong></li>
                <li><a href="All_News.php">All News</a></li>
                <li><a href="Car_News.php">Car News</a></li>
                <li><a href="Videos.php">Videos</a></li>
                <li><a href="Reviews.php">Reviews</a></li>
            </ul>
            <ul>
                <li><strong>About us/Contact us</strong></li>
                <li><a href="AboutUs.php">About us</a></li>
                <li><a href="ContactUs.php">Contact us</a></li>
            </ul>
        </div>
        </div>
</footer>


</body>
</html>
