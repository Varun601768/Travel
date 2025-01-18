<!Doctype html>
<html>

<head>
  <meta charset="utf-8">
  <title>Admin Panel | Trains </title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://fonts.googleapis.com/css?family=Courgette" rel="stylesheet">
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  <script src="js/bootstrap.min.js"></script>
  <style>
    body {
      background: linear-gradient(-45deg, #e77b5a, #e578a2, #23a6d5a6, #23d5ab);
      background-size: 400% 400%;
      animation: gradient 15s ease infinite;
      height: 100vh;
    }

    @keyframes gradient {
      0% {
        background-position: 0% 50%;
      }

      50% {
        background-position: 100% 50%;
      }

      100% {
        background-position: 0% 50%;
      }
    }

    .col-lg-8 {
      margin-left: 250px;
    }

    @import url(https://fonts.googleapis.com/css?family=Oswald:400);

    .navigation {
      width: 100%;
      background-color: black;
    }

    img {
      width: 25px;
      border-radius: 50px;
      float: left;
    }

    .logout {
      font-size: .8em;
      font-family: 'Oswald', sans-serif;
      position: relative;
      right: -18px;
      bottom: -4px;
      overflow: hidden;
      letter-spacing: 3px;
      color: white;
      opacity: 0;
      transition: opacity .45s;
      -webkit-transition: opacity .35s;

    }

    a.button {
      width: 40px;
    }

    .button {
      text-decoration: none;
      float: right;
      padding: 12px;
      margin: 15px;
      color: white;
      width: 25px;
      background-color: #426474;
      transition: width .35s;
      -webkit-transition: width .35s;
      overflow: hidden
    }

    a:hover {
      width: 150px;
    }

    a:hover .logout {
      opacity: .9;
    }

    .button a {
      text-decoration: none;
    }

    .dash-div a button {
      font-size: 15px;
      width: 100px;
      background: #426474;
      font-family: 'FontAwesome';
      color: white;
      margin-top: 15px;
      letter-spacing: 1px;
    }
  </style>
</head>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "projectmeteor";
$bookingID = "";
$username = "";
$date = "";
$cancelled = "";
$origin = "";
$destination = "";
$passengers = "";

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

//connect to mysql database
try {
  $conn = mysqli_connect($servername, $username, $password, $dbname);
} catch (MySQLi_Sql_Exception $ex) {
  echo ("");
}
//get data from the form
function getData()
{
  $data = array();

  $data[1] = $_POST['username'];
  $data[2] = $_POST['date'];
  $data[3] = $_POST['cancelled'];
  $data[4] = $_POST['origin'];
  $data[5] = $_POST['destination'];
  $data[6] = $_POST['passengers'];
  return $data;
}
//search
if (isset($_POST['search'])) {
  $info = getData();
  $search_query = "SELECT * FROM trainbookings WHERE bookingID = '$info[0]'";
  $search_result = mysqli_query($conn, $search_query);
  if ($search_result) {
    if (mysqli_num_rows($search_result)) {
      while ($rows = mysqli_fetch_array($search_result)) {
        $bookingID = $rows['bookingID'];
        $username = $rows['userame'];
        $date = $rows['date'];
        $cancelled = $rows['cancelled'];
        $origin = $rows['origin'];
        $destination = $rows['destination'];
        $passengers = $rows['passengers'];
      }
    } else {
      echo ("No data are available");
    }
  } else {
    echo ("Result error");
  }
}
?>

<body>
  <div class="container-fliud">
    <nav class="navbar navbar-inverse">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#nav">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <div class="dash-div">
            <a href="../admin/">
              <button>Dashboard <i class="fa fa-dashboard"></i></button>
            </a>
          </div>

          <!-- <h1 class="navbar-brand"> Tourism Management System</h1>-->
        </div>
        <div class="collapse navbar-collapse" id="nav">
          <ul class="nav navbar-nav" style="float:right">
            <!--
              <li><a href="Home.php">HOME</a></li>
		          <li><a href="users_add.php">USERS</a></li>
              <li><a href="hotels_add.php">ADD HOTELS</a></li>
              <li><a href="hotelbookings_view.php">HOTEL BOOKINGS</a></li>
              <li><a href="flights_add.php">ADD FLIGHTS</a></li>
              <li><a href="flightbookings_view.php">FLIGHT BOOKINGS</a></li>
              <li><a href="trains_add.php">ADD TRAINS</a></li>
              <li><a href="trainbookings_view.php">TRAIN BOOKINGS</a></li>
              <h3><a href="adminLogout.php">LOGOUT</a></h3>
            -->
            <div class="navigation">
              <a class="button" href="adminLogout.php">
                <img src="https://pbs.twimg.com/profile_images/378800000639740507/fc0aaad744734cd1dbc8aeb3d51f8729_400x400.jpeg">
                <div class="logout">LOGOUT</div>
              </a>
            </div>

          </ul>
        </div>
      </div>
    </nav>
  </div>

  <div class="col-lg-8">
    <h1 class="text-danger text-center" style="font-weight:bold">Train Booking Details</h1>
    <br>
    <br>
    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "projectmeteor";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT bookingID,username,date,cancelled,origin,destination,passengers FROM trainbookings";
    $result = $conn->query($sql);

    echo "
    <center>
    <table class='table table-striped table-bordered table-hover py-5' style='width:200%; border: 4px solid black; text:white; text-align: center;'>
    <tr class='text-centre text-white'style='font-size:20px; background:black'>
    <th>Booking ID</th>
    <th>Username</th>
    <th>Date</th>
    <th>Cancelled</th>
    <th>Origin</th>
    <th>Destination</th>
    <th>Passengers</th>
    </tr>
    </center>";

    if ($result->num_rows > 0) {
      // output data of each row
      while ($row = $result->fetch_assoc()) {

        echo "<tr>";
        echo "<td>" . $row['bookingID'] . "</td>";
        echo "<td>" . $row['username'] . "</td>";
        echo "<td>" . $row['date'] . "</td>";
        echo "<td>" . $row['cancelled'] . "</td>";
        echo "<td>" . $row['origin'] . "</td>";
        echo "<td>" . $row['destination'] . "</td>";
        echo "<td>" . $row['passengers'] . "</td>";
        echo "</tr>";
      }
    } else {
      echo "0 results";
    }

    $conn->close();
    ?>
  </div>
  </div>
</body>

</html>