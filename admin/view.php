<?php
include 'manfunctions.php';
include_once 'menu.php'; 
?>
<!doctype html>
<html>
<head>
<!-- <div class="container"> -->
<!-- <div class="btn-list" align="center"> -->
<!--   <button type="button" class="btn btn-primary">Edit Order</button>&nbsp;&nbsp; -->
<!--   <button type="button" class="btn btn-warning">Cancel Order</button>&nbsp;&nbsp; -->
<!--   <button type="button" class="btn btn-success">Move Approve </button>&nbsp;&nbsp; -->
<!--   <button type="button" class="btn btn-info">print Order</button>&nbsp;&nbsp; -->
<!--   <button type="button" class="btn btn-danger">Delete Order</button>&nbsp;&nbsp; -->
  
<!-- </div> -->
<!-- </div> -->
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
<?php
  $rows=$mf->getPaticularEmployee($link,$Oid);
  if(!empty($rows)){
  ?>
 <title>Orders list</title>
</head>
 <body>
 <div class="container box">
<a href="retrive.php" class="btn btn-warning" role="button">Back</a>&nbsp;&nbsp;
  <div class="well">
    <h3 align="center">Order Details</h3>         
  </div>
    <?php
      foreach($rows as $row) {
  ?>
  <div class="row"> 
  
    <div class="col-sm-8" align="left">Order Date:<b><?= $row['date'] ?></b></div>    
     <div class="col-sm-3" align="left">Order Id#:<b><?= $row['Oid'] ?></b></div>
      </div><br>
      <div class="row"> 
 <div class="col-sm-8" align="left">Shop Name:<b><?= $row['shop'] ?></b></div>
 <div class="col-sm-3" align="left">Order By:<b><?= $row['person'] ?></b></div>
 </div><br>
      <div class="row"> 
       <div class="col-sm-3" align="left">Area:<b><?= $row['area'] ?></b></div>
</div>
  </div><br>
  <div class="container ">
  <form>
    <div class="form-group">
      <label for="comment">Comment:</label>
      <textarea  class="form-control mb-1" rows="3" id="comment" ><?= $row['comment'] ?></textarea>
    </div>
  </form>
    </div>
    <?php
  }
  ?>
  <?php
 } else {
 echo 'Record Not found';
 }
 ?>
 
  <div class="container  ">
  <h3 align="center">Battery list</h3>
     <table class="table table-bordered" >
        <thead>
                  <tr class="info" >
                  <th>Battery</th>
                  <th>Battery QTY</th>
                   </tr>
                      
                        </thead>
                        <tbody>
                            <?php
                        
                            $rows=$mf->getPaticularEmployees($link,$Oid);
                          if(!empty($rows)){
                              foreach($rows as $row){
                                ?>
                                <tr class="warning">
                                    <td><?= $row['bname'] ?></td>
                                    <td><?= $row['battery_Qty'] ?></td>
                                    </tr>
                                <?php
                              }
                            ?>
                        </tbody>
                    </table>
 <?php
                } else {
                    echo 'Record Not found';
                }
                ?>
                 
            </div>
   </div>
 
 
  
    </body>
    <?php
  $rows=$mf->getPaticularEmployee($link,$Oid);
  if(!empty($rows)){
  ?>
  <div class="container">
   <?php
      foreach($rows as $row) {
  ?>
    
<div class="btn-list" align="center">
 <a href="edit.php?Oid=<?= $row['Oid'] ?>" class="btn btn-warning" role="button">Edit Order</a>&nbsp;&nbsp;
  <a href="ManFunctions.php?Oid=<?= $row['Oid'] ?>&submit=cancel"  class="btn btn-danger" role="button">Cancle Order</a>&nbsp;&nbsp;  
  <button type="button" class="btn btn-warning">print Order</button>&nbsp;&nbsp;
 <a href="ManFunctions.php?Oid=<?= $row['Oid'] ?>&submit=approve"  class="btn btn-success" role="button">Move Approve</a>&nbsp;&nbsp;  
 <!--   <a href="manfunctions.php?Oid=<?= $row['Oid'] ?>&submit=delete"  class="btn btn-danger" role="button"><span class="glyphicon glyphicon-trash"></span> Order</a>--> &nbsp;&nbsp;
  <a href="retrive.php" class="btn btn-warning" role="button">Back</a>&nbsp;&nbsp;
</div>
</div>
     <?php
  }
  ?>
  <?php
 } else {
 echo 'Record Not found';
 }
 ?> 
</html>
 
   
  
  
  

            
            