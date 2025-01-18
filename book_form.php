<?php session_start();
if (!isset($_SESSION["username"])) {
   header("Location:blocked.php");
   $_SESSION['url'] = $_SERVER['REQUEST_URI'];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
   <title>Send Book Package Request</title>
</head>

<style>
   body {
      width: 500px;
      margin: 0 auto;
      padding: 50px;
      background: #ABCDCA;
   }

   div.elem-group {
      margin: 20px 0;
   }

   div.elem-group.inlined {
      width: 49%;
      display: inline-block;
      margin-left: 1%;
   }

   label {
      display: block;
      font-family: 'Nanum Gothic';
      padding-bottom: 10px;
      font-size: 1.25em;
   }

   input,
   select,
   textarea {
      border-radius: 2px;
      font-weight: 800;
      border: 2px solid #777;
      box-sizing: border-box;
      font-size: 20px;
      font-family: 'Nanum Gothic';
      width: 100%;
      padding: 10px;
   }

   div.elem-group.inlined input {
      width: 90%;
      display: inline-block;
   }

   textarea {
      height: 250px;
   }

   hr {
      border: 1px dotted #ccc;
   }

   button {
      height: 50px;
      background: orange;
      border: none;
      color: white;
      font-size: 1.25em;
      font-family: 'Nanum Gothic';
      border-radius: 4px;
      cursor: pointer;
   }

   button:hover {
      border: 2px solid black;
   }
</style>

<body>
   <center>

      <form action="insert.php" method="post">
         <div class="elem-group">
            <label for="id">Package ID</label>
            <input type="text" id="package_id" name="package_id" value="
               <?php
               echo $_GET['id'];
               ?> " readonly>
         </div>

         <div class="elem-group">
            <label for="name">Name</label>
            <input type="text" id="name" name="name" maxlength="30" placeholder="" pattern=[A-Z\sa-z]{3,20} required>
         </div>

         <div class="elem-group">
            <label for="phone"> Phone No:</label>
            <input type="tel" id="phone_no" name="phone_no" placeholder="" maxlength="10" pattern="[789][0-9]{9}" required>
         </div>

         <div class="elem-group">
            <label for="email">E-mail</label>
            <input type="email" id="email" name="email" placeholder="" required>
         </div>

         <div class="elem-group">
            <label for="address">Address</label>
            <input type="text" id="address" name="address" placeholder="" maxlength="40">
         </div>

         <div class="elem-group">
            <label for="schedule">Schedule</label>
            <input type="datetime-local" id="myDatetimePicker" name="schedule" required>

            <script>
               // Get the current date and time
               var today = new Date();
               // Format the current date and time to match the input format
               var formattedDate = today.toISOString().substring(0, 16);
               // Set the minimum selectable date to the current date and time
               document.getElementById("myDatetimePicker").min = formattedDate;
            </script>
         </div>

         <button type="submit">Book Now</button>
      </form>
   </center>
</body>

</html>