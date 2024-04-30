<?php
// Include the database connection file
require_once "db_connection.php";

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $userId = $_POST["userId"];
    $doctorName = $_POST["doctorName"];
    $appointmentDate = $_POST["appointmentDate"];
    $appointmentTime = $_POST["appointmentTime"];
    $purpose = $_POST["purpose"];

    // Prepare SQL statement to insert data into the appointment table
    $sql = "INSERT INTO appointment (user_id, doctor_name, appointment_date, appointment_time, purpose) 
            VALUES (?, ?, ?, ?, ?)";

    // Prepare and bind parameters
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("issss", $userId, $doctorName, $appointmentDate, $appointmentTime, $purpose);

        // Execute the statement
        if ($stmt->execute()) {
            echo "Appointment submitted successfully!";
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
