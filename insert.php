<!DOCTYPE html>
<html>

<head>
    <title>Package Book Details Insert</title>
</head>

<body>
    <center>
        <?php


        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "projectmeteor";

        $conn = mysqli_connect($servername, $username, $password, $dbname);

        // Check connection
        if ($conn === false) {
            die("ERROR: Could not connect. "
                . mysqli_connect_error());
        }

        // Taking all 5 values from the form data(input)
        $package_id = $_REQUEST['package_id'];
        $name =  $_REQUEST['name'];
        $phone_no =  $_REQUEST['phone_no'];
        $address = $_REQUEST['address'];
        $email = $_REQUEST['email'];
        $schedule = $_REQUEST['schedule'];

        // Performing insert query execution
        // here our table name is college
        $sql = "INSERT INTO book_list  VALUES ('','$package_id','$name','$phone_no','$address','$email','$schedule','')";

        if (mysqli_query($conn, $sql)) {
        ?>


            <html>

            <head>
                <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:400,400i,700,900&display=swap" rel="stylesheet">
            </head>
            <style>
                body {
                    text-align: center;
                    padding: 40px 0;
                    background: #ABCDCA;
                }

                h1 {
                    color: #88B04B;
                    font-family: "Nunito Sans", "Helvetica Neue", sans-serif;
                    font-weight: 900;
                    font-size: 40px;
                    margin-bottom: 10px;
                }

                p {
                    color: #404F5E;
                    font-family: "Nunito Sans", "Helvetica Neue", sans-serif;
                    font-size: 20px;
                    margin: 0;
                }

                i {
                    color: #9ABC66;
                    font-size: 100px;
                    line-height: 200px;
                    margin-left: -15px;
                }

                .card {
                    background: white;
                    padding: 60px;
                    border-radius: 4px;
                    box-shadow: 0 2px 3px #C8D0D8;
                    display: inline-block;
                    margin: 0 auto;
                }

                button {
                    background-color: #90b459;
                    width: 100px;
                    height: 50px;
                    border: none;
                    color: white;
                    font-size: 20px;
                    font-family: 'Times New Roman', Times, serif;
                    border-radius: 10px;
                }
            </style>

            <body>
                <div class="card">
                    <div style="border-radius:200px; height:200px; width:200px; background: #F8FAF5; margin:0 auto;">
                        <i class="checkmark">✓</i>
                    </div>
                    <h1>Success</h1>
                    <p>Your request has been sent.<br /> We will update you shortly!<br> Please check your email for confirmation. </p> <br>
                    <a href="./userDashboardProfile.php"><button>OK</button></a>
                </div>
            </body>

            </html>


        <?php
        } else {
            echo "ERROR: Hush! Sorry $sql. "
                . mysqli_error($conn);
        }

        // Close connection
        mysqli_close($conn);
        ?>
    </center>
</body>

</html>