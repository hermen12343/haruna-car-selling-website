<?php
    include 'database.php';  
    
    session_start();

    $cars = [];


        
        $query = $db->query("SELECT * FROM tblcars_for_sale");
        $cars = $query->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<style>
.option-card a {
    text-decoration: none;
    color: inherit; 
}
.logo{
  padding-right: 50px;
  
}
</style>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Popular New Car</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="icon" type="image/jpeg" sizes="32x32" href="images/tab_logo.jpg">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
</head>
<body>
    <!-- Header -->
    <header>
        <nav>
            <ul>
                <a href="index.php" class="logo">
                    <img src="images/logo.jpg" alt="Company Logo" style=" height: 60px;">                   
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
    <section class="psearch">
        <div class="psearch-container">
        </div>
    </section>
    <browse>
    <section class="typebrowser">
        <h2>Browse By Type</h2>
        <div class="option">
            <div class="option-card">
                <a href="?type=SUV"> <!-- Filter by SUV -->
                    <img src="images/suv.jpg" class="option-image">
                    <p>SUV</p>
                </a>
            </div>
            <div class="option-card">
                <a href="?type=Sedan"> <!-- Filter by Sedan -->
                    <img src="images/sedan.jpg" class="option-image">
                    <p>Sedan</p>
                </a>
            </div>
            <div class="option-card">
                <a href="?type=Truck"> <!-- Filter by Truck -->
                    <img src="images/truck.jpg" class="option-image">
                    <p>Truck</p>
                </a>
            </div>
            <div class="option-card">
                <a href="?type=Hybrid"> <!-- Filter by Hybrid -->
                    <img src="images/hybrid.jpg" class="option-image">
                    <p>Hybrid</p>
                </a>
            </div>
            <div class="option-card">
                <a href="?type=EV"> <!-- Filter by EV -->
                    <img src="images/EV.jpg" class="option-image">
                    <p>EV</p>
                </a>
            </div>
        </div>
    </section>
</browse>

<section class="columnname">
    <section class="pname">
        <h2>New Car</h2>
        <h2>Model</h2>
        <h2>Price</h2>
    </section>
</section>

<div id="carBoxContainer">
    <?php
    // Get the selected type from URL if it exists, otherwise default to showing all types
    $selectedType = isset($_GET['type']) ? $_GET['type'] : ''; 

    if (count($cars) === 0): ?>
        <p>No cars found in the carinfo table.</p>
    <?php else: ?>
        <?php 
        $carFound = false; // Track if any car matches the filter
        foreach ($cars as $car): 
            // Show cars that are 'New' and either match the selected type or show all if no type is selected
            if ($car['ccondition'] === 'New' && ($selectedType === '' || $car['type'] === $selectedType)): 
                $carFound = true; // Set to true if a matching car is found ?>
                <a href="CarDetail.php?car_id=<?php echo urlencode($car['car_id']); ?>" class="car-box">
                    <div class="car-image">
                        <img src="uploads/<?php echo htmlspecialchars(trim($car['cover_image'], '"')); ?>" alt="Car Image" />
                    </div>
                    <div class="car-details">
                        <p><?php echo htmlspecialchars($car['car_name']); ?></p>
                    </div>
                    <div class="carprice">
                        <p><?php echo htmlspecialchars($car['price']); ?></p>
                    </div>
                </a>
            <?php endif; ?>
        <?php endforeach; ?>
        
        <!-- If no cars match the filter, display a message -->
        <?php if (!$carFound): ?>
            <p>No cars found with the selected type and condition.</p>
        <?php endif; ?>
    <?php endif; ?>
</div>


    
    
     
   <!-- Footer -->
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