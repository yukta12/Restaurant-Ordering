<?php
if(isset($_GET['id'])) {
    include_once ("../includes/functions.php");
    $item_id = $_GET['id'];
    $item = getAllItems("item_id=$item_id");
    if(count($item) > 0) {
        $item_name = $item[0]['item_name'];
        $item_description = $item[0]['item_description'];
        $item_price = $item[0]['item_price'];

        ?>
        <form action="includes/edit_data.php" method="post" role="form">
            <legend>Edit category</legend>

            <div class="form-group">
                <label for="cat_title">Item Name</label>
                <input type="hidden" class="form-control" name="item_name" id="item_name" value="<?php echo $item_name;?>">
                <input type="hidden" class="form-control" name="item_id" id="item_id" value="<?php echo $item_id;?>">
                <input type="text" class="form-control" name="item_name" id="item_name" value="<?php echo $item_name;?>">
            </div>
             <div class="form-group">
                <label for="cat_title">Item Description</label>
               <input type="hidden" class="form-control" name="item_description" id="item_description" value="<?php echo $item_description;?>">
                <input type="text" class="form-control" name="item_description" id="item_description" value="<?php echo $item_description;?>">

            </div>
             <div class="form-group">
                <label for="cat_title">Item Price</label>
                <input type="hidden" class="form-control" name="item_price" id="item_price" value="<?php echo $item_price;?>">
                <input type="text" class="form-control" name="item_price" id="item_price" value="<?php echo $item_price;?>">
            </div>
            <button type="submit" class="btn btn-warning" name="edit_item">Edit Menu</button>
        </form>
        <?php
    }
}
?>
