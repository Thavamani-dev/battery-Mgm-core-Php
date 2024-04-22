<?php
include 'manfunctions.php';
 
?>
<!doctype html>
<html>
    <head>
      <center>  <title>Orders list</title>
        <link href="css/crudstyles.css" rel="stylesheet" type="text/css"/>
         <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="//cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css" rel="stylesheet">
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
                                <th>comment</th>
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
                                    <td><?= $row['comment'] ?></td>
                                    <td><?= $row['status'] ?></td>
                                 <!--   <td><img src="<?= $row['profilepic'] ?>" width="100" height="100"></td> --> 
                                    <td>
                                        <a href="edit.php?Oid=<?= $row['Oid'] ?>">Edit</a> | 
                                        <a href="manfunctions.php?Oid=<?= $row['Oid'] ?>&submit=delete" onclick="return confirm('Are you sure to delete?')">Delete</a>
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
  <script src="//cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
  <script>
  $(document).ready(function(){
    $("#example").DataTable();
    });
  
  </script>

    </body>
</html>




