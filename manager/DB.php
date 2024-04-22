<?php
include 'batterycon.php';
class DB {
    function connection() {
        $con = mysqli_connect('localhost', 'root', '', 'tera');
        if (!$con) {
            die('Connection error' . mysqli_connect_error());
        }
      return $con;  
    }
}


 ?>