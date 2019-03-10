<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 12/27/2018
 * Time: 11:07 AM
 
 COMMON FUNCTIONS IN ENTIRE FILES that includes connection
 */
include_once ("connection.php");

/*
This function gets all the users in the db
@param   : condition(if any)
@returns : result-set
*/

function getAllUsers($condition =1){
    global $connection;
    $sql = "SELECT * FROM users WHERE $condition";
    $result = mysqli_query($connection, $sql);
    return $result;
}

/*
This function gets all the orders in the db
@param   : condition(if any)
@returns : result-set
*/

function getAllOrders($condition =1){
    global $connection;
    $sql = "SELECT * FROM ordered_food WHERE $condition";
    $result = mysqli_query($connection, $sql);
    return $result;
}

/*
This function gets all the items in the db
@param   : condition(if any)
@returns : result-set
*/


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


/*
This function is used to check if the user is logged in or not
@param   : Nothing
@returns : boolean
*/

function isLoggedIn(){
    session_start();
    if(isset($_SESSION['user_id'])){
        return true;
    }
    else{
        return false;
    }
}
/*
This function is used to start a session only if there is no session started
@param   : Nothing
@returns : Nothing
*/

function startSession(){
    if(session_status() == PHP_SESSION_NONE)    {
            session_start();
    }

}


?>




