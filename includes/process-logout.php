<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 1/20/2019
 * Time: 9:00 PM
 */
session_start();
$_SESSION['user_id'] = null;
$_SESSION['role'] = null;
session_unset();
header("Location: ../index.php");