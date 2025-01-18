<!Doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>Admin Panel | Bus </title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Courgette" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <script src="js/bootstrap.min.js"></script>
    <style>
        body {
            margin: 0;
            width: 100%;
            height: 100vh;
            font-family: "Exo", sans-serif;
            background: #b3bef0;
            background-size: 400% 400%;
            animation: gradientBG 15s ease infinite;
        }

        @keyframes gradientBG {
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

        a.btn.btn-info.btn-block.btn-lg {
            width: 460px;
        }
    </style>
</head>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "projectmeteor";

$busID = "";
$operator = "";
$type = "";
$origin = "";
$destination = "";
$originArea = "";
$destinationArea = "";
$departure = "";
$arrival = "";
$seats = "";
$windows = "";
$fare = "";
$seatsAvailable = "";
$noOfBookings = "";


mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

//connect to mysql database
try {
    $conn = mysqli_connect($servername, $username, $password, $dbname);
} catch (MySQLi_Sql_Exception $ex) {
    echo ("Connection Error");
}
//get data from the form
function getData()
{
    $data = array();


    $data[1] = $_POST['operator'];
    $data[2] = $_POST['type'];
    $data[3] = $_POST['origin'];
    $data[4] = $_POST['destination'];
    $data[5] = $_POST['originArea'];
    $data[6] = $_POST['destinationArea'];
    $data[7] = $_POST['departure'];
    $data[8] = $_POST['arrival'];
    $data[9] = $_POST['seats'];
    $data[10] = $_POST['windows'];
    $data[11] = $_POST['fare'];
    $data[12] = $_POST['seatsAvailable'];
    $data[13] = $_POST['noOfBookings'];


    return $data;
}
//search
if (isset($_POST['search'])) {
    $info = getData();
    $search_query = "SELECT * FROM bus WHERE busID = '$info[0]'";
    $search_result = mysqli_query($conn, $search_query);
    if ($search_result) {
        if (mysqli_num_rows($search_result)) {
            while ($rows = mysqli_fetch_array($search_result)) {
                $busID = $rows['busID'];
                $operator = $rows['operator'];
                $type = $rows['type'];
                $origin = $rows['origin'];
                $destination = $rows['destination'];
                $originArea = $rows['originArea'];
                $destinationArea = $rows['destinationArea'];
                $departure = $rows['departure'];
                $arrival = $rows['arrival'];
                $seats = $rows['seats'];
                $windows = $rows['windows'];
                $fare = $rows['fare'];
                $seatsAvailable = $rows['seatsAvailable'];
                $noOfBookings = $rows['noOfBookings'];
            }
        } else {
            echo ("No data are available");
        }
    } else {
        echo ("Result error");
    }
}
//insert
if (isset($_POST['insert'])) {
    $info = getData();
    $insert_query = "INSERT INTO `bus`(`operator`, `type`, `origin`,`destination`,`originArea`,`destinationArea`,`departure`,`arrival`,`seats`,`windows`,`fare`,`seatsAvailable`,`noOfBookings`) VALUES ('$info[1]','$info[2]','$info[3]','$info[4]','$info[5]','$info[6]','$info[7]','$info[8]','$info[9]','$info[10]','$info[11]','$info[12]','$info[13]')";
    try {
        $insert_result = mysqli_query($conn, $insert_query);
        if ($insert_result) {
            if (mysqli_affected_rows($conn) > 0) {
                echo ("Data inserted successfully");
            } else {
                echo ("Data not inserted");
            }
        }
    } catch (Exception $ex) {
        echo ("error inserted" . $ex->getMessage());
    }
}
//delete
if (isset($_POST['delete'])) {
    $info = getData();
    $delete_query = "DELETE FROM `bus` WHERE busID = '$info[0]'";
    try {
        $delete_result = mysqli_query($conn, $delete_query);
        if ($delete_result) {
            if (mysqli_affected_rows($conn) > 0) {
                echo ("Data deleted");
            } else {
                echo ("Data not deleted");
            }
        }
    } catch (Exception $ex) {
        echo ("Error in deleting" . $ex->getMessage());
    }
}
//edit
if (isset($_POST['update'])) {
    $info = getData();
    $update_query = "UPDATE `bus` SET operator='$info[1]',type='$info[2]',origin='$info[3]',destination='$info[4]',originArea='$info[5]',destinationArea='$info[6]',departure='$info[7]',arrival='$info[8]',seats='$info[9]',windows='$info[10]',fare='$info[11]',seatsAvailable='$info[12]',noOfBookings='$info[13]' WHERE trainNo = '$info[0]'";
    try {
        $update_result = mysqli_query($conn, $update_query);
        if ($update_result) {
            if (mysqli_affected_rows($conn) > 0) {
                echo ("Data updated");
            } else {
                echo ("Data not updated");
            }
        }
    } catch (Exception $ex) {
        echo ("Error in updating" . $ex->getMessage());
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
                    <!--  <h1 class="navbar-brand"> Tourism Management System</h1>-->
                </div>
                <div class="collapse navbar-collapse" id="nav">
                    <ul class="nav navbar-nav" style="float:right">
                        <!-- <li><a href="Home.php">HOME</a></li>
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

    <div class="container-fluid">
   
        <div class="row mx-5 my-5" style="display: flex; justify-content: center;">
            <div class="col-lg-4">

                <form method="post" action="">
                    <center>
                    <div class="form-group row">

                        <h4>Bus Number (Use to Search Bus's details)</h4>
                        <input type="number" name="busID" class="form-control" placeholder="Bus No. /Automatic Number Genrates" value="<?php echo ($busID); ?>" disabled>

                        <div class="col-xs-6">
                            <h4>Operator</h4>
                            <input type="text" name="operator" class="form-control" placeholder="Enter bus operator" value="<?php echo ($operator); ?>" required>
                        </div>

                        <div class="col-xs-6">
                            <h4>Type</h4>
                            <input type="text" name="type" class="form-control" placeholder="Enter bus type" value="<?php echo ($type); ?>" required>
                        </div>

                        <div class="col-xs-6">
                            <h4>Origin</h4>
                            <input type="text" name="origin" class="form-control" placeholder="Enter origin" value="<?php echo ($origin); ?>" required>
                        </div>

                        <div class="col-xs-6">
                            <h4>Destination</h4>
                            <input type="text" name="destination" class="form-control" placeholder="Enter destnation" value="<?php echo ($destination); ?>" required>
                        </div>

                        <div class="col-xs-6">
                            <h4>Origin Area</h4>
                            <input type="text" name="originArea" class="form-control" placeholder="Enter origin area" value="<?php echo ($originArea); ?>" required>
                        </div>

                        <div class="col-xs-6">
                            <h4>Destination Area</h4>
                            <input type="text" name="destinationArea" class="form-control" placeholder="Enter destination area" value="<?php echo ($destinationArea); ?>" required>
                        </div>

                        <div class="col-xs-6">
                            <h4>Departure</h4>
                            <input type="time" name="departure" class="form-control" placeholder="Enter departure time" value="<?php echo ($departure); ?>" required>
                        </div>

                        <div class="col-xs-6">
                            <h4>Arrival</h4>
                            <input type="time" name="arrival" class="form-control" placeholder="Enter arrival time" value="<?php echo ($arrival); ?>" required>
                        </div>

                        <div class="col-xs-6">
                            <h4>Seats</h4>
                            <input type="number" name="seats" class="form-control" placeholder="Enter no. of seats" value="<?php echo ($seats); ?>" required>
                        </div>

                        <div class="col-xs-6">
                            <h4>Windows</h4>
                            <input type="number" name="windows" class="form-control" placeholder="Enter no. of windows" value="<?php echo ($windows); ?>" required>
                        </div>

                        <div class="col-xs-6">
                            <h4>Fare</h4>
                            <input type="number" name="fare" class="form-control" placeholder="Enter fare" value="<?php echo ($fare); ?>" required>
                        </div>

                        <div class="col-xs-6">
                            <h4>Seats Available</h4>
                            <input type="number" name="seatsAvailable" class="form-control" placeholder="Enter available seats" value="<?php echo ($seatsAvailable); ?>" required>
                        </div>

                        <div class="col-xs-6">
                            <h4>No Of Bookings</h4>
                            <input type="number" class="form-control" name="noOfBookings" placeholder="Enter no. of bookings" value="<?php echo ($noOfBookings); ?>" required>
                        </div>
                    </div>

                    <br>
                    <br>
                    <hr>

                    <div>
                        <input type="submit" class="btn btn-success btn-block btn-lg" name="insert" value="Add">
                        <a href="bus_update.php" class="btn btn-info btn-block btn-lg">Update | Delete | Search</a>
                        <br>
                        <br>

                    </div>
                    </center>
                </form>
                
            </div>
        </div>
     

        <div class="col-lg-8">
            <h1 class="text-danger text-center" style="font-weight:bold">BUS INFORMATION</h1>
            <hr>
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

            $sql = "SELECT busID,operator,type,origin,destination,originArea,destinationArea,departure,arrival,seats,windows,fare,seatsAvailable,noOfBookings FROM bus";
            $result = $conn->query($sql);

            echo "<div class='col-xs-6'>
<table class='table table-striped table-bordered table-hover py-5 ' style='width:200%; border: 4px solid black; text:white; text-align: center;float:left'>
<tr class='text-centre text-white'style='font-size:20px; background:black;'>
<th>Bus No.</th>
<th>Operator</th>
<th>Bus Type</th>
<th>Origin</th>
<th>Destination</th>
<th>Origin Area</th>
<th>Destination Area</th>
<th>Departure Time</th>
<th>Arrival Time</th>
<th>Total No. Seats</th>
<th>Total No. Windows</th>
<th>Fare</th>
<th>Seats Availble</th>
<th>No. of bookings</th>
</tr>
</div>";

            if ($result->num_rows > 0) {
                // output data of each row
                while ($row = $result->fetch_assoc()) {

                    echo "<tr>";
                    echo "<td>" . $row['busID'] . "</td>";
                    echo "<td>" . $row['operator'] . "</td>";
                    echo "<td>" . $row['type'] . "</td>";
                    echo "<td>" . $row['origin'] . "</td>";
                    echo "<td>" . $row['destination'] . "</td>";
                    echo "<td>" . $row['originArea'] . "</td>";
                    echo "<td>" . $row['destinationArea'] . "</td>";
                    echo "<td>" . $row['departure'] . "</td>";
                    echo "<td>" . $row['arrival'] . "</td>";
                    echo "<td>" . $row['seats'] . "</td>";
                    echo "<td>" . $row['windows'] . "</td>";
                    echo "<td>" . $row['fare'] . "</td>";
                    echo "<td>" . $row['seatsAvailable'] . "</td>";
                    echo "<td>" . $row['noOfBookings'] . "</td>";

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