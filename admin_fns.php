<?php
function delete_car_form() { ?> 


	<td>
                   <form method= "post" action="delete_car.php">
                   <input type="hidden" name="carid" value="".htmlspecialchars($car['carid'])" />
                   Car ID:<input type="Text" id="carid" name="carid"><br/><br/>
                   <input type="submit" value="Delete car"/>
                   </form></td>

                   <?php

                 }

  function delete_car($carid) {

$conn = db_connect();

   $query = "delete from cars
             where carid='".$conn->real_escape_string($carid)."'";
   $result = @$conn->query($query);
   if (!$result) {
     return false;
   } else {
     return true;
   }

  }

function display_car_form() {

  echo '<form action="insert_car.php" method="post">
    
    <tag>Car ID: </tag>
    <input type="text" name="carid" size="6" maxlength="5">
    <br/><br/>
    <tag>Make: </tag>
    <input type="text" name="make" size="16">
    <br/><br/>
    <tag>Model: </tag>
    <input type="text" name="model" size="10">
    <br/><br/>
    <tag>Year: </tag>
    <input type="text" name="year" size="5" maxlength="4">
    <br/><br/>
    <tag>Mileage: </tag>
    <input type="text" name="mileage" size="7" maxlength="6">
    <br/><br/>
    
    <tag>Fuel: </tag>
    <select name= "fuel">
    <option value="Petrol">Petrol</option>
    <option value="Diesel">Diesel</option>
    </select>
    <br/><br/>

    <tag>Transmission: </tag>
    <select name= "gear">
    <option value="Manual">Manual</option>
    <option value="Automatic">Automatic</option>
    </select>
    <br/><br/>

    <tag>Engine Size: </tag>
    <input type="text" name="litre" size="5" maxlength="4">
    <br/><br/>

    <tag>Price: </tag>
    <input type="text" name="price" size="9" maxlength="10">
    <br/><br/>
    
    <input type="submit" name="submit" value="Add Car">
    
    </form>';

}

function display_password_form() {

?>
   <br />
   <form action="change_password.php" method="post">
   <table width="250" cellpadding="2" cellspacing="0" bgcolor="#cccccc">
   <tr><td>Old password:</td>
       <td><input type="password" name="old_passwd" size="16" maxlength="16" /></td>
   </tr>
   <tr><td>New password:</td>
       <td><input type="password" name="new_passwd" size="16" maxlength="16" /></td>
   </tr>
   <tr><td>Repeat new password:</td>
       <td><input type="password" name="new_passwd2" size="16" maxlength="16" /></td>
   </tr>
   <tr><td colspan=2 align="center"><input type="submit" value="Change password">
   </td></tr>
   </table>
   <br/>
   
<?php
}

?>