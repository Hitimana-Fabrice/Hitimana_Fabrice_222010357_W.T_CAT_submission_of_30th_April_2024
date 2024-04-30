<?php
// Include the database connection file
require_once "db_connection.php";

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if all required fields are filled
    if (isset($_POST["firstName"], $_POST["lastName"], $_POST["dob"]) &&
        !empty($_POST["firstName"]) && !empty($_POST["lastName"]) && !empty($_POST["dob"])) {
        
        // Assign form data to variables
        $firstName = $_POST["firstName"];
        $lastName = $_POST["lastName"];
        $dob = $_POST["dob"];

        // Prepare SQL statement to insert record into the patients table
        $sql = "INSERT INTO patients (Patient_F_Name, Patient_L_Name, Patient_BOB_Date) VALUES (?, ?, ?)";

        // Prepare and bind parameters
        if ($stmt = $conn->prepare($sql)) {
            $stmt->bind_param("sss", $firstName, $lastName, $dob);

            // Execute the statement
            if ($stmt->execute()) {
                echo "Patient data submitted successfully!";
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
