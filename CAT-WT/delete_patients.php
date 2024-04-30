<?php
// Include the database connection file
require_once "db_connection.php";

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if patient ID is provided
    if (isset($_POST["patientsId"]) && !empty($_POST["patientsId"])) {
        // Assign patient ID from the form data
        $patientsId = $_POST["patientsId"];

        // Prepare SQL statement to delete record from the patients table
        $sql = "DELETE FROM patients WHERE Patients_ID = ?";

        // Prepare and bind parameter
        if ($stmt = $conn->prepare($sql)) {
            $stmt->bind_param("i", $patientsId);

            // Execute the statement
            if ($stmt->execute()) {
                echo "Patient record deleted successfully!";
            } else {
                echo "Error executing statement: " . $stmt->error;
            }

            // Close statement
            $stmt->close();
        } else {
            echo "Error preparing statement: " . $conn->error;
        }
    } else {
        echo "Patient ID is required!";
    }
} else {
    echo "Form not submitted!";
}

// Close database connection
$conn->close();
?>
