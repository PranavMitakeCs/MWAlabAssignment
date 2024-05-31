<?php
// Database connection parameters
$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "database_name";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SQL query to add a column for "age" to the "users" table
$sql = "ALTER TABLE users ADD COLUMN age INT";

// Execute the query to add the column
if ($conn->query($sql) === TRUE) {
    echo "Column 'age' added successfully<br>";
} else {
    echo "Error adding column: " . $conn->error . "<br>";
}

// Define the minimum age to retrieve users
$minAge = 18;

// SQL query to retrieve users above a certain age
$sql = "SELECT * FROM users WHERE age > $minAge";

// Execute the query to retrieve users
$result = $conn->query($sql);

// Display the results
if ($result->num_rows > 0) {
    echo "<h2>Users above $minAge years old:</h2>";
    echo "<ul>";
    while($row = $result->fetch_assoc()) {
        echo "<li>User ID: " . $row["id"] . ", Name: " . $row["name"] . ", Age: " . $row["age"] . "</li>";
    }
    echo "</ul>";
} else {
    echo "No users above $minAge years old found";
}

// Close connection
$conn->close();
?>
