<?php
// Include the database connection file
require_once "db_connection.php";

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if all required fields are filled
    if (isset($_POST["patientsId"], $_POST["firstName"], $_POST["lastName"]) &&
        !empty($_POST["patientsId"]) && !empty($_POST["firstName"]) && 
        !empty($_POST["lastName"])) {
        
        // Assign form data to variables
        $patientsId = $_POST["patientsId"];
        $firstName = $_POST["firstName"];
        $lastName = $_POST["lastName"];

        // Prepare SQL statement to update record in the patients table
        $sql = "UPDATE patients SET Patient_F_Name = ?, Patient_L_Name = ? WHERE Patients_ID = ?";

        // Prepare and bind parameters
        if ($stmt = $conn->prepare($sql)) {
            $stmt->bind_param("ssi", $firstName, $lastName, $patientsId);

            // Execute the statement
            if ($stmt->execute()) {
                echo "Patient data updated successfully!";
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
