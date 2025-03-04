
<?php
    include 'database.php'; 
    session_start();

    $cars = []; 


        
        $query = $db->query("SELECT * FROM tblcars_for_sale");
        $cars = $query->fetchAll(PDO::FETCH_ASSOC);

    


        $carId1 = 9;
        $sql1 = "SELECT car_id, cover_image FROM tblcars_for_sale WHERE car_id = $carId1";
        $result1 = $conn->query($sql1);
        
    
        $carId2 = 10;
        $sql2 = "SELECT car_id, cover_image FROM tblcars_for_sale WHERE car_id = $carId2";
        $result2 = $conn->query($sql2);
        
        $car1 = null;
        $car2 = null;
        
        if ($result1->num_rows > 0) {
            $car1 = $result1->fetch_assoc();
        }
        
        if ($result2->num_rows > 0) {
            $car2 = $result2->fetch_assoc();
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
    <title>Haruna</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="icon" type="image/jpeg" sizes="32x32" href="images/tab_logo.jpg">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
</head>
<style>
     a {
        text-decoration: none; 
        color: inherit; 
    }
    

    .logo{
        padding-right: 50px;
    }
</style>
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
    <banner>
        <div class="mainbanner">
            <div class="slide active">
                <img src="images/banner1.jpg" style="width: 100%; height: 500px; object-fit: cover;">
            </div>
            <div class="slide">
                <img src="images/banner2.jpg" style="width: 100%; height: 500px; object-fit: cover;">
            </div>
            <div class="slide">
                <img src="images/supra.jpg" style="width: 100%; height: 500px; object-fit: cover;">
            </div>
        </div>
    </banner>
    
    <script>
        let currentSlide = 0;
        const slides = document.querySelectorAll('.slide');

        function showSlide(index) {
            slides.forEach((slide, i) => {
                slide.classList.remove('active');
                if (i === index) {
                    slide.classList.add('active');
                }
            });
        }

        function nextSlide() {
            currentSlide = (currentSlide + 1) % slides.length; 
            showSlide(currentSlide);
        }

      
        showSlide(currentSlide);


        setInterval(nextSlide, 4000);

    </script>
    
    <browse>
    <section class="typebrowser">
        <h2>Browse By Type</h2>
        <div class="option">
            <div class="option-card" onclick="redirectToBuyPageWithType('SUV')">
                <img src="images/suv.jpg" class="option-image">
                <p>SUV</p>
            </div>
            <div class="option-card" onclick="redirectToBuyPageWithType('Sedan')">
                <img src="images/sedan.jpg" class="option-image">
                <p>Sedan</p>
            </div>
            <div class="option-card" onclick="redirectToBuyPageWithType('Truck')">
                <img src="images/truck.jpg" class="option-image">
                <p>Truck</p>
            </div>
            <div class="option-card" onclick="redirectToBuyPageWithType('Hybrid')">
                <img src="images/hybrid.jpg" class="option-image">
                <p>Hybrid</p>
            </div>
            <div class="option-card" onclick="redirectToBuyPageWithType('EV')">
                <img src="images/EV.jpg" class="option-image">
                <p>EV</p>
            </div>
        </div>
    </section>
</browse>

<script>
    function redirectToBuyPageWithType(type) {

        const queryParams = new URLSearchParams({
            type: type
        });
        window.location.href = 'buypage.php?' + queryParams.toString();
    }
</script>

        
    
    </browse>
    <filtersearch>
    <div class="searchboxfilter">
        <h2>Filter Search</h2>
        <div class="inputgroup">
            <select id="condition-home">
                <option value="">All Condition</option>
                <option value="New">New</option>
                <option value="Used">Used</option>
            </select>
        </div>
        <div class="inputgroup">
            <select id="brand-home">
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
            <select id="location-home">
                <option value="">All Location</option>
                <option value="East Malaysia">East Malaysia</option>
                <option value="West Malaysia">West Malaysia</option>   
            </select>
        </div>
        <button class="search-btn" onclick="redirectToBuyPage()">Search</button>
    </div>
</filtersearch>

<script>
    function redirectToBuyPage() {
        const condition = document.getElementById('condition-home').value;
        const brand = document.getElementById('brand-home').value;
        const location = document.getElementById('location-home').value;

        const queryParams = new URLSearchParams({
            condition: condition,
            brand: brand,
            location: location,
        });

       
        window.location.href = 'buypage.php?' + queryParams.toString();
    }
</script>

</form>

    <ads-box>
<div class="ad-section">
   
    <a href="CarDetail.php?car_id=<?php echo urlencode($car1['car_id']); ?>" class="ad-box">
        <img src="uploads/<?php echo htmlspecialchars($car1['cover_image']); ?>" alt="Ad 1" class="ad-image">
        <p>Learn More...</p>
    </a>

 
    <a href="CarDetail.php?car_id=<?php echo urlencode($car2['car_id']); ?>" class="ad-box">
        <img src="uploads/<?php echo htmlspecialchars($car2['cover_image']); ?>" alt="Ad 2" class="ad-image">
        <p>Learn More...</p>
    </a>
</div>

    </ads-box>
    <div class="rcm">
        <h2>Recommended For You</h2>
</div>
<div class="rcmoption1">
    <div class="arrowwrapper">
        <button class="leftarrow" onclick="show1()">&#10094;</button>
        <?php for ($i = 0; $i < 4; $i++): // Display the first 4 cars in the first row ?>
        <a href="CarDetail.php?car_id=<?php echo urlencode($cars[$i]['car_id']); ?>" class="rcmpic">
            <img src="uploads/<?php echo htmlspecialchars($cars[$i]['cover_image']); ?>" class="rcm-image" alt="<?php echo htmlspecialchars($cars[$i]['car_name']); ?>">
            <p><?php echo htmlspecialchars($cars[$i]['car_name']); ?></p>
            <p>RM<?php echo htmlspecialchars($cars[$i]['price']); ?></p>
        </a>
        <?php endfor; ?>
        <button class="rightarrow" onclick="show2()">&#10095;</button>
    </div>
</div>

<div class="rcmoption2" style="display: none;">
    <div class="arrowwrapper">
        <button class="leftarrow" onclick="show1()">&#10094;</button>
        <?php for ($i = 4; $i < min(8, $carCount); $i++): ?>
        <a href="CarDetail.php?car_id=<?php echo urlencode($cars[$i]['car_id']); ?>" class="rcmpic">
            <img src="uploads/<?php echo htmlspecialchars($cars[$i]['cover_image']); ?>" class="rcm-image" alt="<?php echo htmlspecialchars($cars[$i]['car_name']); ?>">
            <p><?php echo htmlspecialchars($cars[$i]['car_name']); ?></p>
            <p>RM<?php echo htmlspecialchars($cars[$i]['price']); ?></p>
        </a>
        <?php endfor; ?>
        <button class="rightarrow" onclick="show2()">&#10095;</button>
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


   <section class="howitworks">
    <h2>How It Works</h2>
    <button class="searchbtn1" onclick="showHowToBuy()">How to Buy</button>
    <button class="searchbtn2" onclick="showHowToSell()">How to Sell</button>
    <div class="how buy-section">
        <div class="how-card">
                <img src="images/buy1.png"  class="how-image">
                <p>Search For Car</p>

        </div>
        <div class="how-card">
                <img src="images/buy2.png"  class="how-image">
                <p>Book Test Drive</p>
    
        </div>
        <div class="how-card">
            <img src="images/buy3.png"  class="how-image">
            <p>Purchase Car</p>

        </div>
        <div class="how-card">
                <img src="images/buy4.png"  class="how-image">
                <p>Worry-free Warranty</p>

        </div>
    </div>

   </section>
   <div class="how sell-section" style="display: none;">
    <div class="how-card">
        <img src="images/sell2.png" class="how-image">
        <p>Take Picture Of Your Car</p>
    </div>
    <div class="how-card">
        <img src="images/sell1.png" class="how-image">
        <p>Post On Haruna</p>
    </div>
    <div class="how-card">
        <img src="images/sell3.png" class="how-image">
        <p>Sell Car</p>
    </div>
    <div class="how-card">
        <img src="images/sell4.png" class="how-image">
        <p>Receive Payment</p>
    </div>
</div>
</section>

<script>
    function showHowToBuy() {
    document.querySelector('.buy-section').style.display = 'flex'; 
    document.querySelector('.sell-section').style.display = 'none'; 
}

function showHowToSell() {
    document.querySelector('.sell-section').style.display = 'flex'; 
    document.querySelector('.buy-section').style.display = 'none'; 
}

</script>

   
    <section class="brandbrowser">
    <h2>Browse By Brand</h2>
    <div class="brandoption">
        <div class="brand-card" onclick="redirectToBuyPageWithBrand('Audi')">
            <img src="images/audi.jpg" class="brand-image">
            <p>Audi</p>
        </div>

        <div class="brand-card" onclick="redirectToBuyPageWithBrand('BMW')">
            <img src="images/bmw.jpg" class="brand-image">
            <p>BMW</p>
        </div>
        <div class="brand-card" onclick="redirectToBuyPageWithBrand('Ford')">
            <img src="images/ford.jpg" class="brand-image">
            <p>Ford</p>
        </div>

        <div class="brand-card" onclick="redirectToBuyPageWithBrand('Ferrari')">
            <img src="images/ferrari.jpg" class="brand-image">
            <p>Ferrari</p>
        </div>

        <div class="brand-card" onclick="redirectToBuyPageWithBrand('Honda')">
            <img src="images/honda.jpg" class="brand-image">
            <p>Honda</p>
        </div>
    </div>
</section>

<section class="brandbrowser">
    <div class="brandoption">
        <div class="brand-card" onclick="redirectToBuyPageWithBrand('Toyota')">
            <img src="images/toyota.jpg" class="brand-image">
            <p>Toyota</p>
        </div>
        <div class="brand-card" onclick="redirectToBuyPageWithBrand('Nissan')">
            <img src="images/nissan.jpg" class="brand-image">
            <p>Nissan</p>
        </div>
        <div class="brand-card" onclick="redirectToBuyPageWithBrand('Porsche')">
            <img src="images/porsche.jpg" class="brand-image">
            <p>Porsche</p>
        </div>

        <div class="brand-card" onclick="redirectToBuyPageWithBrand('Mercedes')">
            <img src="images/mercedes.jpg" class="brand-image">
            <p>Mercedes</p>
        </div>

        <div class="brand-card" onclick="redirectToBuyPageWithBrand('Tesla')">
            <img src="images/tesla.jpg" class="brand-image">
            <p>Tesla</p>
        </div>
    </div>
</section>

<script>
    function redirectToBuyPageWithBrand(brand) {
        // Redirect to the buypage with the brand as a query parameter
        const queryParams = new URLSearchParams({
            brand: brand
        });
        window.location.href = 'buypage.php?' + queryParams.toString();
    }
</script>


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
