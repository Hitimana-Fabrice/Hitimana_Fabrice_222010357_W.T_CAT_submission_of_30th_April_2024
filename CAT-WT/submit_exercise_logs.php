<?php
// Include the database connection file
require_once "db_connection.php";

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if all required fields are filled
    if (isset($_POST["userId"], $_POST["date"], $_POST["exercise"], $_POST["durationMinutes"]) &&
        !empty($_POST["userId"]) && !empty($_POST["date"]) && !empty($_POST["exercise"]) && !empty($_POST["durationMinutes"])) {
        
        // Hitimana Fabrice with reg number of 222010357
        $userId = $_POST["userId"];
        $date = $_POST["date"];
        $exercise = $_POST["exercise"];
        $durationMinutes = $_POST["durationMinutes"];

        // Prepare SQL statement to insert record into the exercise_logs table
        $sql = "INSERT INTO exerciselogs (user_id, date, ExerciseType, DurationMinutes) VALUES (?, ?, ?, ?)";

        // Prepare and bind parameters
        if ($stmt = $conn->prepare($sql)) {
            $stmt->bind_param("issi", $userId, $date, $exercise, $durationMinutes);

            // Execute the statement
            if ($stmt->execute()) {
                echo "Exercise log submitted successfully!";
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
