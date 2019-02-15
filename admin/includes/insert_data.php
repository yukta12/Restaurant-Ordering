<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 12/27/2018
 * Time: 1:15 PM
 */

include_once ("admin_functions.php");
function convertToString($item){
    $string_item = "'".$item."'";

    return $string_item;
}
if(isset($_POST['add_item'])){
    //insert category
    $item_name = $_POST['item_name'];
    $item_description = $_POST['item_description'];
    $item_price = $_POST['item_price'];
    $item_name = convertToString($item_name);
    $item_description = convertToString($item_description);
    $item_price = convertToString($item_price);
    insert("menu","item_name,item_description,item_price","{$item_name},{$item_description},{$item_price}");
    header("Location: ../menu.php");
}