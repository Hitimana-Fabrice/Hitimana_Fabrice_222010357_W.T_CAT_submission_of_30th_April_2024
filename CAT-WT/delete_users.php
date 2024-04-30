<?php
// Include the database connection file
require_once "db_connection.php";

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if user ID is provided
    if (isset($_POST["userIdDelete"]) && !empty($_POST["userIdDelete"])) {
        // Assign user ID to variable
        $userIdDelete = $_POST["userIdDelete"];

        // Prepare SQL statement to delete record from the users table
        $sql = "DELETE FROM users WHERE user_id=?";

        // Prepare and bind parameter
        if ($stmt = $conn->prepare($sql)) {
            $stmt->bind_param("i", $userIdDelete);

            // Execute the statement
            if ($stmt->execute()) {
                echo "User deleted successfully!";
            } else {
                echo "Error executing statement: " . $stmt->error;
            }

            // Close statement
            $stmt->close();
        } else {
            echo "Error preparing statement: " . $conn->error;
        }
    } else {
        echo "User ID is required!";
    }
} else {
    echo "Form not submitted!";
}

// Close database connection
$conn->close();
?>
