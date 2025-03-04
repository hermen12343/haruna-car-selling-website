<?php
session_start();


$servername = "localhost";  
$username = "root";
$password = "";  
$dbname = "haruna";  


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (!isset($_SESSION['user_id'])) {
    header("Location: not_logged_in.html");
    exit();
}

$user_id = $_SESSION['user_id'];

$sql = "SELECT * FROM tblcars_for_sale WHERE user_id = '$user_id'";
$result = $conn->query($sql);


if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_SESSION['user_id'])) {
    
  
    $target_dir = "uploads/";

   
    $coverImage = $_FILES['coverImage']['name'];
    $interiorImage = $_FILES['interiorImage']['name'];
    $exteriorImage = $_FILES['exteriorImage']['name'];
    $carServiceReport = $_FILES['carServiceReport']['name'];

    
    move_uploaded_file($_FILES['coverImage']['tmp_name'], $target_dir . $coverImage);
    move_uploaded_file($_FILES['interiorImage']['tmp_name'], $target_dir . $interiorImage);
    move_uploaded_file($_FILES['exteriorImage']['tmp_name'], $target_dir . $exteriorImage);
    move_uploaded_file($_FILES['carServiceReport']['tmp_name'], $target_dir . $carServiceReport);

   
    $car_name = $_POST['car_name'];
    $location = $_POST['location'];
    $price = $_POST['price'];
    $mileage = $_POST['mileage'];
    $years = $_POST['years'];
    $brand = $_POST['brand'];
    $model = $_POST['model'];
    $variant = $_POST['variant'];
    $transmission = $_POST['transmission'];
    $type = $_POST['type'];
    $seats = $_POST['seats'];
    $engine_cc = $_POST['engine_cc'];
    $horsepower = $_POST['horsepower'];
    $peak_torque = $_POST['peak_torque'];
    $engine_type = $_POST['engine_type'];
    $length = $_POST['length'];
    $width = $_POST['width'];
    $height = $_POST['height'];
    $wheel_base = $_POST['wheel_base'];
    $kerb_weight = $_POST['kerb_weight'];
    $fuel_tank = $_POST['fuel_tank'];
    $description = $_POST['description'];

    $user_id= $_SESSION['user_id'];

    // SQL query to insert form data into the cars_for_sale table
    $sql = "INSERT INTO tblcars_for_sale (car_name, location, price, mileage, years, brand, model, variant, transmission, type, seats, engine_cc, horsepower, peak_torque, engine_type, length, width, height, wheel_base, kerb_weight, fuel_tank, description, cover_image, interior_image, exterior_image, car_service_report, user_id)
            VALUES ('$car_name', '$location', '$price', '$mileage', '$years', '$brand', '$model', '$variant', '$transmission', '$type', '$seats', '$engine_cc', '$horsepower', '$peak_torque', '$engine_type', '$length', '$width', '$height', '$wheel_base', '$kerb_weight', '$fuel_tank', '$description', '$coverImage', '$interiorImage', '$exteriorImage', '$carServiceReport', '$user_id')";

    if ($conn->query($sql) === TRUE) {
        $_SESSION['message'] = "Car details have been added successfully!";
    } else {
        $_SESSION['message'] = "Error: " . $sql . "<br>" . $conn->error;
    }

    // Redirect after form submission to avoid resubmitting on refresh
    header("Location: My_Car.php");
    exit();  
}


$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/jpeg" sizes="32x32" href="images/tab_logo.jpg">
    <title>Seller Center</title>
    <style>
        
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            height: 100%;

        }

        header {
            background-color: #000000;
            padding: 7px 30px;
            min-height: auto;
            text-align: center;
            width: 100%;
            position: fixed;
            top: 0;
            left: 0;
            z-index: 10;
            box-sizing:border-box;
        }

        header nav {
            display: flex;
            justify-content: space-between;
            align-items: center;

        }

        header ul {
            list-style-type: none;
            padding: 0;
            width: 100%;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        header ul li {
            position: relative;
            margin-right: 50px;
            align-items: center;
            color: white;
        }



        /* Sidebar */
        .sidebar {
            width: 200px;
            background-color: #f4f4f4;
            padding: 10px 20px 20px 20px;
            height: 100%;
            position: fixed;
            top: 116px;
            left: 0;
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.5);
            border-radius: 8px 0 0 8px;
            overflow-y: auto;
        }

        .sidebar ul {
            list-style-type: none;
            padding: 0;


        }

        .sidebar ul li {
            padding: 15px 10px;
            display: flex;
            align-items: center;
            cursor: pointer;
            transition: background-color 0.3s ease;
            border-radius: 5px;
        }

        .sidebar ul li:hover {
            background-color: #e2e2e2;
        }

        .sidebar ul li img {
            margin-right: 10px;
            width: 60px;
            height: 60px;
        }

        .sidebar ul li.active {
            background-color: #d1d1d1;
            font-weight: bold;
        }

        .main-content {

            display: flex;
            flex-direction: row;
        }

        .main-content-section {
            margin-left: 230px;
            margin-bottom: 50px;
            padding-top: 126px;
            padding-left: 40px;
            width: calc(100% - 230px);
            box-sizing: border-box;

        }

        .user-info {
            display: flex;
            align-items: center;
            margin-left: auto;
            
        }

        .user-info img {
            vertical-align: middle;
        }

        .user-info span {
            margin-left: 10px;
            display: flex;
            align-items: center;
            font-size:20px;
            color:white;
            border-radius:5px;
        }

        .user-info span:hover{
            font-weight: 1000;
            color:#E75480;
        }
        /*dropdown */
        .user-info {
            position: relative; 
            cursor: pointer; 
        }

        .user-info .dropdown-menu {
            display: none; 
            position: absolute;
            top: 100%;
            right: 0;
            background-color: white;
            border: 1px solid #ccc;
            border-radius: 8px;
            list-style-type: none;
            box-shadow: 0px 8px 16px rgba(215, 77, 77, 0.8);
            min-width: 120px;
        }

        .user-info .dropdown-menu:hover{
            background-color:#E75480;
        }

        .user-info .dropdown-menu li {
            padding: 15px;
            text-align:center;
            width: 100%; 
            box-sizing: border-box;
        }
        

        .user-info .dropdown-menu li a {
            text-decoration: none;
            color: black;
            font-weight: 600;
            display:block;
            width:100%;
            font-size:18px;
        }

        .user-info .dropdown-menu li a:hover {
            color: black;
            font-weight: 1000;
        }

      
        .user-info:hover .dropdown-menu {
            display: block; 
        }
        .section-title {
            font-size: 24px;
            margin-bottom: 20px;
        }

        

    
        .car-list {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            
        }

        .car-item {
            border: 5px solid #ccc;
            border-radius:15px;
            padding: 10px;
            width: 450px;
            text-align: center;
            box-sizing: border-box;
        }

        .car-item img {
            width: 100%;
            height: 250px;
            margin-bottom: 10px;
        }

        .section {
            flex-grow: 1;

            display: none;
        }

        .section.active {
            display: block;
        }

        .section-box {
            background-color: #f9f9f9;
            padding: 15px;
            margin-bottom: 20px;
            border: 1px solid #ddd;
        }

        .flex-container {
            display: flex;
            gap: 20px;
        }

        .flex-item {
            flex-grow: 1;
        }

        .input-group {
            margin-bottom: 20px;
        }

        .input-group label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }

        textarea {
            width: 100%;
            min-height: 100px;
        }

        form button[type="submit"] {
            padding: 10px 30px;
            background-color: #E75480;
            color: whitesmoke;
            font-weight: bold;
            font-size: 15px;
            border: none;
            border-radius: 10px;
            cursor: pointer;
            
        }

        form button[type="submit"]:hover {
            background-color: #d6104c;
        }

        img {
            max-width: 100%;
            display: block;
            margin-bottom: 10px;
        }

        /* Styling for the upload box */
        .file-upload {
            text-align: center;
            margin: 20px 0;
        }

        .upload-box {
            border: 2px dashed #ccc;
            padding: 30px;
            width: 90%;
            height: 200px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .upload-text p {
            font-size: 16px;
            color: #666;
        }

        
        #file-preview {
            margin-top: 10px;
        }
        .submit-container {
            display: flex;
            justify-content: flex-end; 
            margin-top: 20px; 
        }

        
    </style>
</head>

<body>
    <!-- Header -->
    <header>
        <nav>
            <ul>
                <a href="index.php" class="logo">
                    <li><img src="images/logo.jpg" alt="logo" style="height: 60px;"></li>
                </a>
                <li style="margin-right: auto; font-size:28px;">Seller Center</li>
                <li class="user-info">
                    <img src="images/user icon.jpg" alt="User Icon" style="width: 60px; height: 60px;">
                    <span>
                        <?php
                        
                        if (isset($_SESSION['username'])) {
                    
                            echo htmlspecialchars($_SESSION['username']);
                        } else {
                            
                            echo 'Guest';
                        }
                        ?>
                    </span>
                    <ul class="dropdown-menu">
                    <li><a href="logout.php">Logout</a></li> 
                </ul>
                </li>
            </ul>
        </nav>
    </header>



    <!-- Main content -->
    <div class="main-content">
        <!-- Sidebar -->
        <div id="sidebar" class="sidebar">
            <ul>
                <li data-target="my-car"><img src="images/car-sport-outline.svg" alt="My Car Icon"> My Car</li>
                <li data-target="add-car"><img src="images/add car.png" alt="Add Car Icon"> Add my car</li>
            </ul>
        </div>
        <div class="main-content-section">
            <div id="my-car" class="section active">
                <!-- Section Title -->
                <h2 class="section-title">My Car</h2>

  
                <?php if (isset($_SESSION['message'])): ?>
                    <div style="color: green; font-size: 16px; margin: 10px 0;">
                        <?php echo $_SESSION['message']; ?>
                    </div>
                    <?php unset($_SESSION['message']); // Clear the message after displaying it ?>
                <?php endif; ?>


                <div class="car-list">
                    <?php if ($result->num_rows > 0): ?>
                        <?php while ($row = $result->fetch_assoc()): ?>
                            <div class="car-item">
                                <img src="uploads/<?php echo $row['cover_image']; ?>" alt="Car Image">
                                <p><?php echo $row['car_name']; ?></p>
                                <p>Price: RM <?php echo $row['price']; ?></p>
                            </div>
                        <?php endwhile; ?>
                    <?php else: ?>
                        <p>No cars found</p>
                    <?php endif; ?>
                </div>
            </div>

            

            <div id="add-car" class="section">
                <h2 class="section-title">Add My Car</h2>
                <form id="addCarForm" action="My_Car.php" method="POST" enctype="multipart/form-data">
                    <!-- Basic Information Section -->
                
                    <div class="section-box">
                        <h3>Basic Information</h3>
                        <div class="flex-container">
                            <div class="flex-item">
                                <input type="file" accept="image/*" id="coverImage" name="coverImage"
                                    onchange="previewImage(event, 'coverPreview')">
                                <img id="coverPreview" src="images/placeholder.png" alt="Cover Image"
                                    style="display: none;">
                                <p>Add Image (Cover Image)</p>
                            </div>
                            <div class="flex-item">
                                <input type="file" accept="image/*" id="interiorImage" name="interiorImage"
                                    onchange="previewImage(event, 'interiorPreview')">
                                <img id="interiorPreview" src="images/placeholder.png" alt="Interior Image"
                                    style="display: none;">
                                <p>Add Image (Interior)</p>
                            </div>
                            <div class="flex-item">
                                <input type="file" accept="image/*" id="exteriorImage" name="exteriorImage"
                                    onchange="previewImage(event, 'exteriorPreview')">
                                <img id="exteriorPreview" src="images/placeholder.png" alt="Exterior Image"
                                    style="display: none;">
                                <p>Add Image (Exterior)</p>
                            </div>
                            
                        </div>
                        <div class="input-group">
                            <label>Car Name:</label>
                            <input type="text" name="car_name" placeholder="Car Name">
                        </div>
                        <div class="input-group">
                            <label>Location:</label>
                            <input type="text" name="location" placeholder="Location">
                        </div>
                        <div class="input-group">
                            <label>Price:</label>
                            <input type="number" name="price" placeholder="Price">
                        </div>
                        <div class="input-group">
                            <label>Mileage:</label>
                            <input type="number" name="mileage" placeholder="Mileage">
                        </div>
                        <div class="input-group">
                            <label>Years:</label>
                            <input type="number" name="years" placeholder="Years">
                        </div>
                    </div>

                    <!-- Car Details Section -->
                    <div class="section-box">
                        <h3>Car Details</h3>
                        <div class="flex-container">
                            <div class="flex-item">
                                <div class="input-group">
                                    <label>Brand:</label>
                                    <input type="text" name="brand" placeholder="Brand">
                                </div>
                                <div class="input-group">
                                    <label>Model:</label>
                                    <input type="text" name="model" placeholder="Model">
                                </div>
                                <div class="input-group">
                                    <label>Variant:</label>
                                    <input type="text" name="variant" placeholder="Variant">
                                </div>
                                <div class="input-group">
                                    <label>Transmission:</label>
                                    <input type="text" name="transmission" placeholder="Transmission">
                                </div>
                                <div class="input-group">
                                    <label>Type:</label>
                                    <input type="text" name="type" placeholder="Type">
                                </div>
                                <div class="input-group">
                                    <label>Seats:</label>
                                    <input type="number" name="seats" placeholder="Seats">
                                </div>
                            </div>
                            <div class="flex-item">
                                <div class="input-group">
                                    <label>Engine CC:</label>
                                    <input type="text" name="engine_cc" placeholder="Engine CC">
                                </div>
                                <div class="input-group">
                                    <label>Horse Power (PS):</label>
                                    <input type="number" name="horsepower" placeholder="Horse Power (PS)">
                                </div>
                                <div class="input-group">
                                    <label>Peak Torque (NM):</label>
                                    <input type="number" name="peak_torque" placeholder="Peak Torque (NM)">
                                </div>
                                <div class="input-group">
                                    <label>Engine Type:</label>
                                    <input type="text" name="engine_type" placeholder="Engine Type">
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Car Dimensions Section -->
                    <div class="section-box">
                        <h3>Dimension & Weight</h3>
                        <div class="flex-container">
                            <div class="flex-item">
                                <div class="input-group">
                                    <label>Length (mm):</label>
                                    <input type="number" name="length" placeholder="Length (mm)">
                                </div>
                                <div class="input-group">
                                    <label>Width (mm):</label>
                                    <input type="number" name="width" placeholder="Width (mm)">
                                </div>
                                <div class="input-group">
                                    <label>Height (mm):</label>
                                    <input type="number" name="height" placeholder="Height (mm)">
                                </div>
                            </div>
                            <div class="flex-item">
                                <div class="input-group">
                                    <label>Wheel Base (mm):</label>
                                    <input type="number" name="wheel_base" placeholder="Wheel Base (mm)">
                                </div>
                                <div class="input-group">
                                    <label>Kerb Weight (kg):</label>
                                    <input type="number" name="kerb_weight" placeholder="Kerb Weight (kg)">
                                </div>
                                <div class="input-group">
                                    <label>Fuel Tank (litres):</label>
                                    <input type="number" name="fuel_tank" placeholder="Fuel Tank (litres)">
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Description Section -->
                    <div class="section-box">
                        <h3>Description</h3>
                        <textarea name="description" placeholder="Please input at least 20 characters..."></textarea>
                    </div>
            
        <div class="section-box">
                <h3>Car Report Details</h3>
                <div class="input-group">
                    <label for="file-upload-input">Upload Car Report:
                    <div class="file-upload">
                        <div class="upload-box">
                            <div class="upload-text">
                                <p>Drag and Drop the document to upload</p>
                                <input type="file" id="file-upload-input" name="carServiceReport" onchange="previewFile()" hidden>
                            </div>
                        </div>
                    </div>
                    <p>Note: Upload your car service report here to prove your car condition.</p>
                </div>
            </label>
                <!-- Preview for the uploaded file (if necessary) -->
                <div id="file-preview">
                    <p>File uploaded: <span id="file-name"></span></p>
                </div>
        </div>
            <div class="submit-container">
                <button type="submit" id="submitButton">Submit</button>
            </div>
        </form>
        </div>
    </div>
    </div>
    

    <script>
        // JavaScript to handle sidebar clicks and switch content sections
        document.querySelectorAll('.sidebar ul li').forEach(function (item) {
            item.addEventListener('click', function () {

                document.querySelectorAll('.section').forEach(function (section) {
                    section.classList.remove('active');
                    section.style.display = 'none';
                });

               
                var targetSection = item.getAttribute('data-target');


                document.getElementById(targetSection).classList.add('active');
                document.getElementById(targetSection).style.display = 'block'; 
                
            });
        });

       

        function previewFile() {
            const fileInput = document.getElementById('file-upload-input');
            const fileName = fileInput.files[0].name;

            document.getElementById('file-name').textContent = fileName;
            document.getElementById('file-preview').style.display = 'block';
        }

        function previewImage(event, previewId) {
            const file = event.target.files[0]; 
            const reader = new FileReader(); 

            reader.onload = function (e) {
                const img = document.getElementById(previewId); 
                img.src = e.target.result; 
                img.style.display = 'block'; 
            }

            if (file) {
                reader.readAsDataURL(file); 
            }
        }

    </script>
</body>

</html>