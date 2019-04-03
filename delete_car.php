<?php
  session_start();
  include_once 'site_os_fns.php';

  do_nav_bar();

  echo "<div class=\"content\">";

  do_html_header("Deleting car");

if (check_admin_user()) {
  if (isset($_POST['carid'])) {
    $carid = $_POST['carid'];
    if(delete_car($carid)) {
      echo "<p>Car ".htmlspecialchars($carid)." was deleted.</p>";
    } else {
      echo "<p>Car ".htmlspecialchars($carid)." could not be deleted.</p>";
    }
  } else {
    echo "<p>We need an Car ID to delete a car. Please try again.</p>";
  }
  do_html_url("admin.php", "Back to administration menu");
} else {
  echo "<p>You are not authorised to view this page.</p>";
}

?>