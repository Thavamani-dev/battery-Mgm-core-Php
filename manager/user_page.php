<?php

@include 'config.php';

session_start();

if(!isset($_SESSION['users_name'])){
   header('location:login_form.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
       
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
 
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script> 
   <title>user page</title>

   <!-- custom css file link 
   <link rel="stylesheet" href="css/style.css"> -->

</head>
<body>
   
<div class="container">

 
</div>
 
<?php include 'manfunctions.php';?>
<?php include_once 'menu.php';?>
 

 <style>
 .box
 {
  width:100%;
  max-width: 650px;
  margin:0 auto;
 }
 </style>
 
<body>
<?php
  include('config.php');
?>
 <form method="post" id="insert_form" action="insert.php">
    <div class="container box">
      <div class="content" align="right">
      <h3>hi, <span>SALES PERSON</span></h3>
      <h3>welcome <span><?php echo $_SESSION['users_name'] ?></span> <img src="profilepic/images.png" alt="Girl in a jacket" width="25" height="26"><a href="logout.php" class="btn btn-danger">logout</a></h3>
      
<!--       <a href="login_form.php" class="btn">login</a> -->
<!--       <a href="register_form.php" class="btn">register</a> -->
<!--       <a href="logout.php" class="btn">logout</a> -->
   </div>
    
  <br />
  <br />
        
  <!--<h3 align="center"> <a href="manfunctions.php">Logout</a></h3>-->
  <br /> 
   <div class="form-group">
   <input type="hidden" name="sperson" id="sperson" value="<?php echo $_SESSION['user_name'] ?>" class="form-control input-lg"/>
  </div>
  
  <div class="form-group">
   <select name="dealer" id="dealer" class="form-control input-lg">
    <option value="" disabled selected >-Select Dealer-</option>
    <?php 
    $id=$_SESSION['user_name'] ;
    
    $sql = "SELECT * FROM dealer WHERE`Pid`=$id  ";
            $result = mysqli_query($conn,$sql);
            while($row = mysqli_fetch_assoc($result)) {?>
            <option value="<?php echo $row['Did'] ?>"><?php echo $row['shopName'] ?></option>
            <?php }?>
   </select>
  </div>
  <div class="form-group">
   <input type="date" name="date" id="date" class="form-control input-lg"/>
  </div>
 <!--  <br>
  <div class="form-group" >
   <p><textarea type="text" name="comment" form="comment" id="comment" rows="2" cols="82" class="form-control input-lg" placeholder="Comment" ></textarea></p>
    </div> -->
    <div class="form-group"> 
    
    <input type="textarea" id="comment" name="comment" required placeholder="Comment" class="form-control input-lg"
       minlength="4"  size="80">
    
    <br>
     <div class="form-group"> 
   <p3>Urgent Delivery:</p3>
  <input type="radio" id="Urgent" name="urgent" value="n" checked>
  <label for="html">No</label> 
  <input type="radio" id="Urgent" name="urgent" value="y"  >
  <label for="css">Yes</label> 
    </div>
    
    <div class="table-repsonsive">
     <span id="error"></span>
     <table class="table table-bordered" id="item_table">
      <tr>
       <th>Select Battery</th>
       <th>Enter Quantity</th>
      <th><button type="button" name="add" class="btn btn-success btn-sm add"><span class="glyphicon glyphicon-plus"></span></button></th>
<!--      <th><input type="text" id="name" name="name"  minlength="2" maxlength="4" size="5" placeholder="count" class="form-control input-lg"></th> -->
      </tr>
     </table>
     <div align="center">
      <input type="submit" name="submit" class="btn btn-info" value="create" />
     </div>  
    </div>
    </div>
</form>
</body>
</html>
<script>
$(document).ready(function(){
 
 $(document).on('click', '.add', function(){
  var html = '';
  html += '<tr>';
  html += '<td><select name="item_unit[]" class="form-control item_unit" id="battery"><option value="">Select Unit</option><?php echo fill_unit_select_box($connect); ?></select></td>';
  html += '<td><input type="text" name="item_quantity[]" value="" class="form-control item_quantity" value="" /></td>';
  html += '<td><button type="button" name="remove" class="btn btn-danger btn-sm remove"><span class="glyphicon glyphicon-minus"></span></button></td></tr>';
  $('#item_table').append(html);
 });
 
 $(document).on('click', '.remove', function(){
  $(this).closest('tr').remove();
 });
 
 $('#insert_form').on('submit', function(event){
  event.preventDefault();
  var error = '';
  $('.item_quantity').each(function(){
   var count = 1;
   if($(this).val() == '')
   {
    error += "<p>Enter Item Quantity at "+count+" Row</p>";
    return false;
   }
   count = count + 1;
  });
  
  $('.item_unit').each(function(){
   var count = 1;
   if($(this).val() == '')
   {
    error += "<p>Select Unit at "+count+" Row</p>";
    return false;
   }
   count = count + 1;
  });
  var form_data = $(this).serialize();
  if(error == '')
  {
   $.ajax({
    url:"insert.php",
    method:"POST",
    data:form_data,
    success:function(data)
    {
     if(data == 'ok')
     {
      $('#item_table').find("tr:gt(0)").remove();
      $('#error').html('<div class="alert alert-success">Item Details Saved</div>');
     }
    }
    
   });
  }
  else
  {
   $('#error').html('<div class="alert alert-danger">'+error+'</div>');
  }
 });
 
});
</script> 


</body>
</html>