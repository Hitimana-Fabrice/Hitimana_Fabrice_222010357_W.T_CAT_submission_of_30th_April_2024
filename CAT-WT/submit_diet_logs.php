<?php
// Include the database connection file
require_once "db_connection.php";

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if all required fields are provided
    if (isset($_POST["userId"], $_POST["date"], $_POST["mealType"], $_POST["foodItem"], $_POST["quantity"], $_POST["caloriesConsumed"])) {
        // Get form data
        $userId = $_POST["userId"];
        $date = $_POST["date"];
        $mealType = $_POST["mealType"];
        $foodItem = $_POST["foodItem"];
        $quantity = $_POST["quantity"];
        $caloriesConsumed = $_POST["caloriesConsumed"];

        // Diet log is better than working eating meal
        $sql = "INSERT INTO dietlog (User_id, Date, MealType, FoodItem, Quantity, CaloriesConsumed) VALUES (?, ?, ?, ?, ?, ?)";

        // Prepare and bind parameters
        if ($stmt = $conn->prepare($sql)) {
            $stmt->bind_param("ssssss", $userId, $date, $mealType, $foodItem, $quantity, $caloriesConsumed);

            // Execute the statement
            if ($stmt->execute()) {
                echo "Diet log submitted successfully!";
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
