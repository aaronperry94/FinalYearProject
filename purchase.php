<?php  session_start();

  include_once 'site_os_fns.php';

  do_nav_bar();

  echo "<div class=\"content\">";

  do_html_header("Order Confirmation");

  insert_order();

  remove_car_sale();

  process_card();

  echo "</div>";

  do_html_footer();
?>