<?php
// Include the database connection file
require_once "db_connection.php";

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $appointmentIdUpdate = $_POST["appointmentIdUpdate"];
    $doctorNameUpdate = $_POST["doctorNameUpdate"];
    $appointmentTimeUpdate = $_POST["appointmentTimeUpdate"];
    $purposeUpdate = $_POST["purposeUpdate"];

    // Prepare SQL statement to update data in the appointment table
    $sql = "UPDATE appointment 
            SET doctor_name = ?, appointment_time = ?, purpose = ? 
            WHERE appointment_id = ?";

    // Prepare and bind parameters
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("sssi", $doctorNameUpdate, $appointmentTimeUpdate, $purposeUpdate, $appointmentIdUpdate);

        // Execute the statement
        if ($stmt->execute()) {
            // Check if any rows were affected
            if ($stmt->affected_rows > 0) {
                echo "Appointment updated successfully!";
            } else {
                echo "No records updated. Please check the Appointment ID.";
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
    echo "Form not submitted!";
}

// Close database connection
$conn->close();
?>
