<?php
  include('config.php');
 
  $id = $_POST['id'];
  $sql = "SELECT * FROM  dealer WHERE Pid= $id ";
  $result = mysqli_query($conn,$sql);
 
  $out='';
  while($row = mysqli_fetch_assoc($result)) 
  {   
      $out .='<option value="'.$row["Did"].'">'.$row["shopName"].'</option>';
  }
   echo $out;
?>