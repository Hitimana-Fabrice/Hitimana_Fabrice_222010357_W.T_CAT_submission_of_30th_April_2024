<?php
// Include the database connection file
require_once "db_connection.php";

// Retrieve diet logs from the database
$sql = "SELECT * FROM dietlog";
$result = $conn->query($sql);

// Check if there are any diet logs
if ($result->num_rows > 0) {
    // Output data of each row
    echo "<table border='1'>";
    echo "<tr><th>Log ID</th><th>User ID</th><th>Date</th><th>Meal Type</th><th>Food Item</th><th>Quantity</th><th>Calories Consumed</th></tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["LogID"] . "</td>";
        echo "<td>" . $row["User_id"] . "</td>";
        echo "<td>" . $row["Date"] . "</td>";
        echo "<td>" . $row["MealType"] . "</td>";
        echo "<td>" . $row["FoodItem"] . "</td>";
        echo "<td>" . $row["Quantity"] . "</td>";
        echo "<td>" . $row["CaloriesConsumed"] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "No diet logs found.";
}

// Close the database connection
$conn->close();
?>
