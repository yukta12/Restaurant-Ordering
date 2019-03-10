   <?php
/*
    Inserts the order that was placed in db processes the query and displays order_placed.php if query execution was succesfull
*/
    include_once("connection.php");
    if(isset($_POST['order_food'])){
    
    $table_no = $_POST['table_no'];
    $email = $_POST['email'];
    $name = $_POST['name'];
    $mobile_no = $_POST['mobile_no'];
    $dish_1 = $_POST['dish_1'];
    $dish_2 = $_POST['dish_2'];
    $dish_3 = $_POST['dish_3'];
    
     $sql = "INSERT INTO ordered_food (table_no,name,email,mobile_no,dish_1,dish_2,dish_3) VALUES ($table_no,'$name','$email',$mobile_no,'$dish_1','$dish_2','$dish_3')";
        //die($sql);
    mysqli_query($connection,$sql);
    if(mysqli_errno($connection)){
        die(mysqli_error($connection));
    }else{
        header("Location: order_placed.php");
    }
    
}
?>