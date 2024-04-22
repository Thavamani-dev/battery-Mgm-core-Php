<?php
session_start();
include 'DB.php';
  include_once 'config.php'; 

 
 
class ManFunctions extends DB {
    function getalldata($link, $table) {
        //$search=" WHERE  (o.status != 'Pending' AND  o.status != 'Cancle') ";
        
        $query = "select o.Oid,sp.name as person,d.shopName as shop ,d.area,
                  o.date,o.comment ,o.urgent,o.status from orders o 
                  left join sperson sp on sp.id = o.salesper_id left 
                  join dealer d on d.Did = o.dealer_id	  ";
        $result = mysqli_query($link, $query);
        $res = [];
        if (mysqli_num_rows($result) > 0) {
            $res = mysqli_fetch_all($result, MYSQLI_ASSOC);
        }
        return $res;
    } 
    function getalldatabat($link, $table) {
          $query = " select b.battery_id as bname,b.battery_Qty from orders o
                    left join order_battery b on b.orders_id =o.Oid where Oid=256";
        
        $result = mysqli_query($link, $query);
        $res = [];
        if (mysqli_num_rows($result) > 0) {
            $res = mysqli_fetch_all($result, MYSQLI_ASSOC);
        }
        return $res;
    }
    function getalldataA($link, $table) {
     
//         $query = "select o.Oid,sp.name as person,d.shopName as shop ,d.area,
//                   o.date,o.comment ,o.urgent,o.status from orders o 
//                   left join sperson sp on sp.id = o.salesper_id left 
//                   join dealer d on d.Did = o.dealer_id  WHERE `Oid`= '254'";
        $query = "select o.Oid,sp.name as person,d.shopName as shop ,d.area,
                  o.date,o.comment ,o.urgent,o.status from orders o 
                  left join sperson sp on sp.id = o.salesper_id left 
                  join dealer d on d.Did = o.dealer_id	WHERE `status`= 'Pending'";
         $result = mysqli_query($link, $query);
        $res = [];
        if (mysqli_num_rows($result) > 0) {
            $res = mysqli_fetch_all($result, MYSQLI_ASSOC);
        }
        return $res;
    }
    function getalldataB($link, $table) {
        $query = "select o.Oid,sp.name as person,d.shopName as shop ,d.area,
                  o.date,o.comment ,o.urgent,o.status from orders o 
                  left join sperson sp on sp.id = o.salesper_id left 
                  join dealer d on d.Did = o.dealer_id	 WHERE `status`= 'Approved Contract'";
        $result = mysqli_query($link, $query);
        $res = [];
        if (mysqli_num_rows($result) > 0) {
            $res = mysqli_fetch_all($result, MYSQLI_ASSOC);
        }
        return $res;
    }
    function getalldataD($link, $table) {
        $query = "select o.Oid,sp.name as person,d.shopName as shop ,d.area,
                  o.date,o.comment ,o.urgent,o.status from orders o 
                  left join sperson sp on sp.id = o.salesper_id left 
                  join dealer d on d.Did = o.dealer_id	 WHERE `status`= 'Billing'";
        $result = mysqli_query($link, $query);
        $res = [];
        if (mysqli_num_rows($result) > 0) {
            $res = mysqli_fetch_all($result, MYSQLI_ASSOC);
        }
        return $res;
    }
    function getalldataDP($link, $table) {
        $query = "select o.Oid,sp.name as person,d.shopName as shop ,d.area,
                  o.date,o.comment ,o.urgent,o.status from orders o 
                  left join sperson sp on sp.id = o.salesper_id left 
                  join dealer d on d.Did = o.dealer_id	 WHERE `status`= 'Order Placed'";
        $result = mysqli_query($link, $query);
        $res = [];
        if (mysqli_num_rows($result) > 0) {
            $res = mysqli_fetch_all($result, MYSQLI_ASSOC);
        }
        return $res;
    }
    function userlist($link, $table) {
        $query = "SELECT * FROM `user`";
        $result = mysqli_query($link, $query);
        $res = [];
        if (mysqli_num_rows($result) > 0) {
            $res = mysqli_fetch_all($result, MYSQLI_ASSOC);
        }
        return $res;
    }

    function getPaticularEmployee($link,$Oid) {
        $query = "select o.Oid,sp.name as person,d.shopName as shop ,
d.area, o.date, o.comment ,o.urgent,o.status,sp.id,d.Did 
from orders o left join sperson sp on sp.id = o.salesper_id left join dealer d on d.Did = 
o.dealer_id WHERE Oid=$Oid";
        $result = mysqli_query($link, $query);
        $res = [];
        if (mysqli_num_rows($result) > 0) {
            $res = mysqli_fetch_all($result, MYSQLI_ASSOC);
        }
        return $res;
    }
    function getPaticularEmployees($link,$Oid) {
        $query = " select b.battery_id as bname,b.battery_Qty from orders o
                    left join order_battery b on b.orders_id =o.Oid where Oid=$Oid";
        $result = mysqli_query($link, $query);
        $res = [];
        if (mysqli_num_rows($result) > 0) {
            $res = mysqli_fetch_all($result, MYSQLI_ASSOC);
        }
        return $res;
    }
  function create() {
        extract($_REQUEST);
        $con = mysqli_connect("localhost","root","","tera");
        
        if(isset($_POST['create']))
        {
            
            $battery = $_POST['battery'];
            $qty = $_POST['qty'];
            
            $query = "INSERT INTO orders (`salesper_id`, `dealer_id`, `date`, `comment`, `urgent`) VALUES ('".$_POST['sperson']."','".$_POST['dealer']."','".$_POST['date']."','".$_POST['comment']."','".$_POST['urgent']."')";
            $query_run = mysqli_query($con,$query);
             $student_id = $con->insert_id;
            
            foreach($battery as $index => $batterys)
            {
                
                $s_name = $batterys;
                $s_phone = $qty[$index];
                $query = "INSERT INTO order_battery (orders_id,battery_id,battery_Qty) VALUES ('" .$student_id."','$s_name','$s_phone')";
                $query_run = mysqli_query($con, $query);
            }
        }if ($query_run){
            $_SESSION['status'] = "Data Inseted";
           header('location:retrive.php');
        }    mysqli_error($con);
        
        die();
        
        }  
 

        function update($link) {
        extract($_REQUEST);
        $con = mysqli_connect("localhost","root","","tera");
        
        if(isset($_POST['create']))
        {
            
            $battery = $_POST['battery'];
            $qty = $_POST['qty'];
            
            $query = "UPDATE `orders` SET (`salesper_id`, `dealer_id`, `date`, `comment`, `urgent`) VALUES ('".$_POST['sperson']."','".$_POST['dealer']."','".$_POST['date']."','".$_POST['comment']."','".$_POST['urgent']."')";
            $query_run = mysqli_query($con,$query);
            $student_id = $con->insert_id;
            
            foreach($battery as $index => $batterys)
            {
                
                $s_name = $batterys;
                $s_phone = $qty[$index];
                $query = "UPDATE  order_battery SET (orders_id,battery_id,battery_Qty) VALUES ('" .$student_id."','$s_name','$s_phone')";
                $query_run = mysqli_query($con, $query);
            }
        }if ($query_run){
            header('location:retrive.php');
            die();
        }    mysqli_error($con);
    }

    function delete($Oid,$link) {
        extract($_REQUEST);
//         $query = "SELECT profilepic from emp where id=$empid";
//         $result = mysqli_query($link, $query);
//         $row = mysqli_fetch_assoc($result);
//         $profilepic_path = $row['profilepic'];
//         if (file_exists($profilepic_path)) {
//             unlink($profilepic_path);
//         }
      
        $dquery = "delete from orders where Oid=$Oid";
        $result = mysqli_query($link, $dquery);
        if ($result) {
            header('location:retrive.php');
        }
    }


    function cancel($link) {
    extract($_REQUEST);
  $dquery = "UPDATE `orders` SET `status`= 'Cancle' WHERE  Oid=$Oid ";
    $result = mysqli_query($link, $dquery);
    if ($result) {
        header('location:retrive.php');
    }
}


function approve($Oid,$link) {
    extract($_REQUEST);
 
    $dquery = "UPDATE `orders`SET `status`= 'Approved Contract' WHERE  Oid=$Oid ";
    $result = mysqli_query($link, $dquery);
    if ($result) {
        //header('location:retrive.php');
    }
}

}

$mf = new ManFunctions();
extract($_REQUEST);
$link=$mf->connection();
$_REQUEST['link']=$link;
if (isset($create) && $create == 'create') {
    $mf->create();
} else if (isset($submit) && $submit == 'update') {
    $mf->update();
} else if (isset($submit) && $submit == 'delete') {
    $mf->delete();
}else if (isset($cancel) && $cancel == 'cancel') {
    $mf->cancel();
}else if (isset($submit) && $submit == 'approve') {
    $mf->approve();
}