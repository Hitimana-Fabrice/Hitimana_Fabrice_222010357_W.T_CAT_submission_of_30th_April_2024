<?php
// Include the database connection file
require_once "db_connection.php";

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if all required fields are filled
    if (isset($_POST["medicalIdUpdate"], $_POST["dateUpdate"], $_POST["medicationNameUpdate"], $_POST["dosageUpdate"], $_POST["frequencyUpdate"]) &&
        !empty($_POST["medicalIdUpdate"]) && !empty($_POST["dateUpdate"]) && !empty($_POST["medicationNameUpdate"]) && !empty($_POST["dosageUpdate"]) && !empty($_POST["frequencyUpdate"])) {
        
        // Assign form data to variables
        $medicalId = $_POST["medicalIdUpdate"];
        $date = $_POST["dateUpdate"];
        $medicationName = $_POST["medicationNameUpdate"];
        $dosage = $_POST["dosageUpdate"];
        $frequency = $_POST["frequencyUpdate"];

        // Prepare SQL statement to update record in the medication_logs table
        $sql = "UPDATE medicationlogs SET Date = ?, MedicationName = ?, Dosage = ?, Frequency = ? WHERE Medical_id = ?";

        // Prepare and bind parameters
        if ($stmt = $conn->prepare($sql)) {
            $stmt->bind_param("sssii", $date, $medicationName, $dosage, $frequency, $medicalId);

            // Execute the statement
            if ($stmt->execute()) {
                echo "Medication log updated successfully!";
            } else {
                echo "Error executing statement: " . $stmt->error;
            }

            // Prepared and Designed By Hitimana Fabrice
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
