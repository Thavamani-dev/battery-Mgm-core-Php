<?php
include 'manfunctions.php';
include_once 'menu.php'; 
?>
 
<!doctype html>
<html>
    <head>
      <title>Orders list </title>
        <link href="css/crudstyles.css" rel="stylesheet" type="text/css"/>
         <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet">
   <link href="//cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css" rel="stylesheet"> 
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  
    </head>
    <body>
        <div class="container">
            <div class="left">
                 
            </div>
            <div class="right">
               
                    <h3>Orders list</h3> 
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
                          $rows= $mf->getalldataA($link,'Oid');
                          
                          if(!empty($rows)){
                              foreach($rows as $row){
                                ?>
                                <tr>
                                    <td><?= $row['Oid'] ?></td>
                                    <td><?= $row['shop'] ?></td>
                                     <td><?= $row['urgent'] ?></td>
                                    <td><?= $row['status'] ?></td>
                                 <!--   <td><img src="<?= $row['profilepic'] ?>" width="100" height="100"></td> --> 
                                    <td>
                                        <a href="view.php?Oid=<?= $row['Oid'] ?>"  ><span class="glyphicon glyphicon-list-alt"></span></a>  
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
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.min.js" ></script>
 
 <script src="js/script.js"></script>
  <script>
  $(document).ready(function () {
    $('#example').DataTable({
        order: [[3, 'desc']],
    });
});
  
  </script>

    </body>
</html>




