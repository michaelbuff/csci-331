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
$user = $_GET['username'];
$name = $_GET['name'];
$choice = $_GET['choice'];
$country = $_GET['country'];


echo "<p><strong>$user</strong> $choice met <strong>$name</strong> from $country</p>";


// DATABASE OPERATIONS:
// https://www.w3schools.com/php/php_mysql_insert.asp
$servername = "localhost";
$username = "user06";
$password = "06poco";
$dbname = "db06";
$tablename = "meetings";

// Create connection (assuming these exist -- we set up the DB on the CLI)
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// SQL OPPERATIONS
$sql = "INSERT INTO meetings VALUES ('$user','$choice','$name','$country')";

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

echo "<h1>Here is who other students have met   </h1>";

// Select students that have a GPA equal to or above 2.0
$sql = "SELECT * FROM meetings";

// Issue the query
$statement = $conn->query($sql);

// Loop through all the rows returned by the query
foreach ($statement as $row) {
   echo "<p>".$row['username']." " .$row['choice']." met ".$row['name']." from ".$row['country'].".</p>";
}



$conn->close();

?>

    <br><br>
    <button onclick="history.back()">Back</button>

</body>
</html>
