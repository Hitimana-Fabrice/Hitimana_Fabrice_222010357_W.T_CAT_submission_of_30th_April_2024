<?php
// Include the database connection file
require_once "db_connection.php";

// Retrieve patients from the database
$sql = "SELECT * FROM patients"; // Modify the table name
$result = $conn->query($sql);

// Check if the query executed successfully
if ($result === false) {
    echo "Error executing the SQL query: " . $conn->error;
} else {
    // Check if there are any patients
    if ($result->num_rows > 0) {
        // Output data of each row
        echo "<table border='1'>";
        echo "<tr><th>Patients ID</th><th>Patient First Name</th><th>Patient Last Name</th><th>Patient DOB</th></tr>"; // Modify the table header
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["Patients_ID"] . "</td>"; // Modify the column name
            echo "<td>" . $row["Patient_F_Name"] . "</td>"; // Modify the column name
            echo "<td>" . $row["Patient_l_Name"] . "</td>"; // Modify the column name
            echo "<td>" . $row["Patient_BOB_Date"] . "</td>"; // Modify the column name
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "No patients found.";
    }
}

// Close the database connection
$conn->close();
?>
