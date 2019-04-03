<?php
  session_start();
  include_once 'site_os_fns.php';

  do_nav_bar();

  echo "<div class=\"content\">";

  do_html_header("Adding New Car");

$carid  = filter_input(INPUT_POST, 'carid');

$make = filter_input(INPUT_POST, 'make');

$model = filter_input(INPUT_POST, 'model');

$year = filter_input(INPUT_POST, 'year');

$mileage = filter_input(INPUT_POST, 'mileage');

$selectOption1 = $_POST['fuel']; 

$selectOption2 = $_POST['gear']; 

$litre = filter_input(INPUT_POST, 'litre');

$price = filter_input(INPUT_POST, 'price');

echo "<br/><br/>";

if (!empty($carid)){

}
  else {

    echo "Car ID field should not be empty!";
    die();
  }

if (!empty($make)) {

  }

  else {

    echo "Make field should not be empty!";
    die();
  }

  if (!empty($model)) {

  }

  else {

    echo "Model field should not be empty!";
    die();
  }

  if (!empty($year)){

}
  else {

    echo "Year field should not be empty!";
    die();
  }

  if (!empty($mileage)){

}
  else {

    echo "Mileage field should not be empty!";
    die();
  }

$conn = db_connect();

if (!$conn) {
  
  die('Connect error (' . mysqli_connect_errno().') ' . mysqli_connect_error());
}

else {

$sql = "INSERT INTO cars (carid, make, model, year, mileage, fuel, gear, litre, price) values ('$carid', '$make', '$model', '$year', '$mileage', '$selectOption1', '$selectOption2', '$litre', '$price')";
}

if ($conn->query($sql) === TRUE) {
    $last_id = $conn->insert_id;

    echo "<h3>Car Added!";
    echo "<br/>";

} else {

    echo "Error: " . $sql . "<br>" . $conn->error;
}

mysqli_close($conn);

do_html_url("admin.php", "Back to administration menu");
?>