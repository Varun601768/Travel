<?php
include '../../config.php';

if(isset($_GET['id'])){
 
  
    $qry = $conn->query("SELECT * from book_list");

    foreach($qry->fetch_assoc() as $k => $v){
        $$k = $v;
    }
}
?>
<style>
    #uni_modal .modal-content>.modal-footer{
        display:none;
    }
</style>

<?php
$i=$_GET['id'];

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

$sql = "SELECT id, package_id, schedule,phone_no,name,address,email FROM book_list WHERE id=$i";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {

?>


    <p><b>Package ID:</b> <?php echo  $row["package_id"] ?></p>
    <p><b>Booking ID:</b> <?php echo $row["id"] ?> </p>
    <p><b>Name:</b><?php echo $row["name"] ?> </p>
    <p><b>Phone No.:</b><?php echo $row["phone_no"] ?> </p>
    <p><b>Address:</b><?php echo $row["address"] ?> </p>
    <p><b>Email:</b><?php echo $row["email"] ?> </p>
    <p><b>Schedule:</b><?php echo $row["schedule"] ?></p>
    
    
    <form action="" id="book-status">
        <input type="hidden" name="id" value="<?php echo  $row["id"] ?>">
        <div class="form-group">
            <label for="" class="control-label">Status</label>
    
            <select name="status" id="" class="select custom-select">
                <option value="0" <?php echo $status == 0 ? "selected" : '' ?>>Pending</option>
                <option value="1" <?php echo $status == 1 ? "selected" : '' ?>>Confimed</option>
                <option value="2" <?php echo $status == 2 ? "selected" : '' ?>>Cancelled</option>
                <option value="3" <?php echo $status == 3 ? "selected" : '' ?>>Done</option>
            </select>
        </div>
    </form>
    
    <div class="modal-footer">
    <button type="button" class="btn btn-primary" id='submit' onclick="$('#uni_modal form').submit()">Update</button>
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
    </div>


<?php

    
  }
} else {
  echo "0 results";
}

$conn->close();

?>




<script>
    $(function(){
        $('#book-status').submit(function(e){
            e.preventDefault();
            start_loader()
            $.ajax({
                url:_base_url_+"classes/Master.php?f=update_book_status",
                method:"POST",
                data:$(this).serialize(),
                dataType:"json",
                error:err=>{
                    console.log(err)
                    alert_toast("an error occured",'error')
                    end_loader()
                },
                success:function(resp){
                    if(typeof resp == 'object' && resp.status == 'success'){
                        location.reload()
                    }else{
                        console.log(resp)
                        alert_toast("an error occured",'error')
                    }
                    end_loader()
                }
            })
        })
    })
</script>