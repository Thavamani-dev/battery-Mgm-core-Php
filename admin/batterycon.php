<?php
 

$connect = new PDO("mysql:host=localhost;dbname=tera", "root", "");
function fill_unit_select_box($connect)
{ 
 $output = '';
 $query = "SELECT * FROM `battery` ORDER BY `battery_Name` ASC";
 $statement = $connect->prepare($query);
 $statement->execute();
 $result = $statement->fetchAll();
 foreach($result as $row)
 {
  $output .= '<option >'.$row["battery_Name"].'</option>';

  
 }
 return $output;
}
function fill_unit($connect)
{
    $output1 = '';
    $query = "SELECT * FROM `sperson`";
    $statement = $connect->prepare($query);
    $statement->execute();
    $result = $statement->fetchAll();
    foreach($result as $row)
    {
        $output1 .= '<option value="'.$row["id"].'">'.$row["name"].'</option>';
        
        
    }
    return $output1;
}
?>