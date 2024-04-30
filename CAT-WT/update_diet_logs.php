<?php
// Include the database connection file
require_once "db_connection.php";

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if Log ID, Meal Type, Quantity, and Calories Consumed are provided
    if (isset($_POST["logIdUpdate"], $_POST["mealTypeUpdate"], $_POST["quantityUpdate"], $_POST["caloriesConsumedUpdate"]) 
        && !empty($_POST["logIdUpdate"]) && !empty($_POST["mealTypeUpdate"]) && !empty($_POST["quantityUpdate"]) && !empty($_POST["caloriesConsumedUpdate"])) {
        
        // Get data from the form
        $logIdUpdate = $_POST["logIdUpdate"];
        $mealTypeUpdate = $_POST["mealTypeUpdate"];
        $quantityUpdate = $_POST["quantityUpdate"];
        $caloriesConsumedUpdate = $_POST["caloriesConsumedUpdate"];

        // Prepare SQL statement to update record in the dietlog table
        $sql = "UPDATE dietlog SET MealType = ?, Quantity = ?, CaloriesConsumed = ? WHERE LogID = ?";

        // Prepare and bind parameters
        if ($stmt = $conn->prepare($sql)) {
            $stmt->bind_param("sidi", $mealTypeUpdate, $quantityUpdate, $caloriesConsumedUpdate, $logIdUpdate);

            // Execute the statement
            if ($stmt->execute()) {
                // Check if any rows were affected
                if ($stmt->affected_rows > 0) {
                    echo "Diet log updated successfully!";
                } else {
                    echo "No records updated. Please check the Log ID.";
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
        echo "Log ID, Meal Type, Quantity, and Calories Consumed are required!";
    }
} else {
    echo "Form not submitted!";
}

// Close database connection
$conn->close();
?>
