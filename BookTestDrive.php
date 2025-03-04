<?php
  session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test Drive</title>
    <link rel="icon" type="image/jpeg" sizes="32x32" href="images/tab_logo.jpg">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
</head>
    <style>
body,html{
  margin:0;
  padding:0;
}


.logo {
  padding-right: 50px;
}
.test-drive-container {
  display: flex;
  flex-direction: column;
  align-items: center;
  padding: 20px;
  max-width: 1080px;
  margin: 0 auto;
  font-family: 'Poppins', sans-serif;
}


.test-drive-image img {
  width: 100%;
  height: 400px;
  border-radius: 10px;
  margin-bottom: 20px;
}


.test-drive-form {
  width: 100%;
  background-color: #fff;
  padding: 20px;
  border-radius: 10px;
  box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
  text-align: center;
}

.test-drive-form h2 {
  font-size: 24px;
  font-weight: 600;
  margin-bottom: 10px;
}

.test-drive-form p {
  font-size: 16px;
  color: #666;
  margin-bottom: 20px;
}

.form-group {
  display: flex;
  justify-content: space-between;
  margin-bottom: 15px;
}

.form-group input, .form-group select {
  width: 48%;
  padding: 10px;
  margin: 1.5px;
  border: 1px solid #ccc;
  border-radius: 5px;
  font-size: 16px;
}



.form-group.full-width input, .form-group.full-width select {
  width: 100%;
}

.form-group button {
  padding: 12px 500px;
  font-size: 16px; 
  font-weight: 500;
  border: 1px solid black;
  background-color: rgb(0, 0, 0);
  color :#fff;
  cursor: pointer;
  border-radius: 5px;
  transition: background-color 0.3s ease;

}
.form-group.full-width a:hover {
  background-color: #555;
}


.form-group.agreement {
  display: flex;
  margin-bottom: 18px;
  align-items: center;

}

.form-group.agreement input[type="checkbox"] {
  margin-right: 10px;
  width: 20px;
  height: 20px;
  margin-bottom: 5px;
}

.form-group.agreement label {
  font-size: 14px;
  color: #555;
  margin-right: auto;
  text-align: left;
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
  padding:10px;
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
  text-decoration:solid;
  font-weight: normal;
  height: 100%;
  display: flex;
  align-items: center;
  font-size: 20px;
  text-decoration:solid;
  font-family: "Montserrat", sans-serif;
}

header ul li a:hover{
  
  font-weight: bold;
}

header ul li ul {
  position:absolute;
  display: none;  
  top: 100%;  
  left: 50%;
  transform: translateX(-50%);
  padding: 0;
  list-style: none;
  width: 150px;  
  z-index:10;
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
/*  */
/* Footer */
footer {
  background-color: #000000;
  color: white;
  padding: 20px 75px 20px 75px;
  text-align: center;
  font-weight: normal;
  font-family: "Montserrat", sans-serif;
}
footer h4{
  font-weight: normal;
  font-family: "Montserrat", sans-serif;
}
strong{
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
  flex-grow:1;
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

footer .footer-links ul li a{
  text-decoration: none;
  color:white;
}

footer .footer-links ul li a:hover{
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
    font-size:12px;
  }
}

@media (max-width: 768px) {
  .test-drive-form {
    padding: 15px; 
  }

  .form-group {
    flex-direction: column; 
    align-items: center; 
  }

  .form-group input,
  .form-group select {
    width: 100%; 
    margin: 5px 0; 
  }

  .form-group button {
    padding: 10px 20px; 
    font-size: 14px;
  }
}

@media (max-width: 480px) {
  .form-group input,
  .form-group select {
    font-size: 14px; 
    padding: 8px;
  }
 
  .test-drive-image img {
    max-height: 300px;
  }

  .form-group button {
    padding: 10px 15px; 
    font-size: 12px; 
  }
}



    </style>
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

    <div class="test-drive-container">
        <!-- Image Section -->
        <div class="test-drive-image">
          <img src="uploads/ad4.jpg" alt="Car Image" />
        </div>
      
        <!-- Form Section -->

        <div class="test-drive-form">
          <h2>Book a Test Drive</h2>
          <p>Get in touch for a test drive appointment today.</p>
      
          <!-- Form Fields -->
          <form id="testDriveForm"  action="submit.php" method="post">
            <div class="form-group">
              <input type="text" name="first_name" placeholder="First Name*" required />
              <input type="text" name="last_name" placeholder="Last Name*" required />
            </div>
            <div class="form-group">
              <input type="tel" name="phone" placeholder="Phone*" required />
              <input type="email" name="email" placeholder="Email*" required />
            </div>
              </select>
              <div class="form-group">
                <input type="date" name="preferred_date" required />
                <input type="time" name="preferred_time" required />
              </div>
              <div class="form-group agreement">
                <input type="checkbox" id="agreement" name="agreement" required />
                <label for="agreement">
I agree to receive marketing communications, including postal mail, SMS, emails, from Haruna for special promotions, news, events and cars updates. You may withdraw your consent at anytime. The information you provide is used to improve the service</a>.
                </label>
              </div>
        
              <!-- Submit Button -->
              <div class="form-group full-width">         
                  <button type="submit">SUBMIT</button>
              </div>
            </div>
           
          </form>
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