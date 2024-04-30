<?php
// Include the database connection file
require_once "db_connection.php";

// Retrieve medication logs from the database
$sql = "SELECT * FROM medicationlogs"; // Modify the table name
$result = $conn->query($sql);

// Check if the query executed successfully
if ($result === false) {
    echo "Error executing the SQL query: " . $conn->error;
} else {
    // Check if there are any medication logs
    if ($result->num_rows > 0) {
        // Output data of each row
        echo "<table border='1'>";
        echo "<tr><th>Medical ID</th><th>User ID</th><th>Date</th><th>Medication Name</th><th>Dosage</th><th>Frequency</th></tr>"; // Modify the table header
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["Medical_id"] . "</td>"; // Modify the column name
            echo "<td>" . $row["User_id"] . "</td>";
            echo "<td>" . $row["Date"] . "</td>";
            echo "<td>" . $row["MedicationName"] . "</td>"; // Modify the column name
            echo "<td>" . $row["Dosage"] . "</td>"; // Modify the column name
            echo "<td>" . $row["Frequency"] . "</td>"; // Modify the column name
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "No medication logs found.";
    }
}

// Close the database connection
$conn->close();
?>
