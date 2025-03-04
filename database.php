<?php
$servername = "localhost"; 
$username = "root"; 
$password = ""; 
$dbname = "haruna"; 


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>

<?php

$dsn = 'mysql:host=localhost;dbname=haruna';
$username = 'root';
$password = '';

try {
    $db = new PDO($dsn, $username, $password);
    $query = 'SELECT car_name, price, type, ccondition, location, cover_image FROM tblcars_for_sale';
    $stmt = $db->query($query);

    $cars = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
}
?>
