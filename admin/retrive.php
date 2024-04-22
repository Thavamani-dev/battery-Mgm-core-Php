<?php
 
include 'manfunctions.php';
include_once 'menu.php'; 
?>
 
<!doctype html>
<html>
    <headalign=center>
      <title>Orders list </title>
        <link href="css/crudstyles.css" rel="stylesheet" type="text/css"/>
         <link href="css/datatable.css" rel="stylesheet" type="text/css"/>
         <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet">
<!--    <link href="//cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css" rel="stylesheet">  -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="script.js"></script>
    </head>
    <body >
        <div class="container">
            <div class="left">
                 
            </div>
            <div class="right">
            <?php 

    
    if(isset($_SESSION['status']))
    {
        ?>
             <div class="alert alert-success alert-dismissible">
    <a href="" class="btn-close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Success!</strong> <?= $_SESSION['status']; ?>
  </div>
        <?php 
        unset($_SESSION['status']);
    }

?>
               
                    <h3 align=center>Orders list</h3> 
                    <table class="example" id="example">
                        <thead>
                            <tr>
                                <th>Oid  </th>
                                <th>Shop Name</th>
                                <th>Urgent Order</th>
                                <th>status</th>
                                
                                
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                          $rows= $mf->getalldata($link,'Oid');
                          
                          if(!empty($rows)){
                              foreach($rows as $row){
                                ?>
                                <tr>
                                    <td><?= $row['Oid'] ?></td>
                                    <td><?= $row['shop'] ?></td>
                                     <td>
                                      
                                      <?php 
                                      if ($row['urgent']=='y' ){
                                          echo  '<div class="alert alert-danger">
                                                 <strong>Urgent Order</strong> </div>';
                                      }else{
                                          echo '<div class="alert alert-warning">
                                                 <strong>No</strong> </div>';
                                      }
                                       
                                        ?> 
                                      </td>
                                    <td><?= $row['status'] ?>
                                    </td>
                                 <!--   <td><img src="<?= $row['profilepic'] ?>" width="100" height="100"></td> --> 
                                    <td>
                                         <a href="view.php?Oid=<?= $row['Oid'] ?>"  ><span align='center' class="glyphicon glyphicon-list-alt"></span></a>  
                                 <!--     <a href="manfunctions.php?Oid=<?= $row['Oid'] ?>&submit=delete" 
                                 onclick="return confirm('Are you sure to delete?')">Delete</a> -->   
                                    </td>
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

  <script src="https://code.jquery.com/jquery-3.6.0.min.js" ></script>
  <script src=" https://code.jquery.com/jquery-3.5.1.js" ></script>
   <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script> 
<!--  <script src="js/script.js"></script> -->
  <script>
$(document).ready(function () {
    $('#example').DataTable({
        order: [[0, 'desc']],
    });
});
  
  </script>


    </body>
</html>




