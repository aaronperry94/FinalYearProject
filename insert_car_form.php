<?php
  include_once 'site_os_fns.php';

  do_nav_bar();

  echo "<div class=\"content\">";

  do_html_header("Administration (Add Car)");

  display_car_form();

do_html_url("admin.php", "Back to administration menu");

echo "</div>";

  do_html_footer();
?>