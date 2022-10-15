<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vote History</title>
</head>
<body>
    <h1>Thanks!</h1>

<!-- 
    NOTE: this is our backend (server side) code. 
    1. User cannot see this code -- unlike HTML/CSS/JavaScript
    2. This is how we will do database opperations (DB is also on server)
-->    

<?php
// DYNAMIC HTML
$name = $_GET['name'];
$headline = $_GET['headline'];
$choice = $_GET['choice'];

echo "<p><strong>$name</strong> thinks <strong>$headline</strong> is <strong>$choice</strong> for the economy</p>";


// DATABASE OPERATIONS:
// https://www.w3schools.com/php/php_mysql_insert.asp
$servername = "localhost";
$username = "user06";
$password = "06poco";
$dbname = "db06";
$tablename = "votes";

// Create connection (assuming these exist -- we set up the DB on the CLI)
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// SQL OPPERATIONS
$sql = "INSERT INTO votes VALUES ('$name','$headline','$choice')";

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

echo "<h1>Here is how the other students voted</h1>";

// Select students that have a GPA equal to or above 2.0
$sql = "SELECT * FROM votes";

// Issue the query
$statement = $conn->query($sql);

// Loop through all the rows returned by the query
foreach ($statement as $row) {
   echo "<p> $row[name] thinks $row[headline] is $row[choice] for the economy</p>";
}



$conn->close();

?>

    <br><br>
    <button onclick="history.back()">Back</button>

</body>
</html>
