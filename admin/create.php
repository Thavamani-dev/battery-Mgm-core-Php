<html>
<?php include 'manfunctions.php';
include_once 'menu.php'; 
?>


<head>
    <title>Tera</title>
    
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
 
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script> 
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
 <form method="post" id="insert_form" action="ManFunctions.php">
    <div class="container box">
  <br />
  <br />
  
  <!--<h3 align="center"> <a href="manfunctions.php">Logout</a></h3>-->
  <br />
  <div class="form-group">
   <select name="sperson" id="selectID" class="form-control input-lg" >
    <option value="1" disabled selected >-Select Person-</option>
    <?php echo fill_unit($connect); ?>
   </select>
  </div>  
  <div class="form-group">
   <select name="dealer" id="show" class="form-control input-lg">
    <option value="" >-Select Dealer-</option>
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
    
    <input type="text" id="comment" name="comment" required placeholder="Comment" class="form-control input-lg"
       minlength="4"  size="80">
    </div>
   
     <div class="form-group"> 
   <p3>Urgent Delivery:</p3>
  <input type="radio" id="Urgent" name="urgent" value="n" checked>
  <label for="html">No</label> 
  <input type="radio" id="Urgent" name="urgent" value="y"  >
  <label for="css">Yes</label> 
    </div>
   <div class="row">
    <div class="col-md-12">
    <div class="card mt-4">
  <div class="main-form mt-3 border-bottom">
                                <div class="row">
								  <div class="form-group">&nbsp;&nbsp;&nbsp;<a href="javascript:void(0)" class="add-more-form float-end btn btn-info"> <span class="glyphicon glyphicon-plus"></span></a>
 
                                    <div class="col-md-5">
                                        <div class="form-group mb-2">
										    <label for=""> Battery</label>
                                           <select name="battery[]" id="show" class="form-control  ">
                                            <option value="" >-Select Battery-</option>
											<?php echo fill_unit_select_box($connect); ?>
                                             </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group mb-2">
                                            <label for="">QTY</label>
                                            <input type="number" name="qty[]" class="form-control" required placeholder="Enter qty">
                                        </div>
                                    </div>
                                </div>
  </div>

      <div class="paste-new-forms"></div>
 </div>
                
            </div>
        </div>
    </div>
     <div align="center">
      <input type="submit" name="create" class="btn btn-info" value="create" />
     </div>  
    
    </div> 
</form>
</body>
</html>

 <script src="https://code.jquery.com/jquery-3.6.0.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
<script>
  $(document).ready(function(){
     $('#selectID').change(function(){
      var Pid = $('#selectID').val(); 
 
      $.ajax({
        type: 'POST',
        url: 'data.php',
        data: {id:Pid},  
        success: function(data)  
         {
            $('#show').html(data);
         }
        });
     });
  });
</script> 
<script>
        $(document).ready(function () {

            $(document).on('click', '.remove-btn', function () {
                $(this).closest('.main-form').remove();
            });
            
            $(document).on('click', '.add-more-form', function () {
                $('.paste-new-forms').append('<div class="main-form mt-3 border-bottom">\
                                <div class="row">\
                                    <div class="col-md-5">\
                                        <div class="form-group mb-2">\
                                            \
                                            <select name="battery[]" id="show" class="form-control  ">\
                                            <option value="" >-Select Battery-</option>\
											<?php echo fill_unit_select_box($connect); ?>\
                                             </select>\
                                        </div>\
                                    </div>\
                                    <div class="col-md-3">\
                                        <div class="form-group mb-2">\
                                            \
                                            <input type="number" name="qty[]" class="form-control" required placeholder="Enter qty">\
                                        </div>\
                                    </div>\
                                    <div class="col-md-4">\
                                        <div class="form-group mb-2">\
                                            <button type="button" class="remove-btn btn btn-danger"><span class="glyphicon glyphicon-minus"></button>\
                                        </div>\
                                    </div>\
                                </div>\
                            </div>');
            });

        });
    </script>
