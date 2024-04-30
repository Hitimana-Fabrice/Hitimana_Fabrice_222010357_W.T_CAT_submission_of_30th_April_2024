<?php
// Include the database connection file
require_once "db_connection.php";

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if medical ID is provided
    if (isset($_POST["medicalIdDelete"]) && !empty($_POST["medicalIdDelete"])) {
        // Sanitize the medical ID input
        $medicalId = filter_var($_POST["medicalIdDelete"], FILTER_SANITIZE_NUMBER_INT);

        // Prepare SQL statement to delete record from the medication_logs table
        $sql = "DELETE FROM medicationlogs WHERE Medical_id = ?";

        // Prepare and bind parameter
        if ($stmt = $conn->prepare($sql)) {
            $stmt->bind_param("i", $medicalId);

            // Execute the statement
            if ($stmt->execute()) {
                echo "Medication log deleted successfully!";
            } else {
                echo "Error executing statement: " . $stmt->error;
            }

            // Close statement
            $stmt->close();
        } else {
            echo "Error preparing statement: " . $conn->error;
        }
    } else {
        echo "Medical ID is required!";
    }
} else {
    echo "Form not submitted!";
}

// Close database connection
$conn->close();
?>
