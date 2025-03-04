<?php

    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    $hostname = 'localhost'; 
    $user = 'root';
    $password = '';
    $database = 'haruna';
    $connection = mysqli_connect($hostname, $user, $password, $database);

    if ($connection->connect_error){
        die("Connection failed: " . $connection->connect_error);
    }
    echo "";

    $alertMessage = ""; 
   
    $Name = $Password = $Mobile_Number = $Email_Address = "";


function checkUsernameExists($connection, $username) {
    $sql = "SELECT * FROM tblusers WHERE username = ?";
    $stmt = mysqli_stmt_init($connection);
    if (mysqli_stmt_prepare($stmt, $sql)) {
        mysqli_stmt_bind_param($stmt, "s", $username);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        if (mysqli_num_rows($result) > 0) {
            return true; 
        } else {
            return false; 
        }
    }
    return false; 
}



if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $Name = $_POST['Username'];
    $Password = $_POST['password'];
    $Mobile_Number = $_POST['mobile'];  
    $Email_Address = $_POST['email'];   


    $errors = array();

    // Check if username already exists
    if (checkUsernameExists($connection, $Name)) {
        array_push($errors, "Username already exists.");
    }

    if (empty($Name) OR empty($Email_Address) OR empty($Password)) {
        array_push($errors, "All fields are required");
    }

    if (!filter_var($Email_Address, FILTER_VALIDATE_EMAIL)) {
        array_push($errors, "Invalid email format");
    }

    if (empty($errors)) {
        
   
        $sql = "INSERT INTO tblusers (username, mobile_number, email_address, password) VALUES ( ?, ?, ?, ?)";
        $stmt = mysqli_stmt_init($connection);
        $prepareStmt = mysqli_stmt_prepare($stmt, $sql);
        if ($prepareStmt) {
            mysqli_stmt_bind_param($stmt, "ssss", $Name, $Mobile_Number, $Email_Address, $Password);
            mysqli_stmt_execute($stmt);
            $alertMessage = "<div class = 'alert alert-success'>You are registered successfully.</div>";
            } else {
                $alertMessage ="<div class = 'alert alert-danger'>Registration failed.</div>";
            }
    } else  {
        foreach ($errors as $error) {
            $alertMessage .= "<div class='alert alert-danger'>$error</div>";
    }
}
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
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
                    <h2>Register</h2>
                    <form action="" method="post">
                        <input type="text" name="Username" placeholder="Username" required autofocus="">
                        <input type="password" name="password" placeholder="Password" required autofocus="">
                        <input type="text" name="mobile" placeholder="Mobile Number" required autofocus="">
                        <input type="email" name="email" placeholder="Email Address" required autofocus="">
                        <button class="button" type="submit">
                            Register
                        </button>
                    </form>
                    <p class="account">Already Have An Account? <a href="LOGIN.php">Login Here</a></p>
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






