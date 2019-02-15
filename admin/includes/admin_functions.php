<?php
/**
 * Created by PhpStorm.
 * User: Yukta
 * Date: 2/16/2019
 * Time: 12:25 AM
 */

include_once ("admin_connection.php");

function insert($table_name , $column_list , $values){
    global $connection;
    $sql = "INSERT INTO {$table_name}({$column_list}) VALUES ({$values})";
    mysqli_query($connection,$sql);
    if(mysqli_errno($connection)){
        die(mysqli_error($connection));
    }
}

function delete($table_name,$condition){
    global $connection;
    $sql = "DELETE FROM {$table_name} WHERE {$condition}";
    mysqli_query($connection,$sql);
    if(mysqli_errno($connection)){
        die(mysqli_error($connection));
    }
}
