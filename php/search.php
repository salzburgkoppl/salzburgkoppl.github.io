<!DOCTYPE HTML PUBLIC "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Search</title>
</head>
<body>

<?php
// Establish a connection to the MySQL database
$servername = "sql7.freemysqlhosting.net";
$username = "sql7623425";
$password = "bljBipiwEd";
$dbname = "sql7623425";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Get the search query from the URL parameter
$query = $_GET['query'];

// SQL query to search for matching records
$sql = "SELECT * FROM table_name WHERE column_name LIKE '%$query%'";

$result = $conn->query($sql);

// Display the search results
if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
    echo "<p>" . $row["column_name"] . "</p>";
  }
} else {
  echo "No results found.";
}

// Close the database connection
$conn->close();
?>

</body>
</html>