<?php
// Include the database connection file
require_once "db_connection.php";

// Retrieve appointments from the database
$sql = "SELECT * FROM appointment";
$result = $conn->query($sql);

// Check if there are any appointments
if ($result->num_rows > 0) {
    // Output data of each row
    echo "<table border='1'>";
    echo "<tr><th>Appointment ID</th><th>User ID</th><th>Doctor Name</th><th>Appointment Date</th><th>Appointment Time</th><th>Purpose</th></tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["Appointment_id"] . "</td>";
        echo "<td>" . $row["User_id"] . "</td>";
        echo "<td>" . $row["Doctor_name"] . "</td>";
        echo "<td>" . $row["Appointment_date"] . "</td>";
        echo "<td>" . $row["Appointment_time"] . "</td>";
        echo "<td>" . $row["Purpose"] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "No appointments found.";
}

// Close the database connection
$conn->close();
?>
