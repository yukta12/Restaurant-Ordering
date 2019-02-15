<form action="includes/insert_data.php" method="post" role="form">
    <legend>Add Menu Item</legend>

    <div class="form-group">
        <label for="cat_title">Item Name</label>
        <input type="text" class="form-control" name="item_name" id="item_name" placeholder="Enter Item Name">
    </div>
    <div class="form-group">
        <label for="cat_title">Item Descrption</label>
        <input type="text" class="form-control" name="item_description" id="item_description" placeholder="Enter Item Description">
    </div>
    <div class="form-group">
        <label for="cat_title">Item Price</label>
        <input type="text" class="form-control" name="item_price" id="item_price" placeholder="Enter Item Price">
    </div>
    <button type="submit" class="btn btn-primary" name="add_item">Add Item</button>
</form>