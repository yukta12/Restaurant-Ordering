<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 12/27/2018
 * Time: 11:07 AM
 */
include_once ("connection.php");


function getAllUsers($condition =1){
    global $connection;
    $sql = "SELECT * FROM users WHERE $condition";
    $result = mysqli_query($connection, $sql);
    return $result;
}



function getAllItems($condition = 1)
{
    global $connection;
    $sql = "SELECT * FROM menu WHERE $condition";
    $result = mysqli_query($connection, $sql);
    $i = 0;
    $items = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $single_item = array();
        $single_item['item_id'] = $row['item_id'];
         $single_item['item_name'] = $row['item_name'];
         $single_item['item_description'] = $row['item_description'];
         $single_item['item_price'] = $row['item_price'];
        $items[$i] = $single_item;
        $i++;
    }
   return $items;
}
//getAllCategories();

function isLoggedIn(){
    session_start();
    if(isset($_SESSION['user_id'])){
        return true;
    }
    else{
        return false;
    }
}
function startSession(){
    if(session_status() == PHP_SESSION_NONE)    {
            session_start();
    }

}


?>




