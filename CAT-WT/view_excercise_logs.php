<?php
// Include the database connection file
require_once "db_connection.php";

// Retrieve exercise logs from the database
$sql = "SELECT * FROM exerciselogs"; 
$result = $conn->query($sql);

// Check if the query executed successfully
if ($result === false) {
    echo "Error executing the SQL query: " . $conn->error;
} else {
    // Check if there are any exercise logs
    if ($result->num_rows > 0) {
        // Output data of each row
        echo "<table border='1'>";
        echo "<tr><th>Log ID</th><th>User ID</th><th>Date</th><th>Exercise Type</th><th>Duration (Minutes)</th><th>Calories Burned</th></tr>"; //  table header
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["Log_id"] . "</td>"; // column name
            echo "<td>" . $row["User_id"] . "</td>";
            echo "<td>" . $row["Date"] . "</td>";
            echo "<td>" . $row["ExerciseType"] . "</td>"; // column name
            echo "<td>" . $row["DurationMinutes"] . "</td>"; // column name
            echo "<td>" . $row["CaloriesBurned"] . "</td>"; // column name
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "No exercise logs found.";
    }
}

// Close the database connection
$conn->close();
?>
