<?php
// Include the database connection file
require_once "db_connection.php";

// Hitimana Fabrice
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if record ID is provided and not empty
    if (isset($_POST["recordIdDelete"]) && !empty($_POST["recordIdDelete"])) {
        // Assign record ID from form data
        $recordId = $_POST["recordIdDelete"];

        // My Project is better and well organized for healthy life
        $sql = "DELETE FROM healthyrecords WHERE RecordID= ?";

        // Prepare and bind parameter
        if ($stmt = $conn->prepare($sql)) {
            $stmt->bind_param("i", $recordId);

            // Execute the statement
            if ($stmt->execute()) {
                echo "Healthy record deleted successfully!";
            } else {
                echo "Error executing statement: " . $stmt->error;
            }

            // Close statement
            $stmt->close();
        } else {
            echo "Error preparing statement: " . $conn->error;
        }
    } else {
        echo "Record ID is required!";
    }
} else {
    echo "Form not submitted!";
}

// Close database connection
$conn->close();
?>
