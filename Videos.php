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
    <title>Videos</title>
</head>
<script>
    
    function performSearch() {
            let query = document.getElementById("search-input").value.toLowerCase();
            let videos = document.querySelectorAll(".videos-item"); 
            let found = false;

            videos.forEach((video) => {
                let title = video.querySelector("h3").innerText.toLowerCase(); 
                let description = video.querySelector("p").innerText.toLowerCase(); 
                
                
                video.classList.remove("hidden"); 

                
                if (!title.includes(query) && !description.includes(query)) {
                    video.classList.add("hidden"); 
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
                videos.forEach((video) => {
                    video.classList.remove("hidden"); 
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


    <h2 style="text-align: center;">Videos</h2>
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

    <div class="car-videos">
        <div class="videos-item">
            <div class="video-wrapper">
                <iframe src="https://www.youtube.com/embed/LwWUaXwypWQ" title="2025 BMW X3 -- The #1 BMW Goes in a BOLD New Direction!" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
            </div>
            <div class="videos-content">
                <h3>2025 BMW X3 -- The #1 BMW Goes in a BOLD New Direction!</h3>
                <p>BMW has radically redesigned its most popular SUV, the X3, for 2025! But, with bold new looks and tech, is this X3 still bound to be a best-seller? Or should you buy the new competition: the Mercedes GLC, Genesis GV70, or Audi Q5?</p>
                
            </div>
        </div>
        <div class="videos-item">
            <div class="video-wrapper">
                <iframe src="https://www.youtube.com/embed/DHRxnTPrzOQ" title="NEW BYD Seal review – is this Chinese EV REALLY better than a Tesla? | What Car?" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
            </div>
            <div class="videos-content">
                <h3>NEW BYD Seal review – is this Chinese EV REALLY better than a Tesla?</h3>
                <p>The new BYD Seal is an electric car from China which looks like it has all the ingredients to take on the Tesla Model 3. It has a massive range, a practical interior and it is packed with equipment.</p>
                
        
            </div>
        </div>
        <div class="videos-item">
            <div class="video-wrapper">
                <iframe src="https://www.youtube.com/embed/tnTAZbKkWT0" title="2025 Chevy Equinox ACTIV -- A Better Pick Than RAV4 Adventure or Forester??" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
            </div>
            <div class="videos-content">
                <h3>2025 Chevy Equinox ACTIV -- A Better Pick Than RAV4 Adventure or Forester??</h3>
                <p>For 2025, the Equinox lineup sees the addition of the new, rugged ACTIV trim! Does this trim, set to go off the beaten bath, have a great mix of luxury and utility? Or should you buy the new competition: the Toyota RAV4, Hyundai Tucson or Kia Sportage?</p>
                
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