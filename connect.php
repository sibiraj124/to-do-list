<?php
session_start();
$conn = new mysqli("localhost", "root", "", "to-do-list-application");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username']; 
    $email = $_POST['email'];
    $password = $_POST['psw'];
    $repeat_password = $_POST['psw-repeat'];

    
    if ($password !== $repeat_password) {
        echo "Passwords do not match. <a href='register.html'>Try again</a>";
        exit();
    }

    
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Insert data into MySQL
    $sql = "INSERT INTO users (username, email, password) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $username, $email, $hashed_password); // Fixed parameter count

    if ($stmt->execute()) {
        echo "Registration successful. <a href='login.html'>Login here</a>";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>
