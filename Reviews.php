<?php
  session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="All_News.css">
    <link rel="icon" type="image/jpeg" sizes="32x32" href="images/tab_logo.jpg">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <title>Reviews</title>
</head>
<script>
    
    function performSearch() {
            let query = document.getElementById("search-input").value.toLowerCase(); 
            let reviews = document.querySelectorAll(".reviews-item"); 

            reviews.forEach((review) => {
                let title = review.querySelector("h3").innerText.toLowerCase(); 
                let description = review.querySelector("p").innerText.toLowerCase();
                
                
                review.classList.remove("hidden"); 

                
                if (!title.includes(query) && !description.includes(query)) {
                    review.classList.add("hidden"); 
                } else {
                    found = true;
                }
            });
            
            let noResultsMessage = document.getElementById("no-results");
            if (!found) {
                noResultsMessage.style.display = "block";
            } else {
                noResultsMessage.style.display = "none";
            }

            if (query === "") {
                reviews.forEach((review) => {
                    review.classList.remove("hidden");
                });
                noResultsMessage.style.display = "none";
            }  
        }
</script>
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


    <h2 style="text-align: center;">Reviews</h2>
    <div class="nav-bar-container">
        <!-- Nav Bar -->
        <div class="nav-bar">
            <a href="Car_News.php">Car News</a>
            <a href="Videos.php">Videos</a>
            <a href="Reviews.php">Reviews</a>
        </div>

        <!-- Search Bar -->
        <div class="search-bar">
            <input type="text" id="search-input" placeholder="Search" onkeyup="performSearch()">
            <button onclick="performSearch()">Search</button>
        </div>
    </div>

    <div class="car-reviews">
        <div class="reviews-item">
            <img src="https://da4dkroembtou.cloudfront.net/wp-content/uploads/2024/09/2023-Toyota-GR-Supra-manual-10.jpg" alt="Toyota GR Supra">
            <div class="reviews-content">
                <h3>Toyota GR Supra manual: Joy on the go</h3>
                <p>A six-speed manual shifter in Toyota’s halo two-seater sports coupe, powered by a fiery 388PS/500Nm BMW-sourced B58 3.0-litre inline six-cylinder twin-scroll turbocharged engine, is a dream come true for driving purists who crave a more engaging experience.</p>
                <a href="https://www.carsifu.my/car-reviews/toyota-gr-supra-manual-joy-on-the-go" target="_blank">Read More</a>
            </div>
        </div>
        <div class="reviews-item">
            <img src="https://da4dkroembtou.cloudfront.net/wp-content/uploads/2024/07/iPhone_0X3A1416-Custom.jpg" alt="Chery Omoda E5">
            <div class="reviews-content">
                <h3>Chery Omoda E5: Premium features, 430km range (WLTP)</h3>
                <p>CHERY Auto Malaysia has an impressive knack of packaging its cars with premium features and thoughtful, luxurious extras to deliver machines that feel like they cost double or more than the asking prices.</p>
                <a href="https://www.carsifu.my/car-reviews/chery-omoda-e5-premium-features-430km-range-wltp" target="_blank">Read More</a>
        
            </div>
        </div>
        <div class="reviews-item">
            <img src="https://da4dkroembtou.cloudfront.net/wp-content/uploads/2024/06/INAL6895_27250700-Custom.jpg" alt="Range Rover Velar">
            <div class="reviews-content">
                <h3>2024 Range Rover Velar: Swanky SUV appeal</h3>
                <p>The refreshed Range Rover Velar continues to underline the luxury sports utility vehicle (SUV) aim of moving privileged occupants within a refined, classy and plush cabin, pampering them with top comfort technologies.</p>
                <a href="https://www.carsifu.my/car-reviews/2024-range-rover-velar-2-0l-dynamic-hse-lux-spec-swanky-suv-appeal" target="_blank">Read More</a>
            </div>
        </div>
        <div id="no-results" style="display: none; text-align: center; padding: 20px;">
            <p>No results found.</p>
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