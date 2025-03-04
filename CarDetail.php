<?php
session_start();

$conn = new mysqli('localhost', 'root', '', 'haruna');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_GET['car_id']) && filter_var($_GET['car_id'], FILTER_VALIDATE_INT)) {
    $car_id = $_GET['car_id'];

    $sql = "SELECT c.*, u.username, u.mobile_number 
    FROM tblcars_for_sale AS c
    JOIN tblusers AS u ON c.user_id = u.user_id
    WHERE c.car_id = ?";

    
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $car_id);
    $stmt->execute();
    $result = $stmt->get_result();


    if ($result->num_rows > 0) {
        $car = $result->fetch_assoc();
    } else {

        die("Car not found.");
    }
} else {

    die("Invalid car ID.");
}

$sql = "SELECT car_id, car_name, cover_image, price FROM tblcars_for_sale LIMIT 8"; 
$result = $conn->query($sql);

$cars = [];
if ($result->num_rows > 0) {

    while ($row = $result->fetch_assoc()) {
        $cars[] = $row;
    }
}
$carCount = count($cars);
$conn->close();
?>



<!DOCTYPE html>
<html lang="en">

    
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car Details</title>
    <link rel="icon" type="image/jpeg" sizes="32x32" href="images/tab_logo.jpg">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200&icon_names=directions_car,pin_drop,new_releases" />
    <link rel="stylesheet" type ="text/css" href="CarDetail.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">

</head>

<body>
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
 

    <div class="car-details-container">
    <div class="car-info">

    <img id="mainCarImage" src="uploads/<?php echo htmlspecialchars($car['cover_image']); ?>" alt="Main car image" />

    <div class="thumbnails">
        <div>
            <img id="exteriorImage" src="uploads/<?php echo htmlspecialchars($car['exterior_image']); ?>" alt="Exterior view of the car" onclick="changeImage(this)" />
        </div>
        <div>

            <img id="interiorImage" src="uploads/<?php echo htmlspecialchars($car['interior_image']); ?>" alt="Interior view of the car" onclick="changeImage(this)" />
        </div>
    </div>
</div>

<script>
function changeImage(clickedImage) {

    const mainImage = document.getElementById('mainCarImage');
    
    // Swap the src attributes between the main image and the clicked thumbnail
    const tempSrc = mainImage.src;
    mainImage.src = clickedImage.src; // Set main image to the clicked image source
    clickedImage.src = tempSrc; // Move the previous main image to the thumbnail
}
</script>

    


    <div class="car-details">
        <h3><?php echo htmlspecialchars($car['car_name']); ?></h3>
        
        <div class="car-info-item">
        
            <span>Mileage: <?php echo htmlspecialchars($car['mileage']); ?> km</span>
        </div>

        <div class="car-info-item">
        
            <span>Location: <?php echo htmlspecialchars($car['location']); ?></span>
        </div>
        <div class="car-info-item">
        <span>Condition: <?php echo htmlspecialchars($car['ccondition']); ?></span>
        </div>
            
        

        <div class="car-price">
            Price: RM <?php echo htmlspecialchars($car['price']); ?>
        </div>

        <div class="seller-detail-container">
            <div class="seller-info">
                <h2>Seller Name: <?php echo htmlspecialchars($car['username']); ?></h2> 
                <p>Contact Number: <?php echo htmlspecialchars($car['mobile_number']); ?></p> 

                <div class="car-tstdrive">
                <a href="BookTestDrive.php">
                    <button>Test Drive</button> 
                </a>
                </div>
            </div>
        </div>
    </div>
</div>



    

<!-- Tabs Section -->
<div class="second-part-container">
    <div class="tab-container">
        <div class="tab-titles">
            <div class="active" data-tab="seller-description">Seller Description</div>
            <div data-tab="specification">Specification</div>
        </div>
        <div class="tab-content active" id="seller-description">
            <p><?php echo htmlspecialchars($car['description']); ?></p> <!-- Seller description from the database -->
        </div>
        <div class="tab-content" id="specification">
        <p><strong>Brand:</strong> <?php echo htmlspecialchars($car['brand']); ?></p>
            <p><strong>Model:</strong> <?php echo htmlspecialchars($car['model']); ?></p>
            <p><strong>Variant:</strong> <?php echo htmlspecialchars($car['variant']); ?></p>
            <p><strong>Transmission:</strong> <?php echo htmlspecialchars($car['transmission']); ?></p>      
            <p><strong>type:</strong> <?php echo htmlspecialchars($car['type']); ?></p>
            <p><strong>seat:</strong> <?php echo htmlspecialchars($car['seats']); ?></p>
            <p><strong>Engine Capacity (CC):</strong> <?php echo htmlspecialchars($car['engine_cc']); ?>cc</p>
            <p><strong>Horsepower:</strong> <?php echo htmlspecialchars($car['horsepower']); ?>ps</p>
            <p><strong>Peak Torque:</strong> <?php echo htmlspecialchars($car['peak_torque']); ?>nm</p>
            <p><strong>length:</strong> <?php echo htmlspecialchars($car['length']); ?>mm</p>
            <p><strong>width:</strong> <?php echo htmlspecialchars($car['width']); ?>mm</p>
            <p><strong>height:</strong> <?php echo htmlspecialchars($car['height']); ?>mm</p>
            <p><strong>wheel_base:</strong> <?php echo htmlspecialchars($car['wheel_base']); ?>mm</p>
            <p><strong>kerb_weight:</strong> <?php echo htmlspecialchars($car['kerb_weight']); ?>kg</p>
            <p><strong>Fuel Tank Capacity:</strong> <?php echo htmlspecialchars($car['fuel_tank']); ?>litres</p>
        </div>
    </div>
</div>

<script>
    // Tab functionality
    const tabs = document.querySelectorAll('.tab-titles div');
    const contents = document.querySelectorAll('.tab-content');
    tabs.forEach(tab => {
      tab.addEventListener('click', () => {
        tabs.forEach(el => el.classList.remove('active'));
        contents.forEach(content => content.classList.remove('active'));
        tab.classList.add('active');
        document.getElementById(tab.getAttribute('data-tab')).classList.add('active');
      });
    });

  </script>

<?php

$conn = new mysqli('localhost', 'root', '', 'haruna');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$car_id = $_GET['car_id'];
$sql = "SELECT * FROM tblcars_for_sale WHERE car_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param('i', $car_id);
$stmt->execute();
$result = $stmt->get_result();
$car = $result->fetch_assoc();


$recommended_sql = "SELECT * FROM tblcars_for_sale WHERE car_id != ? LIMIT 8"; 
$recommended_stmt = $conn->prepare($recommended_sql);
$recommended_stmt->bind_param('i', $car_id);
$recommended_stmt->execute();
$recommended_result = $recommended_stmt->get_result();
$recommended_cars = $recommended_result->fetch_all(MYSQLI_ASSOC);
$carCount = count($recommended_cars);
?>

<!-- Recommended Section -->
<div class="rcm">
    <h2>Recommended For You</h2>
</div>

<!-- First set of recommended cars -->
<div class="rcmoption1">
    <div class="arrowwrapper">
        <button class="leftarrow" onclick="show2()">&#10094;</button>
        <?php for ($i = 0; $i < min(4, $carCount); $i++): // Display the first 4 cars ?>
            <a href="CarDetail.php?car_id=<?php echo urlencode($recommended_cars[$i]['car_id']); ?>" class="rcmpic">
                <img src="uploads/<?php echo htmlspecialchars($recommended_cars[$i]['cover_image']); ?>" class="rcm-image" alt="<?php echo htmlspecialchars($recommended_cars[$i]['car_name']); ?>">
                <p><?php echo htmlspecialchars($recommended_cars[$i]['car_name']); ?></p>
                <p>RM <?php echo htmlspecialchars($recommended_cars[$i]['price']); ?></p>
            </a>
        <?php endfor; ?>
        <button class="rightarrow" onclick="show2()">&#10095;</button>
    </div>
</div>

<!-- Second set of recommended cars -->
<div class="rcmoption2" style="display: none;">
    <div class="arrowwrapper">
        <button class="leftarrow" onclick="show1()">&#10094;</button>
        <?php for ($i = 4; $i < min(8, $carCount); $i++): // Display next 4 cars if available ?>
            <a href="CarDetail.php?car_id=<?php echo urlencode($recommended_cars[$i]['car_id']); ?>" class="rcmpic">
                <img src="uploads/<?php echo htmlspecialchars($recommended_cars[$i]['cover_image']); ?>" class="rcm-image" alt="<?php echo htmlspecialchars($recommended_cars[$i]['car_name']); ?>">
                <p><?php echo htmlspecialchars($recommended_cars[$i]['car_name']); ?></p>
                <p>RM<?php echo htmlspecialchars($recommended_cars[$i]['price']); ?></p>
            </a>
        <?php endfor; ?>
        <button class="rightarrow" onclick="show1()">&#10095;</button>
    </div>
</div>

<script>
function show1() {
    document.querySelector('.rcmoption1').style.display = 'flex';
    document.querySelector('.rcmoption2').style.display = 'none'; 
}

function show2() {
    document.querySelector('.rcmoption2').style.display = 'flex'; 
    document.querySelector('.rcmoption1').style.display = 'none'; 
}
</script>

<?php
// Close the connection
$conn->close();
?>

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