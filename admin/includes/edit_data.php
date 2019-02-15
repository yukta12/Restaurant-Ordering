<?php
/**
 * Created by PhpStorm.
 * User: Yukta
 * Date: 2/16/2019
 * Time: 1:24 AM
 */
include_once ("admin_connection.php");
if(isset($_POST['edit_item'])){
    $item_name = $_POST['item_name'];
     $item_description = $_POST['item_description'];
     $item_price = $_POST['item_price'];
    $item_id = $_POST['item_id'];
    $query = "UPDATE menu SET item_name='$item_name',item_description='$item_description',item_price='$item_price' WHERE  item_id = $item_id";
    //die($query);
    mysqli_query($connection,$query);
    if(mysqli_errno($connection)){
        die(mysqli_error($connection));
    }
    header("Location: ../menu.php");
}