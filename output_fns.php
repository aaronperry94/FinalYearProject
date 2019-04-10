<?php 

session_start();

function do_html_header($title = '') {

?>

<html>
  <head>
    <title><?php echo htmlspecialchars($title); ?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

    <style>

      .bg-img {

  /* The image used for BG */
  background-image: url("media/img_car1.jpg");

  min-height: 370px;

  /* Center and scale the image */
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
  position: relative;
  margin-top: -23;
}

.nav {

  margin: 0;
  padding: 0;
}

.logo {

  position: absolute;
  top: 100px;
  right: 30px;
  float: right;
}

.button {

background-color: #999999;
font-family: Verdana, Helvetica;
  border: none;
  color: white;
  padding: 10px 25px;
  text-align: center;
  font-size: 15px;
  cursor: pointer;
  float: right;
  margin-right:20;
  margin-top:-90;
  width: 125px;

}

.button:hover {
  background-color: #666666;
  color: white;
}

.button2 {

background-color: #0066ff;
font-family: Verdana, Helvetica;
  border: none;
  color: white;
  padding: 10px 25px;
  text-align: center;
  font-size: 15px;
  cursor: pointer;
  float: right;
  margin-right:20;
  margin-top:-25;
  width: 125px;

}

.navbar {

  border-radius: 0;
}

.button2:hover {
  background-color: blue;
  color: white;
}

.contact img {

display:block;
margin: 0 auto;

height: 40%;
width: 70%;
text-align: center;

}

.contact {

    text-align:center;

}

.aboutText {

display: inline;

}

.map {

float: right;
margin-top: 10px;

}

h2 { font-family: Verdana, Helvetica, sans-serif; font-size: 22px; color: white; margin: 0px; background-color: #0066ff; }
      body { font-size: 13px; margin: 0; padding: 0; max-height: 100%; background-color: #f2f2f2; }
      li, td { font-size: 13px; }
      hr { color: #FF0000; width=70%; text-align=center}
      a { color: #000000 }
      .carImg { float: left; margin:20px; align: left;}

      p { font-size: 22px; font-family: Verdana, Helvetica, sans-serif; margin-left: 0;
  padding-left: 0;   }

      tag {font-size: 16px;}

    .content {
    max-width: 1200px;
    margin: auto;
  }

 .row {
  display: -ms-flexbox;
  display: flex;
  -ms-flex-wrap: wrap;
  flex-wrap: wrap;
  margin: 0 -16px;
}

.col-25 {
  -ms-flex: 25%; 
  flex: 25%;
}

.col-50 {
  -ms-flex: 50%; 
  flex: 50%;
}

.col-75 {
  -ms-flex: 75%; 
  flex: 75%;
}

.col-25,
.col-50,
.col-75 {
  padding: 0 16px;
}

.containerCheckout {
  background-color: #f2f2f2;
  padding: 5px 20px 15px 20px;
  border: 1px solid black;
  border-radius: 3px;
}

input[type=text] {
  width: 100%;
  margin-bottom: 20px;
  padding: 9px;
  border: 1px solid #ccc;
  border-radius: 3px;
}

label {
  margin-bottom: 10px;
  
}

.icon-container {
  margin-bottom: 20px;
  padding: 7px 0;
  font-size: 24px;
}

.btn {
  background-color: #0066ff;
  color: white;
  padding: 12px;
  margin: 10px 0;
  border: none;
  width: 100%;
  border-radius: 3px;
  cursor: pointer;
  font-size: 17px;
}

.btn:hover {
  background-color: blue;
}

</style>
 
  </head>
  <body>

    <?php

  if($title) {
    do_html_heading($title);
  }

}

  function do_nav_bar(){ ?>

    <nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="index.php">AP Car Sales</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="index.php">Home</a></li>
      <li><a href="contact.php">Contact Us</a></li>
      <li><a href="about.php">About Us</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Admin Login</a></li>
    </ul>
  </div>
</nav>

  <div class="bg-img">
    <div class="logo"><img src="media/logo.png" width="170px;" height="170px;"></div>
  </div>
    
<?php

  }

  function display_cars() {

    $carid = $_GET['carid'];
    $price = $_GET['price'];

$conn = db_connect();

   echo "<p>Browse Our Used Cars!</p>";

// Check connection to DB

if (!$conn) {

    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT carid, make, model, year, mileage, fuel, gear, litre, price FROM cars";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {

    while($row = mysqli_fetch_assoc($result)) { 

              echo "<div style=\"border: 1px solid #C0C0C0; background-color: white; padding-bottom: 40px; \">"."<h2>".$row["make"]." ".$row["model"]."<br/>"."</h2>";

      echo "<img src=\"cars/" . htmlspecialchars($row['carid']) . ".jpg\"style=\"border: 1px solid black; width:300; height: 230; \"class=\"carImg\"/>";


        echo "<br/>";
        echo "<h4>"."Registered: ".$row["year"]."<br/>";
        echo "<h4>"."Mileage: ".$row["mileage"]." miles"."<br/>";
        echo "<h4>"."Fuel Type: ".$row["fuel"]."<br/>";
        echo "<h4>"."Transmission: ".$row["gear"]."<br/>";
        echo "<h4>"."Engine Size: ".$row["litre"]." litre"."<br/>";
        echo "<h4>"."Car ID: ".$row["carid"]."<br/>";
        echo "<h4>"."Price: £".$row["price"]."<br/>"; ?>


        <a href="contact.php?carid=<?php echo $row['carid']; ?>" class="button" role="button">Enquire Now</a>


        <a href="checkout.php?carid=<?php echo $row['carid'];?>&price=<?php echo $row['price']; ?>" class="button2" role="button">Purchase Car</a>

         <?php

         $_SESSION['$carid'] = $row['carid'];
         $_SESSION['$make'] = $row['make'];
         $_SESSION['$model'] = $row['model'];
         $_SESSION['$year'] = $row['year'];
         $_SESSION['$price'] = $row['price'];

        echo "</div>";

        echo "<br/>";  
    }

}
 else {

    echo "No cars could be found.";
}

mysqli_close($conn);
}

function do_html_footer() { 

  echo "<br/>"; ?>

</body>
</html>

  <?php
  
}

function do_html_heading($heading) {
  // print heading
?>
  <h1><?php echo htmlspecialchars($heading); ?></h1>
<?php
}

function display_contact_form(){

  $conn = db_connect();

  if (!$conn) {

    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT carid, make, model, year, gear, price FROM cars WHERE carid='".$_GET['carid']."'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row in the DB

    while($row = mysqli_fetch_assoc($result)) {

      echo "<div style=\"border: 1px solid black; background-color: white; \">"."<h2>".$row["make"]." ".$row["model"]."<br/>"."</h2>";

echo "<img src=\"cars/" . htmlspecialchars($_GET['carid']) . ".jpg\"style=\"border: 1px solid black; width:249; height: 165; \"class=\"carImg\"/>";


        echo "<h4>"."Car ID: ".$_GET["carid"]."<br/>";
        echo "<h4>"."Make: ".$row["make"]."<br/>";
        echo "<h4>"."Model: ".$row["model"]."<br/>";
        echo "<h4>"."Registered: ".$row["year"]."<br/>";
        echo "<h4>"."Transmission: ".$row["gear"]."<br/>";
        echo "<h4>"."Price: £".$row["price"]."<br/><br/>"; ?><?php

        echo "</div><br/>"; 
    }
}

?>


  <script type="text/javascript" defer src="//www.123formbuilder.com/embed/4573588.js" data-role="form" data-default-width="650px"></script>
<?php

}

function do_contact_img(){

?>
<div class="contact">
  
<img src="media/contact.jpg" border="1">

</div>

<?php
}

function do_googleMap(){ ?>

<div class ="map"><iframe width="600" height="690" src="https://maps.google.com/maps?width=100%&amp;height=600&amp;hl=en&amp;coord=54.6846591104635, -5.992649991530925&amp;q=607C%20Antrim%20Road%2C%20Mallusk+(AP%20Car%20Sales)&amp;ie=UTF8&amp;t=&amp;z=11&amp;iwloc=B&amp;output=embed" frameborder="1" scrolling="no" marginheight="0" marginwidth="0"><a href="https://www.maps.ie/map-my-route/">Create route map</a></iframe></div>

  <div class="aboutText"><tag>Here at AP Car Sales, we pride ourselves on our extensive range of used cars at market leading prices. AP Car Sales was recently established in 2018 by owner Aaron Perry.<tag/><br/>

    <h3>Where You Can Find Us:</h3><h3>AP Car Sales</h3><tag>607c Antrim Road<br/>Newtownabbey<br/>BT36 4RF<br/>Northern Ireland</tag> <br/><br/>

    <label for="openingtimes"><i class="glyphicon glyphicon-time"></i> Our Opening Times</label><br/>

Monday: 09:30 - 17:00<br/>
Tuesday: 09:30 - 17:00<br/>
Wednesday: 09:30 - 17:00<br/>
Thursday:  09:30 - 20:00<br/>
Friday:  09:30 - 17:00<br/>
Saturday:  09:30 - 15:00<br/>
Sunday:  Closed<br/><br/>

Open as normal on bank holidays.<br/><br/>

Alternative times are available by appointment only.<br/>Please visit our "Contact Us" page to arrange an appointment.</tag><br/><br/>

<label for="contact"><i class="glyphicon glyphicon-phone"></i> Get In Touch</label><br/><tag>Email: admin@apcarsales.co.uk<br/>Telephone: 02890165765<br/>Mobile: 07768501691</tag><br/>

    </div>

  <br/><br/><br/>

  <?php
}

function do_html_URL($url, $name) {

?>
  <a href="<?php echo ($url); ?>"><?php echo ($name); ?></a><br />
<?php
}

function display_admin_menu() {
?>
<br />
<a href="index.php">Go to home page</a><br />
<a href="insert_car_form.php">Add a new car</a><br />
<a href="delete_car_form.php">Remove a car</a><br />
<a href="change_password_form.php">Change admin password</a><br /><br/>
<a href="logout.php">Log Out</a><br />
<?php
}

function do_loginForm() { ?>

<form action="admin.php" method="post">

            <fieldset>
                <legend>Enter Credentials</legend>
                    <p>
                        <label for="username">Username: </label>
                        <input type="text" name="username" id="username"/>
                    </p>
                    <p>
                        <label for="password">Password: </label><br/>
                        <input type="password" name="passwd" id="passwd"/>
                    </p>
            </fieldset>
            <p>
                <input type="submit" value="Login" /> <input type="reset"/>
            </p>
        </form>

<?php
}

function display_checkout_form() {

?>
  <div class="row">
  <div class="col-75">
    <div class="containerCheckout">

  <form action="purchase.php?carid=<?php echo $_GET['carid'];?>&price=<?php echo $_GET['price']; ?>" method="post">

        <div class="row">
          <div class="col-50">
            <h3>Customer Order Details</h3>
            <label for="fname"><i class="fa fa-user"></i> Full Name</label>
            <input type="text" id="fname" name="fullname">
            <label for="email"><i class="fa fa-envelope"></i> Email</label>
            <input type="text" id="email" name="email">
            <label for="adr"><i class="fa fa-address-card-o"></i> Address</label>
            <input type="text" id="adr" name="address">
            <label for="city"><i class="fa fa-institution"></i> City</label>
            <input type="text" id="city" name="city">

            <div class="row">
              <div class="col-50">
                <label for="county">County</label>
                <input type="text" id="county" name="county">
              </div>
              <div class="col-50">
                <label for="postcode">Postcode</label>
                <input type="text" id="postcode" name="postcode" maxlength="8">
              </div>
            </div>
          </div>

          <div class="col-50">
            <h3>Payment</h3>
            <label for="fname">Accepted Cards</label>
            <div class="icon-container">
              <i class="fa fa-cc-visa" style="color:navy;"></i>
              <i class="fa fa-cc-amex" style="color:blue;"></i>
              <i class="fa fa-cc-mastercard" style="color:red;"></i>
              <i class="fa fa-cc-discover" style="color:orange;"></i>
            </div>
            <label for="cname">Name on Card</label>
            <input type="text" id="cname" name="cardname">
            <label for="ccnum">Credit card number</label>
            <input type="text" id="ccnum" name="cardnumber" maxlength="16">
            <label for="expmonth">Exp Month</label>
            <input type="text" id="expmonth" name="expmonth" maxlength="2">

            <div class="row">
              <div class="col-50">
                <label for="expyear">Exp Year</label>
                <input type="text" id="expyear" name="expyear" maxlength="4">
              </div>
              <div class="col-50">
                <label for="cvv">CVV</label>
                <input type="text" id="cvv" name="cvv" maxlength="3">
              </div>
            </div>
          </div>

        </div>
        <input type="submit" value="Process Payment" class="btn">
      </form>
      <div class="col-25">
    <div class="container1">
        </span>
      </h4>
      <hr>
      <p>Total <span class="price" style="color:black"><b>£

        <?php

      $conn = db_connect();

      $sql = "SELECT price FROM cars WHERE carid='".$_GET['carid']."'";

$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {

    while($row = mysqli_fetch_assoc($result)) {

        echo $row["price"]; ?><?php 

        ?><input type="hidden" name="price" value="<?php echo $_POST['name']; ?>"><?php
    }
}
?>

</b></span></p>
    </div>
  </div>
</div>
</div>
</div> <br/><br/>
<?php
}



function display_button($target, $image, $alt) {
  echo "<div align=\"center\"><a href=\"".($target)."\">
          <img src=\"media/".($image).".gif\"
           alt=\"".($alt)."\" border=\"0\" height=\"40\"
           width=\"165\"/></a></div>";
}

function get_car_details($carid) {
  // query database for all details for a particular car
  if ((!$carid) || ($carid=='')) {
     return false;
  }
  $conn = db_connect();
  $query = "select * from cars where carid='".$conn->real_escape_string($carid)."'";
  $result = @$conn->query($query);
  if (!$result) {
     return false;
  }
  $result = @$result->fetch_assoc();
  return $result;
}