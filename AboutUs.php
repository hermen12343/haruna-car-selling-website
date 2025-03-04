<?php
  session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" type="image/jpeg" sizes="32x32" href="images/tab_logo.jpg">
  <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="css/style.css">
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
    rel="stylesheet">
  <title>About Us</title>
</head>

<style>
  * {
    box-sizing: border-box;
  }

  body, html{
    margin: 0;
    padding: 0;
    display: flex;
    flex-direction: column;
    background-color: #ccc;
    height:100%;
  }

  main {
    flex: 1;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: space-between;
    padding-bottom:75px;
    Width:100%;
    
}
  /* Header */
  header {
    background-color: #000000;
    padding: 0px 20px;
    min-height: auto;
    text-align: center;
  }

  header nav {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 10px;
  }

  header ul {
    list-style-type: none;
    padding: 0;
    display: flex;
    justify-content: center;
  }

  header ul li {
    position: relative;
    margin-right: 50px;
    align-items: center;
  }

  header ul li a {
    color: rgb(255, 255, 255);
    text-decoration: solid;
    font-weight: normal;
    height: 100%;
    display: flex;
    align-items: center;
    font-size: 20px;
    text-decoration: solid;
    font-family: "Montserrat", sans-serif;
  }

  header ul li a:hover {
    font-weight: bold;
  }

  header ul li ul {
    position: absolute;
    display: none;
    top: 100%;
    left: 50%;
    transform: translateX(-50%);
    padding: 0;
    list-style: none;
    width: 150px;
    z-index: 10;
  }

  header ul li ul li {
    margin: 0;
  }

  header ul li ul li a {
    padding: 10px;
    color: white;
    display: block;
    background-color: black;

  }

  header ul li:hover ul {
    display: block;
  }

  header ul li ul li a:hover {
    background-color: black;
    color: white;
    border-radius: 10px;
  }

  header .auth {
    position:relative;
    display: flex;
    align-items: center;
    gap: 5px;
  }
  
  header .auth a {
    color: rgb(255, 255, 255);
    text-decoration: none;
    font-weight: normal;
    font-size: 20px;
    font-family: "Montserrat", sans-serif;
  }
  
  header .auth a:hover{
    font-weight:bold;
  }
  
  header .auth span{
    color: #fff;
    padding: 0px 10px;
    font-weight: bold;
    font-family: "Montserrat", sans-serif;
    font-size: 24px;
  }


.auth .dropdown-content {
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  z-index: 1;
  padding: 0;
  top: 60%; 
  right:0;
  border-radius: 8px;
  min-width: 80px;

}




.auth .dropdown-content li {
  list-style: none;
  padding: 0;
  margin:0;
}

.auth .dropdown-content li a {
  color: black;
  display: block;
  padding: 10px 15px;
  text-align:center;
  transition: background-color 0.3s, color 0.3s;
}

.auth .dropdown-content li a:hover {
  background-color: #E75480;
  border-radius: 8px;
  box-shadow: 0px 8px 16px rgba(215, 77, 77, 0.8);
}


.auth:hover .dropdown-content,
.auth .dropdown-content:hover {
    display: block; 
}


.auth > .username {
    cursor: pointer;
    background-color: white;
    color: black;
    padding: 8px 20px;
    border-radius: 5px;
    font-size: 18px;
    font-weight: bold;
    transition: background-color 0.3s;
    display: inline-block;
}
.auth > .username:hover {
  background-color: #E75480;
  font-weight: 1000;
}

 
  /* Footer */
  footer {
    background-color: #000000;
    color: white;
    padding: 20px 75px 20px 75px;
    text-align: center;
    font-weight: normal;
    font-family: "Montserrat", sans-serif;
  }

  footer h4 {
    font-weight: normal;
    font-family: "Montserrat", sans-serif;
  }

  strong {
    font-size: larger;
  }

  .footer-content {
    display: flex;
    align-items: center;
    justify-content: space-between;
  }

  footer .footer-links {
    display: flex;
    justify-content: space-around;
    flex-grow: 1;
  }

  .brand-info {
    display: flex;
    flex-direction: column;
    align-items: center;
  }

  footer .footer-links ul {
    list-style-type: none;
  }

  footer .footer-links ul li {
    margin-bottom: 10px;
  }

  footer .footer-links ul li a {
    text-decoration: none;
    color: white;
  }

  footer .footer-links ul li a:hover {
    color: #E75480;
  }

  @media (max-width: 768px) {

    header nav {
      flex-direction: column;
 
      gap: 15px;
    }

    header ul {
      flex-direction: column;
  
      justify-content: flex-start;
    }

    header ul li {
      margin-right: 0;
      margin-bottom: 10px;
    }

    header ul li a {
      font-size: 16px;
 
    }

    
    .footer-content {
      flex-direction: column;
      align-items: center;
    }

    footer .footer-links {
      flex-direction: column;
      gap: 20px;
    }

    footer .footer-links ul li a {
      font-size: 14px;
    }
  }

  @media (max-width: 480px) {
    header {
      padding: 10px;
    }

    header ul {
      gap: 10px;
    }

    header ul li a {
      font-size: 14px;
    }

    footer {
      padding: 15px 40px;
    }

    footer .footer-links ul li a {
      font-size: 12px;
    }
  }


  .section {
    width: 100%;
    min-height: 80vh;
    padding: 20px 0;
    display: flex;
    align-items: center;
    justify-content: flex-start;
    background-color: #fff;
    border: 1px solid #ccc;
    border-radius: 10px;
    box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
    gap: 20px;
  }

  .title {

    text-align: center;
    font-size: 32px;
  }

  .content-section {
    width: 50%;
    padding-right: 10px;
  }

  .section .content-section h1 {
    font-size: 36px;
    font-weight: 700;
    color: #333;

  }

  .section .content-section p {
    font-size: 18px;
    color: #555;
    line-height: 1.6;
    margin-top: 10px;
  }

  .image-section {
    width: 45%;
    padding-left: 10px;
    margin: 0;
  }

  .image-section img {
    width: 100%;
    height: auto;
    border-radius: 10px;
  }


  .content-section .content p {
    text-align: left;
    padding-top: 15px;
    font-size: 20px;
    padding-left: 25px;
  }


  .about-section {
    display: flex;
    justify-content: space-between;
    padding: 20px;
    width: 100%;
    box-sizing: border-box;
    border-radius:10px;
  }

  .about-section p{
    font-size:20px;
  }
  .box {
    width: 48%;
    padding: 20px;
    border: 2px solid #eee;
    background-color: #fff;
    text-align: center;
  }

  .vision h2,
  .mission h2 {
    color: rgb(1, 1, 1);
    border-bottom: 5px solid #f7d200;
    display: inline-block;
    padding-bottom: 10px;
    margin-bottom: 20px;
    font-size: 24px;
    margin-top: 20px;
  }

  .container {
    margin: 0;
    padding: 0px;

  }


  .location-container {
    display: block;
    text-align: center;
    box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
    border: 1px solid #ccc;
    border-radius: 10px;
    margin-bottom: 0px; 
    padding-bottom: 20px; 
    width: 100%;
    padding-left: 0;
    padding-right: 0;

  }

  .location-section {
    display: inline-block;
    text-align: center;
    width: 100%;
    min-height: 60vh;
    background-color: #fff;
    border-radius:10px;
  }

  .location-list {
    height: 155px;
    margin-bottom: 40px;
    flex:1;
  }

  .location-section h2 {
    font-size: 28px;
    padding: 25px;
    margin-bottom:5px;
  }

  .center-item {
    border: 1px solid #ccc;
    margin: 20px 0px;
    padding: 20px 0px;
    background-color: #f9f9f9;
    border-radius: 8px;
    text-align: center;
    min-height:150px;
  }

  .center-item h3{
    margin-top:20px;
    font-size: 30px;
  }

  .center-item p{
    font-size: 20px;
  }

  .get-direction {
    display: inline-block;
    padding: 5px 15px;
    background-color: #007bff;
    color: white;
    text-decoration: none;
    border-radius: 5px;
    font-size: 20px;
  }

  .get-direction:hover {
    background-color: #0056b3;
  }

  iframe {
    border-radius: 10px;
    max-width:600px;
  }

  .logo {
    padding-right: 50px;
  }

  .title h1 {
    font-family: "Montserrat", sans-serif;
  }

  .p-title {
  margin-top: 20px;
  background-color: white;
  width:  100%;

}

.p-title h2 {
  text-align: center;
  font-size: 28px;
  color: #333;
  margin-bottom: 30px;
}

  .profile {
  display: flex;
  flex-wrap: wrap;
  justify-content: space-around;
  gap: 20px;
  padding: 0;
  margin-top: 20px;
  
}

.profile-item {
  width: 280px;
  display: flex;
  flex-direction: column;
  align-items: center;
  
}

.profile-item img {
  width: 100%;
  height: 65%;
  border-radius: 8px;
  box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
  
}

.profile-p {
  margin-top: 10px;
  display: flex;
  flex-direction: column;
  align-items: center;
}

.profile-p p {
  margin-top: 10px;
  font-size: 18px;
  color: #333;
}

</style>

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

<main>
  <div class="first-part">

    <div class="title">
      <h1>About Us</h1>
    </div>

    <div class="section">
      <div class="content-section">
        <div class="content">
          <p>Welcome to Haruna, your trusted car-buying and selling partner. We are dedicated about matching auto buyers
            with the right vehicle and assisting sellers in getting the greatest price for their vehicles. Whether you
            want to buy your ideal automobile or sell your present one, we make the transaction simple, clear, and
            hassle-free.
          </p>

          <p>Discover a new way to buy and sell cars with us!</p>
        </div>
      </div>
      <div class="image-section">
        <img src="images/logo.jpg" alt="Haruna Logo">
      </div>
    </div>

  </div>
  
  <div class="p-title"> 
  <h2>Meet Our Team</h2>
  <div class="profile">
  <div class="profile-item">
    <img src="images/Hermen.jpg" alt="Profile 1">
    <div class="profile-p">
    <p>Ang Kuan Hern</p>
    
    <p>TP074844</p>
    </div>
  </div>

  <div class="profile-item">
    <img src="images/Chan.jpg" alt="Profile 2">
    <div class="profile-p">
    <p>Chan Kar Jun</p>
    <p>TP074808</p>
  </div>
        </div>

  <div class="profile-item">
    <img src="images/Ian.png" alt="Profile 3">
    <div class="profile-p">
    <p>Ian Lim</p>
    <p>TP073235</p>
  </div>
        </div>

  <div class="profile-item">
    <img src="images/Ethan.jpg" alt="Profile 4">
    <div class="profile-p">
    <p> Ethan Kiau Keng Hin</p>
    <p>TP074657</p>
  </div>
</div>
</div>
  </div>
        


  <div class="about-section">
    <div class="box vision">
      <h2>OUR VISION</h2>
      <p>To simplify car buying and selling through a user-friendly platform that connects buyers and sellers efficiently.
      </p>
    </div>
    <div class="box mission">
      <h2>OUR MISSION</h2>
      <p>To be the leading digital platform for seamless and trusted car buying and selling experiences at whole Malaysia</p>
      <p>We are committed towards providing the most delightful and memorable experiences to our customers.</p>
    </div>
  </div>

  <div class="location-container">
    <div class="location-section">
      <h2>OUR LOCATION</h2>
      <iframe
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3984.1466274461595!2d101.69579779678958!3d3.055405699999997!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31cc4abb795025d9%3A0x1c37182a714ba968!2sAsia%20Pacific%20University%20of%20Technology%20%26%20Innovation%20(APU)!5e0!3m2!1sen!2smy!4v1728743201204!5m2!1sen!2smy"
        width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
        referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>

    <div class="location-list">

      <div class="center-item">
        <h3>Haruna - APU</h3>
        <p> Jalan Teknologi 5, Taman Teknologi Malaysia,<br>57000 Kuala Lumpur, Wilayah Persekutuan Kuala Lumpur</p>
        <p>9AM - 6PM Monday-Sunday (Operational on public holidays)</p>
        <a href="https://maps.app.goo.gl/TJDf3WWc627sRKBw9" class="get-direction" target="_blank">Get Direction</a>
      </div>
    </div>
  </div>
</main>
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