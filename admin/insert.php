<?php

$con = mysqli_connect('localhost', 'root', '', 'tera');
if(isset($_POST["create"]))
{
    
    $sales=$_POST['sperson'];
    $dealer=$_POST['dealer'];
    $date=$_POST['date'];
    $com=$_POST['comment'];
    $ur=$_POST['urgent'];
    //             echo $data;
    //             exit();
    echo   $query="insert into orders(salesper_id,dealer_id,date,comment,urgent)
 values($sales,$dealer,$date,$com,$ur)";
    exit();
    
    $result = mysqli_query($con, $query)or die('query error:' . mysql_error());;
    
    $order_id = uniqid();
    for($count = 0; $count < count($_POST["item_unit"]); $count++)
    {
        $query = "INSERT INTO order_battery
  (orders_id,battery_Qty, battery_Name)
  VALUES (:order_id,:item_quantity, :item_unit)
  ";
        $statement = $con->prepare($query);
        $statement->execute(
            array(
                ':order_id'   => $order_id,
                
                ':item_quantity' => $_POST["item_quantity"][$count],
                ':item_unit'  => $_POST["item_unit"][$count]
            )
            );
    }
    $result = $statement->fetchAll();
    if(isset($result))
    {
        echo 'ok';
    }
}
?>