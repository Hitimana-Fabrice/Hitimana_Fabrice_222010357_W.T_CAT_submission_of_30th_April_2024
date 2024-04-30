<?php
// Include the database connection file
require_once "db_connection.php";

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if all required fields are filled
    if (isset($_POST["logIdUpdate"], $_POST["dateUpdate"], $_POST["exerciseUpdate"], $_POST["durationMinutesUpdate"]) &&
        !empty($_POST["logIdUpdate"]) && !empty($_POST["dateUpdate"]) && !empty($_POST["exerciseUpdate"]) && !empty($_POST["durationMinutesUpdate"])) {
        
        // Assign form data to variables
        $logIdUpdate = $_POST["logIdUpdate"];
        $dateUpdate = $_POST["dateUpdate"];
        $exerciseUpdate = $_POST["exerciseUpdate"];
        $durationMinutesUpdate = $_POST["durationMinutesUpdate"];

        // Prepare SQL statement to update record in the exercise_logs table
        $sql = "UPDATE exerciselogs SET date = ?, ExerciseType = ?, DurationMinutes = ? WHERE log_id = ?";

        // Prepare and bind parameters
        if ($stmt = $conn->prepare($sql)) {
            $stmt->bind_param("ssii", $dateUpdate, $exerciseUpdate, $durationMinutesUpdate, $logIdUpdate);

            // Execute the statement
            if ($stmt->execute()) {
                echo "Exercise log updated successfully!";
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
