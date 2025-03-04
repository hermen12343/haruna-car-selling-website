<?php
  session_start();
?>

<!DOCTYPE html>
<html lang="en">
    

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/jpeg" sizes="32x32" href="images/tab_logo.jpg">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="All_News.css">
    <script>
        window.addEventListener('DOMContentLoaded', () => {
            const bannerData = {
                news: [
                    {
                        image: "https://s3-ap-southeast-1.amazonaws.com/motoristprod/editors%2Fimages%2F1727329888587-2024-Lotus-Theory-1-Concept-3-768x432.jpg",
                        title: "Latest News",
                        description: "Stay up-to-date with the latest news and updates from the automotive world.",
                        buttonText: "More News",
                        buttonLink: "#latestnews"
                    }
                ],
                videos: [
                    {
                        image: "https://s3-ap-southeast-1.amazonaws.com/motoristprod/editors%2Fimages%2F1724657077519-lamborghini-temerario-1-696x392.jpg",
                        title: "Latest Videos",
                        description: "Check out our latest videos for the most recent automotive news.",
                        buttonText: "More Videos",
                        buttonLink: "#latestvideos"
                    }
                ],
                reviews: [
                    {
                        image: "https://s3-ap-southeast-1.amazonaws.com/motoristprod/editors%2Fimages%2F1724988113187-2025++%281%29.png",
                        title: "Latest Reviews",
                        description: "Our latest reviews analyses of the newest cars on the market",
                        buttonText: "More Reviews",
                        buttonLink: "#latestreviews"
                    }   
                ]
            };
            const categories = ['news', 'videos', 'reviews'];
            let currentIndex = 0;
            let lastScrollPosition = 0;

            function updateBanner() {
                const bannerImage = document.querySelector('#banner-image-1 img');
                const bannerTitle = document.querySelector('.banner-content h1');
                const bannerDescription = document.querySelector('.banner-content p');
                const bannerButton = document.querySelector('.banner-content a button');
                const bannerLink = document.querySelector('.banner-content a');

                const categoryKey = categories[currentIndex];  
                const categoryData = bannerData[categoryKey][0];

                bannerImage.src = categoryData.image;
                bannerTitle.textContent = categoryData.title;
                bannerDescription.textContent = categoryData.description;
                bannerButton.textContent = categoryData.buttonText;
                bannerLink.href = categoryData.buttonLink;
            }
            
            
            document.getElementById("next-btn").addEventListener("click", function () {
                currentIndex = (currentIndex + 1) % categories.length; 
                updateBanner();
            });

            
            document.getElementById("prev-btn").addEventListener("click", function () {
                currentIndex = (currentIndex - 1 + categories.length) % categories.length; 
                updateBanner();
            });

            updateBanner();
            
            window.addEventListener('scroll', () => {
                const scrollPosition = window.scrollY;
                const delta = scrollPosition - lastScrollPosition;
                lastScrollPosition = scrollPosition;

                requestAnimationFrame(() => {
                    const bannerImage = document.querySelector('.banner-image');
                    const bannerContent = document.querySelector('.banner-content');
                  
                    bannerImage.style.transform = `translateY(${scrollPosition * 0.3}px)`;
                    bannerContent.style.transform = `translateY(${scrollPosition * -0.3}px)`;
                });
            });
        });
    </script>
    <title>All News</title>
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

    <!-- Banner -->
    <div class="banner">

        <div class="banner-image" id="banner-image-1">
            <img src="https://s3-ap-southeast-1.amazonaws.com/motoristprod/editors%2Fimages%2F1727329888587-2024-Lotus-Theory-1-Concept-3-768x432.jpg"
                alt="Banner Image">
        </div>

        <div class="banner-content">
            <h1>Latest News</h1>
            <p>Stay up-to-date with the latest news and updates from the automotive world.</p>
            <a href="#latestnews"><button>More Info</button></a>
        </div>
        <div class="banner-controls">
            <button class="prev" id="prev-btn">&lt;</button>
            <button class="next" id="next-btn">&gt;</button>
        </div>
    </div>
    
    <!-- Content Section -->
    <div class="content">
        <h2>Car Reviews & News</h2>
        <div class="nav-bar-container">
            <!-- Nav Bar -->
            <div class="nav-bar">
                <a href="Car_News.php">Car News</a>
                <a href="Videos.php">Videos</a>
                <a href="Reviews.php">Reviews</a>
            </div>

            
        </div>

        <h3 id="latestnews">All Latest News</h3>
        <div class="grid-container">
            <div class="grid-item">
                <a href="https://www.motorist.my/article/3571/lotus-theory-1-reviving-legacy-with-all-electric-innovation"
                    target="_blank">
                    <div class="image-container">
                        <img
                            src="https://s3-ap-southeast-1.amazonaws.com/motoristprod/editors%2Fimages%2F1727329888587-2024-Lotus-Theory-1-Concept-3-768x432.jpg">
                    </div>
                    <div class="info-container">
                        <h4>Lotus Theory 1: reviving legacy with all-electric innovation</h4>
                        <p>The all-electric Lotus Theory 1 represents a bold move by the iconic British marque to
                            reconcile its storied past with the demands of modern automotive engineering. As Lotus
                            continues to evolve in a world increasingly driven by sustainability, the Theory 1 stands as
                            a testament to the brand's enduring philosophy—one that emphasizes lightweight design,
                            exhilarating performance, and unparalleled driving dynamics.</p>
                    </div>
                </a>
            </div>
            <div class="grid-item">
                <a href="https://www.motorist.my/article/3558/subaru-outback-arrives-in-malaysia-na-vs-turbo-boxer-priced-from-rm280k"
                    target="_blank">
                    <div class="image-container">
                        <img
                            src="https://s3-ap-southeast-1.amazonaws.com/motoristprod/editors%2Fimages%2F1727162325622-2024+Subaru+Outback.png">
                    </div>
                    <div class="info-container">
                        <h4>Subaru Outback arrives in Malaysia: NA vs Turbo Boxer, priced from RM280k</h4>
                        <p>Subaru has officially launched the 2024 Subaru Outback in Malaysia, offering a choice between
                            two distinct powertrains. The iconic SUV now comes with either a naturally aspirated (NA)
                            2.5-liter engine or a turbocharged 2.4-liter boxer engine. Both options deliver the perfect
                            blend of performance and practicality, making the Outback a strong contender for adventure
                            seekers and daily drivers alike.</p>
                    </div>
                </a>
            </div>
            <div class="grid-item">
                <a href="https://www.motorist.my/article/3589/2024-peugeot-408-stylish-looks-but-is-it-worth-rm146k"
                    target="_blank">
                    <div class="image-container">
                        <img
                            src="https://s3-ap-southeast-1.amazonaws.com/motoristprod/editors%2Fimages%2F1727682183524-jpjebid+%281%29.png">
                    </div>
                    <div class="info-container">
                        <h4>2024 Peugeot 408: stylish looks, but is it worth RM146k?</h4>
                        <p>The all-new 2024 Peugeot 408 has made its grand entrance in Malaysia, and it's turning heads.
                            With a sleek fastback design, the 408 combines sporty aesthetics with premium appeal, but is
                            it more than just a pretty face? Available in three variants with prices starting from
                            RM146k, it promises to be a premium yet affordable option in the mid-range sedan market.
                            Let’s dive into the details.</p>
                    </div>
                </a>
            </div>
            <div class="grid-item">
                <a href="https://www.motorist.my/article/3554/omoda-c9-malaysia-preview-watch-live-on-facebook-instagram-today"
                    target="_blank">
                    <div class="image-container">
                        <img
                            src="https://s3-ap-southeast-1.amazonaws.com/motoristprod/editors%2Fimages%2F1727142328679-omoda-c9-1-696x391.jpg">
                    </div>
                    <div class="info-container">
                        <h4>Omoda C9 Malaysia preview: watch Live on Facebook & Instagram today!</h4>
                        <p>Exciting news for car enthusiasts in Malaysia! The highly anticipated Omoda C9 is set to make
                            its local debut, and you can catch the exclusive preview via livestream today at 10:30 am on
                            Facebook and Instagram. Omoda, known for its futuristic designs and cutting-edge technology,
                            is unveiling its newest model, the C9, and it’s all happening live on social media.</p>
                    </div>
                </a>
            </div>
            <div class="grid-item">
                <a href="https://www.motorist.my/article/3429/2024-toyota-gr86-in-malaysia-retuned-refined-and-unchanged-at-rm295k"
                    target="_blank">
                    <div class="image-container">
                        <img
                            src="https://s3-ap-southeast-1.amazonaws.com/motoristprod/editors%2Fimages%2F1724660912359-2024-Toyota-GR86_2.jpeg">
                    </div>
                    <div class="info-container">
                        <h4>2024 Toyota GR86 in Malaysia: retuned, refined, and unchanged at RM295k</h4>
                        <p>The 2024 Toyota GR86, a beloved sports car in Malaysia, has received an exciting update while
                            keeping its price tag unchanged at RM295,000. Known for its exceptional balance of
                            performance and affordability, the GR86 continues to be a favorite among driving
                            enthusiasts.</p>
                    </div>
                </a>
            </div>
            <div class="grid-item">
                <a href="https://www.motorist.my/article/3427/unleashing-the-future-lamborghini-temerario-debuts-with-907-hp-twin-turbo-v8-phev"
                    target="_blank">
                    <div class="image-container">
                        <img
                            src="https://s3-ap-southeast-1.amazonaws.com/motoristprod/editors%2Fimages%2F1724657077519-lamborghini-temerario-1-696x392.jpg">
                    </div>
                    <div class="info-container">
                        <h4>Unleashing the future: Lamborghini Temerario debuts with 907 HP twin-turbo V8 PHEV</h4>
                        <p>Lamborghini has officially unveiled the highly anticipated Temerario, the successor to its
                            legendary Huracán. This stunning supercar takes the Italian automaker’s commitment to
                            innovation and performance to new heights, featuring a powerful 4.0L twin-turbo V8 hybrid
                            engine. With a staggering output of 907 horsepower and 850 Nm of torque, the Temerario
                            promises a thrilling driving experience.</p>
                    </div>
                </a>
            </div>
        </div>

        <!-- Video Section -->
        <h3 id="latestvideos">Latest Videos</h3>
        <div class="grid-container">
            <div class="grid-item">
                    <div class="video-container">
                        <iframe src="https://www.youtube.com/embed/zI3kltiHZ6k" title="2025 BMW X1 -- What&#39;s NEW with the Most Affordable BMW SUV??" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                    </div>
                    <div class="video-info-container">
                        <h4>2025 BMW X1 -- What's NEW with the Most Affordable BMW SUV??</h4>
                        <p>Coming off a redesign, BMW is continuing to build on their most affordable SUV, with more standard features for 2025! So, is this BMW a value packed option for an entry-level luxury offering? Or should you buy the new competition: the Mercedes GLA, Audi Q3 or Lexus UX?</p>  
                    </div>
            </div>
            <div class="grid-item">
                <div class="video-container">
                    <iframe src="https://www.youtube.com/embed/9kZxnRvoUPU" title="2025 Nissan Kicks -- This CUV *Kicks* Inflation to the Curb! (ONLY $22,000!)" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                </div>
                <div class="video-info-container">
                    <h4>2025 Nissan Kicks -- This CUV *Kicks* Inflation to the Curb! (ONLY $22,000!)</h4>
                    <p>Nissan has radically redesigned their smallest crossover, the Kicks, for 2025! With a new face, new tech, and a new engine with AWD, is this Kicks a huge bargain for the segment? Or should you buy the new competition: the Chevy Trax, Hyundai Venue or Honda HR-V?</p>  
                </div>
            </div>
            <div class="grid-item">
                <div class="video-container">
                    <iframe src="https://www.youtube.com/embed/jR1LNlRtZho" title="2025 McLaren Artura Spider -- Unbelievable Open Air Fun + Great Livability = Ferrari Beater??" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                </div>
                <div class="video-info-container">
                    <h4>2025 McLaren Artura Spider -- Unbelievable Open Air Fun + Great Livability = Ferrari Beater??</h4>
                    <p>Following the introduction of the Coupe, the Spider is the newest version of McLaren's "entry level" supercar. So, is this V6 Plug-in Hybrid the Supercar of the future? Or should you buy the new competition: the Porsche 911, Ferrari 296 or Lamborghini Temerario?</p>  
                </div>
            </div>
            <div class="grid-item">
                <div class="video-container">
                    <iframe src="https://www.youtube.com/embed/ioF_ire9aXI" title="2025 Acura RDX -- It&#39;s REFRESHED with Exterior &amp; Interior Upgrades! (Yes, Really)" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                </div>
                <div class="video-info-container">
                    <h4>2025 Acura RDX -- It's REFRESHED with Exterior & Interior Upgrades! (Yes, Really)</h4>
                    <p>To keep it in line with the rest of the lineup, Acura is refreshing their popular RDX with some new looks and updated interior elements! With only a small price increase, is the RDX a luxury bargain for the segment? Or should you buy the new competition: the Lexus NX, Genesis GV70 or Infiniti QX50?</p>  
                </div>
            </div>
        </div>

        <!-- Review Section -->
        <h3 id="latestreviews">Latest Reviews</h3>
        <div class="grid-container">
            <div class="grid-item">
                <a href="https://www.carsifu.my/car-reviews/toyota-gr-supra-manual-joy-on-the-go"
                    target="_blank">
                    <div class="image-container">
                        <img
                            src="https://da4dkroembtou.cloudfront.net/wp-content/uploads/2024/09/2023-Toyota-GR-Supra-manual-10.jpg">
                    </div>
                    <div class="info-container">
                        <h4>Toyota GR Supra manual: Joy on the go</h4>
                        <p>A six-speed manual shifter in Toyota’s halo two-seater sports coupe, powered by a fiery 388PS/500Nm BMW-sourced B58 3.0-litre inline six-cylinder twin-scroll turbocharged engine, is a dream come true for driving purists who crave a more engaging experience.</p>
                    </div>
                </a>
            </div>
            <div class="grid-item">
                <div class="grid-item">
                    <a href="https://www.carsifu.my/car-reviews/chery-omoda-e5-premium-features-430km-range-wltp"
                        target="_blank">
                        <div class="image-container">
                            <img
                                src="https://da4dkroembtou.cloudfront.net/wp-content/uploads/2024/07/iPhone_0X3A1416-Custom.jpg">
                        </div>
                        <div class="info-container">
                            <h4>Chery Omoda E5: Premium features, 430km range (WLTP)</h4>
                            <p>CHERY Auto Malaysia has an impressive knack of packaging its cars with premium features and thoughtful, luxurious extras to deliver machines that feel like they cost double or more than the asking prices.</p>
                        </div>
                    </a>
                </div>
            </div>
            <div class="grid-item">
                <div class="grid-item"></div>
                    <a href="https://www.carsifu.my/car-reviews/2024-range-rover-velar-2-0l-dynamic-hse-lux-spec-swanky-suv-appeal"
                        target="_blank">
                        <div class="image-container">
                            <img
                                src="https://da4dkroembtou.cloudfront.net/wp-content/uploads/2024/06/INAL6895_27250700-Custom.jpg">
                        </div>
                        <div class="info-container">
                            <h4>2024 Range Rover Velar 2.0L Dynamic HSE (Lux Spec): Swanky SUV appeal</h4>
                            <p>THE 2024 refreshed Range Rover Velar continues to underline the luxury sports utility vehicle (SUV) aim of moving privileged occupants within a refined, classy and plush cabin, and pamper them with top comfort technologies.</p>
                        </div>
                    </a>
                </div>
            <div class="grid-item">
                <div class="grid-item"></div>
                    <a href="https://www.carsifu.my/car-reviews/2024-honda-cr-v-2-0l-ehev-rs-smooth-operator"
                        target="_blank">
                        <div class="image-container">
                            <img
                                src="https://da4dkroembtou.cloudfront.net/wp-content/uploads/2024/03/2024-Honda-CR-V-20L-eHEV-RS-9.jpg">
                        </div>
                        <div class="info-container">
                            <h4>2024 Honda CR-V 2.0L e:HEV RS: Smooth operator</h4>
                            <p>THE sixth-generation Honda CR-V sports utility vehicle (SUV) has seen strong sales in Malaysia with close to 6,500 bookings and 1,500 units registered in the two months since its local launch in December last year.</p>
                        </div>
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
</body>
</html>