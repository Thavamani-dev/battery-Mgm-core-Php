<?php
$con = mysqli_connect("localhost","root","","tera");

if(isset($_POST['create']))
{
    
    $battery = $_POST['battery'];
    $qty = $_POST['qty'];
    
    $query = "INSERT INTO orders (`salesper_id`, `dealer_id`, `date`, `comment`, `urgent`) VALUES ('".$_POST['sperson']."','".$_POST['dealer']."','".$_POST['date']."','".$_POST['comment']."','".$_POST['urgent']."')";
    $query_run = mysqli_query($con,$query);
    echo  $student_id = $con->insert_id;
    
    foreach($battery as $index => $batterys)
    {
        
        $s_name = $batterys;
        $s_phone = $qty[$index];
        $query = "INSERT INTO order_battery (orders_id,battery_Name,battery_Qty) VALUES ('" .$student_id."','$s_name','$s_phone')";
        $query_run = mysqli_query($con, $query);
    }
}if(isset($query_run));
{
    echo 'ok';
}

?>