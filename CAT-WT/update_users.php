<?php
// Include the database connection file
require_once "db_connection.php";

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if all required fields are filled
    if (isset($_POST["userIdUpdate"], $_POST["passwordUpdate"], $_POST["emailUpdate"], $_POST["nameUpdate"], $_POST["ageUpdate"], $_POST["genderUpdate"], $_POST["contactNumberUpdate"], $_POST["addressUpdate"]) &&
        !empty($_POST["userIdUpdate"]) && !empty($_POST["passwordUpdate"]) && !empty($_POST["emailUpdate"]) && !empty($_POST["nameUpdate"]) && !empty($_POST["ageUpdate"]) && !empty($_POST["genderUpdate"]) && !empty($_POST["contactNumberUpdate"]) && !empty($_POST["addressUpdate"])) {
        
        // Assign form data to variables
        $userIdUpdate = $_POST["userIdUpdate"];
        $passwordUpdate = $_POST["passwordUpdate"];
        $emailUpdate = $_POST["emailUpdate"];
        $nameUpdate = $_POST["nameUpdate"];
        $ageUpdate = $_POST["ageUpdate"];
        $genderUpdate = $_POST["genderUpdate"];
        $contactNumberUpdate = $_POST["contactNumberUpdate"];
        $addressUpdate = $_POST["addressUpdate"];

        // Prepare SQL statement to update record in the users table
        $sql = "UPDATE users SET Password=?, Email=?, Name=?, Age=?, Gender=?, ContactNumber=?, Address=? WHERE User_id=?";

        // Prepare and bind parameters
        if ($stmt = $conn->prepare($sql)) {
            $stmt->bind_param("sssisssi", $passwordUpdate, $emailUpdate, $nameUpdate, $ageUpdate, $genderUpdate, $contactNumberUpdate, $addressUpdate, $userIdUpdate);

            // Execute the statement
            if ($stmt->execute()) {
                echo "User data updated successfully!";
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
