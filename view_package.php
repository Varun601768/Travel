<?php
require_once("config.php");

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

$i = $_GET['id'];
$sql = "SELECT * FROM packages WHERE id  = $i";

// Execute the query
$result = $conn->query($sql);

// Check if a record was found
if ($result->num_rows > 0) {
  // Fetch the record as an associative array
  $row = $result->fetch_assoc();

  // Display the record data

  $cover = '';
  if (is_dir(base_app . 'uploads/package_' . $row['id'])) {
    $img = scandir(base_app . 'uploads/package_' . $row['id']);
    $k = array_search('.', $img);
    if ($k !== false)
      unset($img[$k]);
    $k = array_search('..', $img);
    if ($k !== false)
      unset($img[$k]);
    $cover = isset($img[2]) ? 'uploads/package_' . $row['id'] . '/' . $img[2] : "";
  }
}
?>

<style>
  /* color palette from https://dribbble.com/shots/4383922-Sprained-Ankle-Triptych */
  /* colors named with http://chir.ag/projects/name-that-color/#171714 */
  :root {
    --spring-wood: #FEFEFD;
    --rangoon-green: #171714;
    --jet-stream: #ABCDCA;
    --pewter: #9FAAA0;
    --hippie-blue: #62A3B5;
    --faded-jade: #3D7674;
    --fuscous-gray: #585B4E;
    --leather: #907B55;
  }

  * {
    margin: 0;
    padding: 0;
  }

  body,
  html {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100%;
    background-color: var(--jet-stream);
    font-family: 'Tajawal', sans-serif;
    color: var(--rangoon-green);
  }

  .booking-card-wrapper {
    height: 400px;
    width: 1000px;
    background-color: var(--spring-wood);
    box-shadow: 0 4px 6px 0 hsla(0, 0%, 0%, 0.2);
    display: flex;
  }

  .booking-card-image {
    max-width: 100%;
    max-height: 100%;
    object-fit: cover;
    width: 400px;
    height: 700px;
  }

  .price {
    font-weight: 700;
  }

  .booking-card-content {
    flex: 3;
    display: flex;
    flex-direction: column;
  }

  .booking-card-description {
    margin-top: 10px;
    margin-left: 20px;
    margin-bottom: 10px;
  }

  .booking-card-description h1 {
    font-size: 24px;
    font-weight: 700;
    margin: 5px 0px;
    color: hsle(0, 0%, 13%)
  }

  .booking-card-details {
    flex: 1;
    padding-left: 20px;
    padding-top: 20px;
    background-color: #e4e4e3;
  }

  i.fa-star {
    color: #de9325;
    font-size: 16px;
  }

  .reviews {
    font-size: 15px;
    color: hsl(0, 0%, 45%);
    margin-top: 5px;
  }

  .reviews .amount {
    padding-left: 3px;
  }

  .side-note {
    margin-top: 10px;
    font-size: 15px;
    color: hsl(0, 0%, 45%);
  }

  button {
    width: 100px;
    height: 50px;
    outline: none;
    display: inline-block;
    font-weight: 400;
    vertical-align: middle;
    border: 1px solid transparent;
    margin-left:40%;
    border-radius: .25rem;
    box-shadow: 0 2px 2px 0 hsla(0, 0%, 0%, 0.2);
  }
  button a {
  text-decoration: none;
  color: black;
  font-size: 14px;
  }
  button:hover {
    box-shadow: 2px 2px 2px 2px grey;
    
  }

  .btn-primary {
    background-color: var(--hippie-blue);
    color: var(--spring-wood);
    font-weight: 700;
  }

  .right-align {
    margin: auto auto;
  }

  .flex {
    display: flex;
  }

  /*fade text*/
  .fade-in-text {
    animation: fadeIn 5s;
  }

  @keyframes fadeIn {
    0% {
      opacity: 0;
    }

    100% {
      opacity: 1;
    }
  }
</style>


<link href="https://fonts.googleapis.com/css?family=Tajawal:400,700" rel="stylesheet">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css" integrity="sha384-+d0P83n9kaQMCwj8F4RJB66tzIwOKmrdb46+porD/OvrJ+37WqIM7UoBtwHO6Nlg" crossorigin="anonymous">
<link rel="stylesheet" href="style.css">

<div class="fade-in-text">
  <div class="booking-card-wrapper">
    <div class="booking-card-image">
      <img class="booking-card-image" src="<?php echo validate_image($cover) ?>" alt="<?php echo $row['title'] ?>" height="200rem" style="object-fit:cover" />
    </div>
    <div class="booking-card-content">
      <div class="booking-card-description">
        <h1 style="font-size: 30px;"> <?php echo $row['title'] ?></h1>
        <p style="font-size: 20px;"> <?php $description = $row['description'];
                                      echo stripslashes(html_entity_decode($description)) ?></p>
      </div>
      <div class="booking-card-details">
        <div class="flex">
          <div>
            <p style="font-size: 25px;"><i class="fas fa-map-marker-alt"></i><?php echo $row['tour_location'] ?></p>
            <br><span class="price" style="font-size: 28px;">&#8377;<?php echo $row['cost'] ?></span> per person*
            <div class="reviews">
              <h2>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
              </h2>
              <span class="amount"> 28 reviews </span>
            </div>
          </div>
       <button>
          <?php
							// Output the button with a link to the second PHP page
							echo '<a href="book_form.php?id=' . $row['id'] . '">Book Now</a>';
						?>
         </button>     
            
          
        </div>
        <div>
          <p class="side-note">* Prices may vary depending on selected date</p>
        </div>
      </div>
    </div>
  </div>
</div>
<?php
// Close the database connection
$conn->close();
?>

<script>
  $(function() {
    $('#book').click(function() {
      if ("<?php echo $_settings->userdata('id') ?>" > 0)
        uni_modal("Book Info", "book_form.php?package_id=<?php echo $id ?>");
      else
        uni_modal("", "login.php", "large");
    })
  })
</script>