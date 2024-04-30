<?php
// Include the database connection file
require_once "db_connection.php";

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if Log ID is provided
    if (isset($_POST["logIdDelete"]) && !empty($_POST["logIdDelete"])) {
        // Get Log ID from form
        $logIdDelete = $_POST["logIdDelete"];

        // Prepare SQL statement to delete record from the dietlog table
        $sql = "DELETE FROM dietlog WHERE LogID = ?";

        // Prepare and bind parameters
        if ($stmt = $conn->prepare($sql)) {
            $stmt->bind_param("i", $logIdDelete);

            // Execute the statement
            if ($stmt->execute()) {
                // Check if any rows were affected
                if ($stmt->affected_rows > 0) {
                    echo "Diet log deleted successfully!";
                } else {
                    echo "No records deleted. Please check the Log ID.";
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
        echo "Log ID is required!";
    }
} else {
    echo "Form not submitted!";
}

// Close database connection
$conn->close();
?>
