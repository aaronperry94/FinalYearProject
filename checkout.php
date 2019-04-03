<?php session_start();

  include_once 'site_os_fns.php';

  do_nav_bar();

  echo "<div class=\"content\">";

  do_html_header("Checkout");

  $conn = db_connect();

  if (!$conn) {

    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT carid, make, model, year, gear, price FROM cars WHERE carid='".$_GET['carid']."'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row

    while($row = mysqli_fetch_assoc($result)) {

    	echo "<div style=\"border: 1px solid black; background-color: white; \">"."<h2>".$row["make"]." ".$row["model"]."<br/>"."</h2>";

echo "<img src=\"cars/" . htmlspecialchars($_GET['carid']) . ".jpg\"style=\"border: 1px solid black; width:249; height: 165; \"class=\"carImg\"/>";


        echo "<h4>"."Car ID: ".$_GET["carid"]."<br/>";
        echo "<h4>"."Make: ".$row["make"]."<br/>";
        echo "<h4>"."Model: ".$row["model"]."<br/>";
        echo "<h4>"."Registered: ".$row["year"]."<br/>";
        echo "<h4>"."Transmission: ".$row["gear"]."<br/>";
        echo "<h4>"."Price: £".$row["price"]."<br/>"; 
        echo "<br/>";?><?php

        echo "</div><br/><br/>"; 
    }
}

display_checkout_form();

echo "</div>";

do_html_footer();

?>