<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 26-12-2018
 * Time: 11:37
 
 INCLUDES CONFIGURATION from the config file and establishes the connection
 */
include_once ("config.php");
//mysql paramenters that takes hostname,username,password,and database name
$connection = mysqli_connect(HOST,USER, PASSWORD,DB_NAME);
//checks if connection is successfull or not
if($connection){
//   echo "Connection Successful";
}else{
    //if not display error
    die(mysqli_connect_error($connection));
}
?>



