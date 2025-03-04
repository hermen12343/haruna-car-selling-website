<?php
  session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/jpeg" sizes="32x32" href="images/tab_logo.jpg">
    <link rel="stylesheet" type="text/css" href="All_News.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <title>Car News</title>
</head>
<body>
    <div class="car-news-page">
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
    

    <h2 style="text-align: center;">Car News</h2>
    <div class="nav-bar-container">
        <!-- Nav Bar -->
        <div class="nav-bar">
            <a href="Car_News.php">Car News</a>
            <a href="Videos.php">Videos</a>
            <a href="Reviews.php">Reviews</a>
        </div>

    </div>
    
    <!-- Main Content Area -->
    <div class="content-wrapper">
        <div class="main-content" id="main-content">
    
            
            <!-- Featured news section -->
            <div class="featured-news">
                <div class="news-header">
                    <h2>Proton sells 11,269 units in September 2024: a mixed bag performance</h2>
                </div>
                <div class="news-content">
                    <img src="https://s3-ap-southeast-1.amazonaws.com/motoristprod/editors%2Fimages%2F1728009927952-Proton+X50+is+the+overall+sales+leader+for+SUVs_1.jpg" alt="Proton X50">
                    <p>In September 2024, Proton achieved impressive sales figures, selling 11,269 units, showcasing its resilience in a competitive automotive market. However, the year-to-date (YTD) performance reflects a 3% decline compared to 2023. The Proton S70, X50, X70, and X90 have emerged as leaders in their respective segments, demonstrating the brand's ongoing commitment to innovation and customer satisfaction.</p>
                </div>
            </div>
        </div>

        <!-- Popular news sidebar -->
        <aside class="popular-news">
            <h3>Popular News</h3>
            <ul>
                <li>
                    <a href="#" data-news-id="1">  
                        <img src="https://s3-ap-southeast-1.amazonaws.com/motoristprod/editors%2Fimages%2F1728006691582-myvi+car+%284%29.png" alt="Audi Q8">
                        Audi Q8 Sportback 55 e-tron, RM489k: A BMW iX ChalCHERY Auto Malaysia lenger?
                    </a>
                </li>
                <li>
                    <a href="#" data-news-id="2">
                        <img src="https://s3-ap-southeast-1.amazonaws.com/motoristprod/editors%2Fimages%2F1728005868951-image.jfif" alt="Chery Tiggo 8 Pro">
                        2025 Chery Tiggo 8 Pro e+ spotted in Malaysia
                    </a>
                </li>
                <li>
                    <a href="#" data-news-id="3">
                        <img src="https://s3-ap-southeast-1.amazonaws.com/motoristprod/editors%2Fimages%2F1727770709131-byd-m6-2-696x392.jpg" alt="BYD M6 EV">
                        2024 BYD M6 EV: Malaysia’s electric MPV game-changer with 530km range
                    </a>
                </li>
            </ul>
        </aside>
    </div>

    <!-- Related News Section -->
    <div class="related-news">
        <h3>Related News</h3>
        <div class="related-items">
            <div class="related-item">
                <a href="#" data-news-id="4">  
                    <img src="https://s3-ap-southeast-1.amazonaws.com/motoristprod/editors%2Fimages%2F1727246684988-Screenshot+%28120%29.png" alt="Ferrari">
                    Ferrari’s 12-Cylinder scale model costs more than a Perodua Ativa – seriously!
                </a>
            </div>
            <div class="related-item">
                <a href="#" data-news-id="5">
                    <img src="https://s3-ap-southeast-1.amazonaws.com/motoristprod/editors%2Fimages%2F1726104946767-2025-Bentley-Flying-Spur-2-e1726021384785-630x359.jpg" alt="Bentley Flying Spur">
                    2025 Bentley Flying Spur facelift: more power, more luxury for Malaysia
                </a>
            </div>
            <div class="related-item">
                <a href="#" data-news-id="6">
                    <img src="https://s3-ap-southeast-1.amazonaws.com/motoristprod/editors%2Fimages%2F1724983119757-2025-G45-BMW-X3-M-Performance-Parts-11-630x331.webp" alt="BMW X3 M">
                    Unlocking performance and style: The new BMW X3 M Performance parts
                </a>
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
    </div>
    <script>
        // Data for different news items
            const newsData = {
                1: {
                    title: "Audi Q8 Sportback 55 e-tron, RM489k: A BMW iX ChalCHERY Auto Malaysia lenger?",
                    image: "https://s3-ap-southeast-1.amazonaws.com/motoristprod/editors%2Fimages%2F1728006691582-myvi+car+%284%29.png",
                    content: "Audi has brought its electric elegance to Malaysia with the Audi Q8 Sportback 55 e-tron priced at RM489k. But with BMW’s iX already making waves, how does Audi’s latest EV stack up against its fierce German rival?"    
                },
                2: {
                    title: "2025 Chery Tiggo 8 Pro e+ spotted in Malaysia",
                    image: "https://s3-ap-southeast-1.amazonaws.com/motoristprod/editors%2Fimages%2F1728005868951-image.jfif",
                    content: "The Chery Tiggo 8 Pro e+ has been making waves internationally, and now, the latest model for 2025 has been spotted right here in Malaysia. With rumors swirling around a possible market-specific revision, Chery enthusiasts and SUV lovers alike are wondering what this upgraded version could bring to the table."
                },
                3: {
                    title: "2024 BYD M6 EV: Malaysia’s electric MPV game-changer with 530km range",
                    image: "https://s3-ap-southeast-1.amazonaws.com/motoristprod/editors%2Fimages%2F1727770709131-byd-m6-2-696x392.jpg",
                    content: "BYD continues to push boundaries in the EV world, and the upcoming 2024 BYD M6 EV is no exception. Set to make its debut in Malaysia, this all-electric MPV offers a compelling combination of power, efficiency, and style, making it a strong contender in the family EV market."
                },
                4: {
                    title: "Ferrari’s 12-Cylinder scale model costs more than a Perodua Ativa – seriously!",
                    image: "https://s3-ap-southeast-1.amazonaws.com/motoristprod/editors%2Fimages%2F1727246684988-Screenshot+%28120%29.png",
                    content: "Ferrari has always been a symbol of luxury and speed, but did you know you can own one for the price of a real car? No, not a full-size Ferrari but a 1:8 scale model of their iconic 12-cylinder supercar—priced at a jaw-dropping RM98,000, which is more than a brand-new Perodua Ativa!"    
                },
                5: {
                    title: "2025 Bentley Flying Spur facelift: more power, more luxury for Malaysia",
                    image: "https://s3-ap-southeast-1.amazonaws.com/motoristprod/editors%2Fimages%2F1726104946767-2025-Bentley-Flying-Spur-2-e1726021384785-630x359.jpg",
                    content: "The 2025 Bentley Flying Spur Facelift is coming to Malaysia, and it's a jaw-dropping blend of power, elegance, and sustainability. Boasting a formidable 782 PS plug-in hybrid (PHEV) setup derived from the Continental GT, Bentley has upped the ante for luxury sedans. This isn't just a car; it's an experience on wheels, designed for those who demand nothing less than the finest."
                },
                6: {
                    title: "Unlocking performance and style: The new BMW X3 M Performance parts",
                    image: "https://s3-ap-southeast-1.amazonaws.com/motoristprod/editors%2Fimages%2F1724983119757-2025-G45-BMW-X3-M-Performance-Parts-11-630x331.webp",
                    content: `  <strong> Are you a BMW enthusiast eagerly seeking ways to enhance your driving experience with the BMW X3? </strong>
                                <p> The latest update from Paul Tan's automotive blog reveals exciting news: the 2024 BMW X3 now boasts an extensive range of M Performance parts. This new lineup promises to elevate both the performance and aesthetic appeal of your vehicle, making it an excellent choice for those looking to inject a bit more excitement into their driving experience. </p>
                                <strong>Explore the New Range of BMW X3 M Performance Parts</strong>

                                <p>The 2024 BMW X3 has been engineered to offer a balance of luxury and performance, but the introduction of M Performance parts takes it to a whole new level. These parts are designed to offer drivers enhanced driving dynamics and a distinctive look that sets their vehicle apart from the rest.</p>

                                <strong>1. Aerodynamic Enhancements</strong>

                                <p>One of the standout features of the M Performance parts for the BMW X3 is the aerodynamic kit. This includes a new front splitter, side skirts, and a rear diffuser, all crafted to improve the vehicle’s aerodynamic efficiency. Not only do these components add a sporty flair, but they also contribute to better handling and stability at higher speeds.</p>

                                <strong>2. Sport Exhaust System</strong>

                                <p>For those who crave a more exhilarating driving experience, the M Performance sport exhaust system is a game-changer. This system delivers a more aggressive exhaust note and enhances engine performance, providing a more engaging and dynamic driving experience. It’s designed to offer both increased power and a more thrilling sound.</p>

                                <strong>3. Enhanced Suspension Components</strong>

                                <p>The M Performance suspension components offer significant upgrades to the X3’s handling characteristics. With an emphasis on precision and control, these parts improve cornering performance and overall driving dynamics. Whether you’re navigating winding roads or cruising on the highway, the enhanced suspension provides a more responsive and connected driving experience.</p>

                                <strong>4. Exclusive M Performance Wheels</strong>

                                <p>No performance upgrade is complete without a set of striking wheels. The new M Performance wheels for the BMW X3 are available in a range of designs and finishes, allowing you to customize the look of your vehicle while also improving performance. These wheels are not only visually appealing but are also engineered for optimal performance and durability.</p>

                                <strong>5. Interior Upgrades</strong>

                                <p>Inside the BMW X3, the M Performance parts extend to the cabin as well. Upgrades include sportier steering wheels, custom floor mats, and unique trim pieces that enhance the interior’s overall aesthetic. These elements are designed to provide a more refined and dynamic driving environment.</p>

                                <strong>Why Upgrade with M Performance Parts?</strong>

                                <p>Opting for M Performance parts for your BMW X3 offers several benefits. Firstly, these components are engineered by BMW to ensure compatibility and reliability, which means you can trust that they will enhance your vehicle’s performance without compromising its integrity. Secondly, they allow you to personalize your BMW X3, making it uniquely yours while reflecting your passion for driving.

                                <br><br>The introduction of the M Performance parts for the 2024 BMW X3 provides an exciting opportunity for drivers to boost both the performance and style of their vehicle. From aerodynamic enhancements to interior upgrades, these parts are designed to offer a superior driving experience. If you’re looking to take your BMW X3 to the next level, these M Performance parts are definitely worth considering."</p>`
                }
            };

            document.querySelectorAll('a[data-news-id]').forEach(function (anchor) {
            anchor.addEventListener('click', function (event) {
                event.preventDefault();  
                const newsId = this.getAttribute('data-news-id');
                const news = newsData[newsId];

                if (news) {
                    
                    const mainContent = document.querySelector('.main-content');
                    mainContent.innerHTML = `
                        <div class="featured-news">
                            <div class="news-header">
                                <h2>${news.title}</h2>
                            </div>
                            <div class="news-content">
                                <img src="${news.image}" alt="${news.title}" style="width: 100%; height: auto; object-fit: cover;">
                                <p>${news.content}</p>
                            </div>
                        </div>
                    `;
                }
            });
        });
    </script>
</body>
</html>