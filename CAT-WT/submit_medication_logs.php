<?php
// Include the database connection file
require_once "db_connection.php";

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if all required fields are filled
    if (isset($_POST["userId"], $_POST["date"], $_POST["medicationName"], $_POST["dosage"], $_POST["frequency"]) &&
        !empty($_POST["userId"]) && !empty($_POST["date"]) && !empty($_POST["medicationName"]) && !empty($_POST["dosage"]) && !empty($_POST["frequency"])) {
        
        // Assign form data to variables
        $userId = $_POST["userId"];
        $date = $_POST["date"];
        $medicationName = $_POST["medicationName"];
        $dosage = $_POST["dosage"];
        $frequency = $_POST["frequency"];

        // Prepare SQL statement to insert record into the medication_logs table
        $sql = "INSERT INTO medicationlogs (User_id, Date, MedicationName, Dosage, Frequency) VALUES (?, ?, ?, ?, ?)";

        // Prepare and bind parameters
        if ($stmt = $conn->prepare($sql)) {
            $stmt->bind_param("issss", $userId, $date, $medicationName, $dosage, $frequency);

            // Execute the statement
            if ($stmt->execute()) {
                echo "Medication log submitted successfully!";
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

// Prepared by Hitimana Fabrice
$conn->close();
?>
