<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 2/9/2019
 * Time: 7:40 PM
 */
include_once ("admin_connection.php");
if(isset($_POST['forgot'])){
    $email = $_POST['email'];
    $query = "SELECT * from users WHERE email='{$email}'";
    $result = mysqli_query($connection,$query);

    if(mysqli_num_rows($result) == 1){
        $length = 50;
        $token = bin2hex(openssl_random_pseudo_bytes($length));
        $query = "UPDATE users SET token='{$token}' WHERE email = '{$email}'";
        $result = mysqli_query($connection,$query);
        $to = $email;
        $subject = "Reset Password";
        $message = "To reset the password click on this link <br>";
        $message .= "<a href='http://localhost/cms/admin/reset.php?token={$token}'>http://localhost/cms/admin/reset.php?token={$token}</a>";

        $header = "From:noreply@cms.com\r\n";
        $header .="MIME-version: 1.0\r\n";
        $header .="Content-Type: text/html";

        if(mail($to,$subject,$message,$header)){
           header("Location: ../reset.php");
        }
        else{
            echo "failed";
        }
    }
}