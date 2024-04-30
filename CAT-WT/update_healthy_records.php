<?php
// Include the database connection file
require_once "db_connection.php";

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if all required fields are filled
    if (isset($_POST["recordIdUpdate"], $_POST["dateUpdate"], $_POST["heightUpdate"], $_POST["weightUpdate"]) &&
        !empty($_POST["recordIdUpdate"]) && !empty($_POST["dateUpdate"]) && !empty($_POST["heightUpdate"]) && !empty($_POST["weightUpdate"])) {
        
        // Assign form data to variables
        $recordId = $_POST["recordIdUpdate"];
        $date = $_POST["dateUpdate"];
        $height = $_POST["heightUpdate"];
        $weight = $_POST["weightUpdate"];

        // Prepare SQL statement to update specified columns in the healthy_records table
        $sql = "UPDATE healthyrecords SET Date = ?, Height = ?, Weight = ? WHERE RecordID = ?";

        // Prepare and bind parameters
        if ($stmt = $conn->prepare($sql)) {
            $stmt->bind_param("siii", $date, $height, $weight, $recordId);

            // Execute the statement
            if ($stmt->execute()) {
                echo "Healthy record updated successfully!";
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
