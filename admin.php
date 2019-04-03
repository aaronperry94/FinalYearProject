<?php
session_start();
  include_once 'site_os_fns.php';

  do_nav_bar();

  echo "<div class=\"content\">";

  do_html_header("Admin Home");


if (($_POST['username']) && ($_POST['passwd'])) {
  // they have just tried logging in

    $username = $_POST['username'];
    $passwd = $_POST['passwd'];

    if (login($username, $passwd)) {
      // if they are in the database register the user id
      $_SESSION['admin_user'] = $username;

   } else {
      // unsuccessful login
      echo "<p>You could not be logged in.<br/>
            You must be logged in to view this page.</p>";

      do_html_url('login.php', 'Login');

      exit;
    }
}

if (check_admin_user()) {
  display_admin_menu();
} else {
  echo "<p>You are not authorized to enter the administration area.</p>";
}

echo "</div>";

  echo "<br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>";


  do_html_footer();
 
?>