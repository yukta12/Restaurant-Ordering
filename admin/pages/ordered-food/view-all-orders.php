<div class="row">
    <div class="col-md-12">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Table no</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Mobile no</th>
                    <th>Dish 1</th>
                    <th>Dish 2</th>
                    <th>Dish 3</th>
                    <th>Food status</th>
                    <th></th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                <?php
                include_once ("../includes/functions.php");
                $order_result = getAllOrders();
                while($row = mysqli_fetch_assoc($order_result)){
                    $order_id = $row['order_id'];
                    $table_no = $row['table_no'];
                    $name = $row['name'];
                    $email = $row['email'];
                    $mobile_no = $row['mobile_no'];
                    $dish_1 = $row['dish_1'];
                    $dish_2 = $row['dish_2'];
                    $dish_3 = $row['dish_3'];
                    $food_status = $row['food_status'];


                    echo<<<FOOD
<tr>
<td>$order_id</td>
<td>$table_no</td>
<td>$name</td>
<td>$email</td>
<td>$mobile_no</td>
<td>$dish_1</a></td>
<td>$dish_2</a></td>
<td>$dish_3</a></td>
<td>$food_status</td>
<td><a href="ordered-food.php?source=served&order_id=$order_id" class="btn btn-info">Served</a></td>
<td><a href="ordered-food.php?source=pending&order_id=$order_id" class="btn btn-danger">Pending</a></td>

</tr>

FOOD;

                }
                ?>
                </tbody>
            </table>
        </div>
    </div>
</div>