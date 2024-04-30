<?php
include('db_connection.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $username = $conn->real_escape_string($_POST["username"]);
    $password = $conn->real_escape_string($_POST["password"]);

    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $email = $conn->real_escape_string($_POST["email"]);
    
    $age = $conn->real_escape_string($_POST["age"]);
   
    $gender = $conn->real_escape_string($_POST["gender"]);
    $contactNumber = $conn->real_escape_string($_POST["contactNumber"]);
    $address = $conn->real_escape_string($_POST["address"]);
    

    $sql = "INSERT INTO users (Username, Password, Email, Age, Gender, ContactNumber, Address)
            VALUES ('$username', '$hashed_password','$email', '$age', '$gender', '$contactNumber', '$address')";

    if ($conn->query($sql) === TRUE) {
        
        echo"<script>alert('Registration successful!')</script>";
         header("location:login.php");

    } else {
        
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
