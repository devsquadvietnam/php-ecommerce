<?php

$query = parse_str($_SERVER['QUERY_STRING'], $parameters);
$id = isset($parameters['id']) ? $parameters['id'] : NULL;

$invalid = false;
if (!is_numeric($id)) {
    echo '<div><img width="100%" src="/admin/assets/images/404.jpg" /></div>';
    return;
}


$sql = "SELECT * FROM categories WHERE id = {$id}";
$result = $connection->query($sql);
$category = NULL;
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $category['id'] = $row['id'];
        $category['name'] = $row['name'];
        $category['parent_id'] = $row['parent_id'];
    }
} else {
    echo '<div><img width="100%" src="/admin/assets/images/404.jpg" /></div>';
    return;
}

$categoriesSql = "SELECT * FROM categories";
$categoriesResult = $connection->query($categoriesSql);
$categories = [];
if ($categoriesResult->num_rows > 0) {
    while ($row = mysqli_fetch_assoc($categoriesResult)) {
        $categories[] = [
            'id' => $row['id'],
            'name' => $row['name'],
        ];
    }
}


?>

<div class="card">
    <form method="POST" action="/admin/categories/backend/update-category.php" class="form-horizontal">
        <div class="card-body">
            <h4 class="card-title">Edit category</h4>
            <input type="hidden" name="id" value="<?php echo $id; ?>" />
            <div class="form-group row">
                <label for="fname" class="col-sm-3 text-end control-label col-form-label">Name</label>
                <div class="col-sm-9">
                    <input type="text" name="name" class="form-control" id="fname" placeholder="Name" value="<?php echo $category['name']; ?>" />
                </div>
            </div>
            <div class="form-group row">
                <label for="fname" class="col-sm-3 text-end control-label col-form-label">Category</label>
                <div class="col-sm-9">
                    <select class="form-control" name="parent_id">
                        <option value="">Select category</option>
                        <?php foreach ($categories as $cat) : ?>
                            <option 
                                value="<?php echo $cat['id']; ?>" 
                               <?php if($category['parent_id'] === $cat['id']): ?>  selected <?php endif ?> 
                             >
                             <?php echo $cat['name']; ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
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