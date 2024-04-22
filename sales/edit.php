<?php
include 'manfunctions.php';
extract($_REQUEST);
?>            
<html>
<head>
    <title>Tera</title>
    
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 <style>
 .box
 {
  width:100%;
  max-width: 650px;
  margin:0 auto;
 }
 </style>
</head>
<body>
  <?php
  $rows=$mf->getPaticularEmployee($link,$Oid);
  if(!empty($rows)){
  ?>
 <form method="post" id="insert_form" action="manfunctions.php">
    <div class="container box">
  <br />
  <br />

  <!--<h3 align="center"> <a href="manfunctions.php">Logout</a></h3>-->
  <br />
   <?php
      foreach($rows as $row) {
  ?>
  
  <h4> orders ID:<?= $row['Oid'] ?></h4>
  <div class="form-group">
   <select name="sperson" id="sperson" class="form-control input-lg" >
    <option value="<?= $row['comment'] ?>">Select Person</option>
   </select>
  </div>  
  <div class="form-group">
   <select name="dealer" id="dealer" class="form-control input-lg">
    <option value="<?= $row['comment'] ?>">Select Dealer</option>
   </select>
  </div>
  <div class="form-group">
   <input type="date" name="date" id="date" value="<?= $row['date'] ?>"class="form-control input-lg"/>
  </div>
 <!--  <br>
  <div class="form-group" >
   <p><textarea type="text" name="comment" form="comment" id="comment" rows="2" cols="82" class="form-control input-lg" placeholder="Comment" ></textarea></p>
    </div> -->
    <div class="form-group"> 
    
    <input type="textarea" id="comment" name="comment"  value="<?= $row['comment'] ?>" required placeholder="Comment" class="form-control input-lg"
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
      <input type="submit" name="submit" class="btn btn-info" value="update" />
  <!--     <button class="btn btn-danger" <a href="manfunctions.php?Oid=<?= $row['Oid'] ?>&submit=delete" onclick="return confirm('Are you sure to delete?')">Delete</a></button>-->

      
     </div>  
    </div>
    </div>   <?php
                            }
                            ?>
     <?php
                } else {
                    echo 'Record Not found';
                }
                ?>
</form>
</body>
</html>

 <script>
	$(document).ready(function(){
		$("#sperson").change(function(){
			var Pid = $(this).val();
			if(Pid!=""){
				$.ajax({
					url:"manfunctions.php",
					method:"get",
					data:{Pid:Pid},
					success:function(data){
						$("#dealer").html(data);  
					}
				});
			}else{
				$("#dealer").html('  <option value="">Select person</option>');
			}
		});
	});
	 
</script>
   
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
    url:"manfunctions.php",
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
