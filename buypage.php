<?php
    include 'database.php'; 
    session_start();
    $cars = []; 


       
        $query = $db->query("SELECT * FROM tblcars_for_sale");
        $cars = $query->fetchAll(PDO::FETCH_ASSOC);

    


    ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buy Car</title>
    <link rel="icon" type="image/jpeg" sizes="32x32" href="images/tab_logo.jpg">
    <link rel="stylesheet" href="styles.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;400;700&display=swap" rel="stylesheet">
    <style>
        .option-card a {
            text-decoration: none;
            color: inherit; 
        }

        .no-cars-found {
            font-family: "Montserrat", sans-serif;
            font-weight: normal;
            font-size: 25px;
            text-align: center; 
            padding-left:20px;
    
}

.logo{
  padding-right: 50px;
}
    </style>
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

<div class="mainbanner">
    <div class="slide active">
        <img src="images/banner2.jpg" style="width: 100%; height: 500px; object-fit: cover;">
    </div>
</div>

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

<filtersearch>
    <div class="searchboxfilter">
        <h2>Filter Search</h2>           
        <div class="inputgroup">
            <select id="condition">
                <option value="">All Condition</option>
                <option value="New">New</option>
                <option value="Used">Used</option>
            </select>
        </div>
        <div class="inputgroup">
            <select id="brand">
                <option value="">All Brand</option>
                <option value="Audi">Audi</option>
                <option value="BMW">BMW</option>
                <option value="Ford">Ford</option>
                <option value="Ferrari">Ferrari</option>
                <option value="Honda">Honda</option>
                <option value="Toyota">Toyota</option>
                <option value="Nissan">Nissan</option>
                <option value="Porsche">Porsche</option>
                <option value="Mercedes">Mercedes</option>
                <option value="Tesla">Tesla</option>
            </select>
        </div>
        <div class="inputgroup">
            <select id="location">
                <option value="">All Location</option>
                <option value="East Malaysia">East Malaysia</option>
                <option value="West Malaysia">West Malaysia</option>   
            </select>
        </div>
        <button class="search-btn" onclick="applyFilter()">Apply</button>
    </div>
</filtersearch>

<section class="columnname">
    <section class="pname">
        <h2>All Cars</h2>
        <h2>Model</h2>
        <h2>Price</h2>
    </section>
</section>

<div id="carBoxContainer">
    <?php
  
    $selectedType = isset($_GET['type']) ? $_GET['type'] : ''; 
    $selectedCondition = isset($_GET['condition']) ? $_GET['condition'] : '';
    $selectedBrand = isset($_GET['brand']) ? $_GET['brand'] : '';
    $selectedLocation = isset($_GET['location']) ? $_GET['location'] : '';

    if (count($cars) === 0): ?>
        <p>No cars found in the carinfo table.</p>
    <?php else: ?>
        <?php 
        $carFound = false;
        foreach ($cars as $car): 
           
            if (
                ($selectedType === '' || $car['type'] === $selectedType) &&
                ($selectedCondition === '' || $car['ccondition'] === $selectedCondition) &&
                ($selectedBrand === '' || $car['brand'] === $selectedBrand) &&
                ($selectedLocation === '' || $car['location'] === $selectedLocation)
            ): 
                $carFound = true;  ?>
                <a href="CarDetail.php?car_id=<?php echo urlencode($car['car_id']); ?>" class="car-box">
                    <div class="car-image">
                        <img src="uploads/<?php echo htmlspecialchars(trim($car['cover_image'], '"')); ?>" alt="Car Image" />
                    </div>
                    <div class="car-details">
                        <p><?php echo htmlspecialchars($car['car_name']); ?></p>
                    </div>
                    <div class="carprice">
                        <p>RM <?php echo htmlspecialchars($car['price']); ?></p>
                    </div>
                </a>
            <?php endif; ?>
        <?php endforeach; ?>
        
       
        <?php if (!$carFound): ?>
            <p class="no-cars-found">No Cars Found</p>
        <?php endif; ?>
    <?php endif; ?>
</div>

<script>
    function applyFilter() {
    const condition = document.getElementById('condition');
    const brand = document.getElementById('brand');
    const location = document.getElementById('location');

    console.log(condition, brand, location); 

   
    const conditionValue = condition.value;
    const brandValue = brand.value;
    const locationValue = location.value;
    

    const queryParams = new URLSearchParams({
        condition: conditionValue,
        brand: brandValue,
        location: locationValue,
        
    });

    window.location.href = '?' + queryParams.toString();
}

</script>

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
