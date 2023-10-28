<?php

$query = parse_str($_SERVER['QUERY_STRING'], $parameters);
$id = isset($parameters['id']) ? $parameters['id'] : NULL;

$invalid = false;
if(!is_numeric($id)) {
    echo '<div><img width="100%" src="/admin/assets/images/404.jpg" /></div>';
    return;
}


$sql = "SELECT * FROM products WHERE id = {$id}";
$result = $connection->query($sql);
$product = NULL;
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $product['id'] = $row['id'];
        $product['name'] = $row['name'];
        $product['price'] = $row['price'];
        $product['quantity'] = $row['quantity'];
    }
} else {
    echo '<div><img width="100%" src="/admin/assets/images/404.jpg" /></div>';
    return;
}


?>

<div class="card">
    <form method="POST" action="/admin/products/backend/update-product.php" class="form-horizontal">
        <div class="card-body">
            <h4 class="card-title">Edit Product</h4>
            <input type="hidden" name="id" value="<?php echo $id; ?>" />
            <div class="form-group row">
                <label for="fname" class="col-sm-3 text-end control-label col-form-label">Name</label>
                <div class="col-sm-9">
                    <input type="text" name="name" class="form-control" id="fname" placeholder="Product name" value="<?php echo $product['name']; ?>" />
                </div>
            </div>
            <div class="form-group row">
                <label for="price" class="col-sm-3 text-end control-label col-form-label">Price</label>
                <div class="col-sm-9">
                    <input type="number" name="price" class="form-control" id="price" placeholder="Price" value="<?php echo $product['price']; ?>" />
                </div>
            </div>
            <div class="form-group row">
                <label for="Quantity" class="col-sm-3 text-end control-label col-form-label">Quantity</label>
                <div class="col-sm-9">
                    <input type="number" name="quantity" class="form-control" id="Quantity" placeholder="Quantity" value="<?php echo $product['quantity']; ?>" />
                </div>
            </div>
        </div>
        <div class="border-top">
            <div class="card-body">
                <button type="submit" class="btn btn-primary">
                    Submit
                </button>
            </div>
        </div>
    </form>
</div>