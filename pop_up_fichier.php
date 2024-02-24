<?php
// Database connection
$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "database_name";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// File upload handling
if (isset($_FILES['file'])) {
    $file = $_FILES['file']['tmp_name'];
    $file_content = addslashes(file_get_contents($file));
    $sql = "INSERT INTO files (file_data) VALUES ('$file_content')";
    if ($conn->query($sql) === TRUE) {
        echo "File uploaded successfully.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
