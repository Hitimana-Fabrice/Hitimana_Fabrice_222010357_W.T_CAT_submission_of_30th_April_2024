<?php
// Include the database connection file
require_once "db_connection.php";

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if Appointment ID is provided
    if (isset($_POST["appointmentIdDelete"]) && !empty($_POST["appointmentIdDelete"])) {
        // Get Appointment ID from form
        $appointmentIdDelete = $_POST["appointmentIdDelete"];

        // Prepare SQL statement to delete record from the appointment table
        $sql = "DELETE FROM appointment WHERE appointment_id = ?";

        // Prepare and bind parameters
        if ($stmt = $conn->prepare($sql)) {
            $stmt->bind_param("i", $appointmentIdDelete);

            // Execute the statement
            if ($stmt->execute()) {
                // Check if any rows were affected
                if ($stmt->affected_rows > 0) {
                    echo "Appointment deleted successfully!";
                } else {
                    echo "No records deleted. Please check the Appointment ID.";
                }
            } else {
                echo "Error executing statement: " . $stmt->error;
            }

            // Close statement
            $stmt->close();
        } else {
            echo "Error preparing statement: " . $conn->error;
        }
    } else {
        echo "Appointment ID is required!";
    }
} else {
    echo "Form not submitted!";
}

// Close database connection
$conn->close();
?>
