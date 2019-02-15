<div class="row mt-5">
    <div class="col-md-9 offset-md-1">
        <table class="table table-hover">
            <thead>
            <tr>
                <th>Item id</th>
                <th>Item name</th>
                <th>Item Description</th>
                <th>Item Price</th>
                <th>edit</th>
                <th>delete</th>
            </tr>
            </thead>
            <tbody>
            
            <?php
            include_once("../includes/functions.php");
            $items = getAllItems();
            $count = count($items);
            $i = 0;
            while ($i < $count) {
                echo "<tr>";
                echo "<td>{$items[$i]['item_id']}</td>";
               echo "<td>{$items[$i]['item_name']}</td>";
                 echo "<td>{$items[$i]['item_description']}</td>";
                 echo "<td>{$items[$i]['item_price']}</td>";
                echo "<td><a href='{$_SERVER['PHP_SELF']}?id={$items[$i]['item_id']}'>Edit</a></td>";
                echo "<td><a href='includes/delete_data.php?cat_id={$items[$i]['item_id']}'>Delete</a></td>";

                echo "</tr>";
                $i++;
            }

            ?>
        
            </tbody>
        </table>
    </div>
</div>