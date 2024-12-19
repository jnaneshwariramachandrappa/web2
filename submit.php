<?php
// Database connection details
$servername = "localhost";
$username = "root";
$password = ""; // Use your MySQL password
$dbname = "education_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $courses = implode(", ", $_POST['courses']);
    $payment = htmlspecialchars($_POST['payment']);

    // Validate required fields
    if (!empty($name) && !empty($email) && !empty($courses) && !empty($payment)) {
        // Insert data into the database
        $sql = "INSERT INTO registrations (name, email, courses, payment) VALUES ('$name', '$email', '$courses', '$payment')";

        if ($conn->query($sql) === TRUE) {
            echo "<h1>Registration Successful</h1>";
            echo "<p>Name: $name</p>";
            echo "<p>Email: $email</p>";
            echo "<p>Selected Courses: $courses</p>";
            echo "<p>Payment: $payment</p>";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "<h1>Registration Failed</h1>";
        echo "<p>Please fill in all fields.</p>";
    }
} else {
    echo "<h1>Invalid Request</h1>";
}

// Close connection
$conn->close();
?>