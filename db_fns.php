<?php

function db_connect() {
   $result = new mysqli('127.0.0.1', 'root', 'Ballyduff1', 'AP_Car_Sales');
   if (!$result) {
      return false;
   }
   $result->autocommit(TRUE);
   return $result;

}

 ?>