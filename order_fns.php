<?php
session_destroy();

function insert_order() {

$carid = $_GET['carid'];

$price  = $_GET['price'];

$fullname  = filter_input(INPUT_POST, 'fullname');
$address  = filter_input(INPUT_POST, 'address');
$city  = filter_input(INPUT_POST, 'city');
$county  = filter_input(INPUT_POST, 'county');
$postcode  = filter_input(INPUT_POST, 'postcode');
$email  = filter_input(INPUT_POST, 'email');
$cardname  = filter_input(INPUT_POST, 'cardname');
$cardnumber  = filter_input(INPUT_POST, 'cardnumber');
$expmonth  = filter_input(INPUT_POST, 'expmonth');
$expyear  = filter_input(INPUT_POST, 'expyear');
$cvv  = filter_input(INPUT_POST, 'cvv');

if (!empty($fullname)) {

  }

  else {

    echo "Cannot Process Payment. Full Name field should not be empty!";
    die();
  }

  if (!empty($email)) {

  }

  else {

    echo "Cannot Process Payment. Email field should not be empty!";
    die();
  }

  if (!empty($address)){

}
  else {

    echo "Cannot Process Payment. Address field should not be empty!";
    die();
  }

  if (!empty($city)){

}
  else {

    echo "Cannot Process Payment. City field should not be empty!";
    die();
  }

  if (!empty($county)){

}
  else {

    echo "Cannot Process Payment. County field should not be empty!";
    die();
  }

  if (!empty($postcode)){

}
  else {

    echo "Cannot Process Payment. Postcode field should not be empty!";
    die();
  }


  if (!empty($cardname)){

}
  else {

    echo "Cannot Process Payment. Card Name field should not be empty!";
    die();
  }

  if (!empty($cardnumber)){

}
  else {

    echo "Cannot Process Payment. Card Number field should not be empty!";
    die();
  }

  if (!empty($expmonth)){

}
  else {

    echo "Cannot Process Payment. Expiry Month field should not be empty!";
    die();
  }

  if (!empty($expyear)){

}
  else {

    echo "Cannot Process Payment. Expiry Year field should not be empty!";
    die();
  }

  if (!empty($cvv)){

}
  else {

    echo "Cannot Process Payment. CVV field should not be empty!";
    die();
  }

$conn = db_connect();

if (!$conn) {
  
  die('Connect error (' . mysqli_connect_errno().') ' . mysqli_connect_error());
}

else {

$sql = "INSERT INTO orders (carid, name, address, city, county, postcode, email, amount_paid) values ('$carid', '$fullname', '$address', '$city', '$county', '$postcode', '$email', '$price')";
}

if ($conn->query($sql) === TRUE) {
    $last_id = $conn->insert_id;

} else {

    echo "Error: " . $sql . "<br>" . $conn->error;
}

mysqli_close($conn);
}

function process_card() {

$conn = db_connect();

if (!$conn) {

    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT orderid, email FROM orders WHERE carid = '".$_GET['carid']."'";

$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {

    while($row = mysqli_fetch_assoc($result)) {

    echo "Payment Successful!<br/><br/>";


	echo "Thank you for your Order. Your Order Confirmation Number is: #".$row["orderid"]."<br/><br/>";
	echo "A confirmation Email of your purchase has also been sent to: ".$row["email"]."<br/><br/>";

  return true;
}
}
}

function remove_car_sale() {

	$conn = db_connect();

   $query = "delete from cars
             where carid='".$_GET['carid']."'";
   $result = @$conn->query($query);
   if (!$result) {
     return false;
   } else {
     return true;
   }

}

?>