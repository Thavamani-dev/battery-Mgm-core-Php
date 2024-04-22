 <?php
  include('DB.php');
 
  $id = $_POST['id'];
  $sql = "SELECT * FROM  dealer WHERE Pid= $id ";
  $result = mysqli_query($con,$sql);
 
  $out='';
  while($row = mysqli_fetch_assoc($result)) 
  {   
     $out .=  '<option>'.$row['shopName'].'</option>'; 
  }
   echo $out;
?>