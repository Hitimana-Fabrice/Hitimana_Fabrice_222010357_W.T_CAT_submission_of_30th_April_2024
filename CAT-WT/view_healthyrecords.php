<?php
// Include the database connection file
require_once "db_connection.php";

// Retrieve healthy records from the database
$sql = "SELECT * FROM healthyrecords"; 
$result = $conn->query($sql);

// Check if the query executed successfully
if ($result === false) {
    echo "Error executing the SQL query: " . $conn->error;
} else {
    // Check if there are any healthy records
    if ($result->num_rows > 0) {
        // Output data of each row
        echo "<table border='1'>";
        echo "<tr><th>Record ID</th><th>User ID</th><th>Date</th><th>Height</th><th>Weight</th><th>Blood Pressure (Systolic)</th><th>Blood Pressure (Diastolic)</th><th>Heart Rate</th><th>Blood Sugar Level</th><th>Cholesterol Level</th></tr>"; //  table header
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["RecordID"] . "</td>"; // column name
            echo "<td>" . $row["User_id"] . "</td>";
            echo "<td>" . $row["Date"] . "</td>";
            echo "<td>" . $row["Height"] . "</td>"; // column name
            echo "<td>" . $row["Weight"] . "</td>"; // column name
            echo "<td>" . $row["BloodPressureSystolic"] . "</td>"; // column name
            echo "<td>" . $row["BloodPressureDiastolic"] . "</td>"; // column name
            echo "<td>" . $row["HeartRate"] . "</td>"; // column name
            echo "<td>" . $row["BloodSugarLevel"] . "</td>"; // column name
            echo "<td>" . $row["CholesterolLevel"] . "</td>"; // column name
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "No healthy records found.";
    }
}

// Close the database connection
$conn->close();
?>
