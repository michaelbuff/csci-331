<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" 
      rel="stylesheet" 
      integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" 
      crossorigin="anonymous">
    
    <title>Vote History</title>
</head>
<body>

<?php
//GET USER OUTPUTS
$user = $_GET['username'];
$name = $_GET['name'];
$choice = $_GET['choice'];
$imageUrl = $_GET['imageUrl'];
$country = $_GET['country'];

//ESTABLISH DB CONNECTION
$servername = "localhost";
$username = "user06";
$password = "06poco";
$dbname = "db06";
$tablename = "meetings";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  die("<h1 class:'display-1'>Connection failed: " . $conn->connect_error."</h1>");
  }

$sql = "INSERT INTO meetings VALUES ('$user','$choice','$name','$country')";
if ($conn->query($sql) === FALSE) {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
?>

<!-- HEADER -->
<div class="container">
  <header> 
    <div class="card" style="width: 18rem;">
      <img src="<?php echo $imageUrl ?>" class="card-img-top" alt="picture of <?php echo $name ?>">
      <div class="card-body">
        <h5 class="card-title">Congrats!</h5>
        <p class="card-text">You met <?php echo $name ?> from <?php echo $country?></p>
        <button type="button" class="btn btn-primary" onclick="history.back()">Go Back</button>
      </div>
    </div>
  </header>
</div>



<!-- TABLE -->
<div class="container-sm"> 
  <h2>Here is who other students have met</h2>
  <table class="table table-hover">
    <thead>
      <tr>
        <th scope="col">Student</th>
        <th scope="col">Choice</th>
        <th scope="col">User</th>
        <th scope="col">Location</th>
      </tr>
    </thead>
    <tbody>
      <?php
        //TABLE SECTION
        $sql = "SELECT * FROM meetings";
        if ($statement = $conn->query($sql)) {
          foreach ($statement as $row) {
            echo "
              <tr> 
                <td>".$row['username']."</td>
                <td>" .$row['choice']." met "."</td>
                <td>".$row['name']."</td>
                <td>".$row['country']."</td>
              </tr>";
          };
          $conn->close();
        } else {
          echo "
            <tr>
              <td>Error:</td> 
              <td>". $sql . "</td>
              <td>" . $conn->error."</td>
              <td></td>";
        }
      ?>
    </tbody>
  </table>
</div>



<!-- FOOTER -->
<div class="container">
  <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
    <div class="col-md-4 d-flex">
      This project was powered by
      </br>
      <a href="getbootstrap.com"> Bootstrap</a>
    </div>
  </footer>
</div>



      
</div>

    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" 
    crossorigin="anonymous"></script>
</body>
</html>
