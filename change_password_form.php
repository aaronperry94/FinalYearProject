<?php
  include_once 'site_os_fns.php';

  do_nav_bar();

  echo "<div class=\"content\">";

  do_html_header("Change administrator password");

  check_admin_user();

  display_password_form();

  do_html_url("admin.php", "Back to administration menu");

  echo "<div/>";
  
  do_html_footer();
?>