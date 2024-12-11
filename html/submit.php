<?php
// Database connection settings
$host = "localhost";
$username = "root";
$password = ""; // Default password for XAMPP
$database = "harvey_db"; // Replace with your database name

// Create connection
$conn = new mysqli($host, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form data exists
if (isset($_POST['name'], $_POST['contact'], $_POST['purpose'])) {
    // Sanitize and retrieve form data
    $name = $conn->real_escape_string($_POST['name']);
    $contact = $conn->real_escape_string($_POST['contact']);
    $purpose = $conn->real_escape_string($_POST['purpose']);

    // Prepare and execute SQL query
    $sql = "INSERT INTO inquiries (name, contact, purpose) VALUES ('$name', '$contact', '$purpose')";

    if ($conn->query($sql) === TRUE) {
        echo "Form submitted successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    echo "Required form data not received.";
}

// Close connection
$conn->close();
?>
