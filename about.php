<?php  session_start();

  include_once 'site_os_fns.php';

  do_nav_bar();

  echo "<div class=\"content\">";

  do_html_header("About Us");

  do_googleMap();

  echo "</div>";

  do_html_footer();
?>