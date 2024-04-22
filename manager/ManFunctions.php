<?php
include 'DB.php';
  include_once 'config.php'; 
  include_once 'menu.php'; 
 
 
class ManFunctions extends DB {
    function getalldata($link, $table) {
        $query = "SELECT * from orders";
        $result = mysqli_query($link, $query);
        $res = [];
        if (mysqli_num_rows($result) > 0) {
            $res = mysqli_fetch_all($result, MYSQLI_ASSOC);
        }
        return $res;
    }
    function getalldataA($link, $table) {
        $query = "SELECT * FROM `orders` WHERE `status`= 'Pending'";
        $result = mysqli_query($link, $query);
        $res = [];
        if (mysqli_num_rows($result) > 0) {
            $res = mysqli_fetch_all($result, MYSQLI_ASSOC);
        }
        return $res;
    }
    function getalldataB($link, $table) {
        $query = "SELECT * FROM `orders` WHERE `status`= 'Approved Contract'";
        $result = mysqli_query($link, $query);
        $res = [];
        if (mysqli_num_rows($result) > 0) {
            $res = mysqli_fetch_all($result, MYSQLI_ASSOC);
        }
        return $res;
    }
    function getalldataD($link, $table) {
        $query = "SELECT * FROM `orders` WHERE `status`= 'Billing'";
        $result = mysqli_query($link, $query);
        $res = [];
        if (mysqli_num_rows($result) > 0) {
            $res = mysqli_fetch_all($result, MYSQLI_ASSOC);
        }
        return $res;
    }
    function getalldataDP($link, $table) {
        $query = "SELECT * FROM `orders` WHERE `status`= 'Order Placed'";
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
        $query = "SELECT * from orders where Oid=$Oid";
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
             ('location:tera_impluse/retrive.php');
             die();
        }  echo mysqli_error($con);
        }  
 

    function update() {
        extract($_REQUEST);
        if ($_FILES['profilepic']['size'] == 0) {
            $query = "UPDATE emp set name='$empname',email='$empemail' where id='$empid'";
            $result = mysqli_query($link, $query);
            if ($result) {
                header('location:retrive.php');
            } else {
                echo mysqli_error($link);
            }
        } else {
            $fname = $_FILES['profilepic']['name'];
            $dd = explode('.', $fname);
            $ext = strtolower(end($dd));

            if ($ext == 'jpg' || $ext == 'png' || $ext == 'jpeg') {
                $dir = 'profilepic';
                $newfname = $empid . '.' . $ext;
                $profilepic_path = $dir . '/' . $newfname;
                move_uploaded_file($_FILES['profilepic']['tmp_name'], $profilepic_path);

                $query = "UPDATE emp set name='$empname',email='$empemail',profilepic='$profilepic_path' where id='$empid'";
                $result = mysqli_query($link, $query);
                if ($result) {
                     
                } else {
                    echo mysqli_error($link);
                }
            } else {
                echo 'You have choosen ' . $ext . ' file. Please choose png or jpg or jpeg file.';
            }
        }
    }

    function delete() {
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
}
