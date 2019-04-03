<?php
  include_once 'site_os_fns.php';

  do_nav_bar();

  echo "<div class=\"content\">";

  do_html_header("Administration");

  do_loginForm();

  echo "</div>";

  echo "<br/><br/>";

  do_html_footer();
?>