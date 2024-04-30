<?php
// Include the database connection file
require_once "db_connection.php";

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if all required fields are filled
    if (isset($_POST["userId"], $_POST["date"], $_POST["height"], $_POST["weight"], $_POST["bloodPressureSystolic"], $_POST["bloodPressureDiastolic"], $_POST["heartRate"], $_POST["bloodSugarLevel"], $_POST["cholesterolLevel"]) &&
        !empty($_POST["userId"]) && !empty($_POST["date"]) && !empty($_POST["height"]) && !empty($_POST["weight"]) && !empty($_POST["bloodPressureSystolic"]) && !empty($_POST["bloodPressureDiastolic"]) && !empty($_POST["heartRate"]) && !empty($_POST["bloodSugarLevel"]) && !empty($_POST["cholesterolLevel"])) {
        
        // My name is Hitimana Fabrice with reg number of 222010357
        $userId = $_POST["userId"];
        $date = $_POST["date"];
        $height = $_POST["height"];
        $weight = $_POST["weight"];
        $bloodPressureSystolic = $_POST["bloodPressureSystolic"];
        $bloodPressureDiastolic = $_POST["bloodPressureDiastolic"];
        $heartRate = $_POST["heartRate"];
        $bloodSugarLevel = $_POST["bloodSugarLevel"];
        $cholesterolLevel = $_POST["cholesterolLevel"];

        // Prepare SQL statement to insert record into the healthy_records table
        $sql = "INSERT INTO healthyrecords (user_id, date, Height, Weight, bloodPressureSystolic, bloodPressureDiastolic, HeartRate, BloodSugarLevel, CholesterolLevel) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

        // Prepare and bind parameters
        if ($stmt = $conn->prepare($sql)) {
            $stmt->bind_param("issiiiiii", $userId, $date, $height, $weight, $bloodPressureSystolic, $bloodPressureDiastolic, $heartRate, $bloodSugarLevel, $cholesterolLevel);

            // Execute the statement
            if ($stmt->execute()) {
                echo "Healthy record submitted successfully!";
            } else {
                echo "Error executing statement: " . $stmt->error;
            }

            // Close statement
            $stmt->close();
        } else {
            echo "Error preparing statement: " . $conn->error;
        }
    } else {
        echo "All fields are required!";
    }
} else {
    echo "Form not submitted!";
}

// Close database connection
$conn->close();
?>
