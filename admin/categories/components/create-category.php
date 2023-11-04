<?php
$sql = "SELECT * FROM categories";
$result = $connection->query($sql);
$categories = [];
if ($result->num_rows > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $categories[] = [
            'id' => $row['id'],
            'name' => $row['name'],
        ];
    }
}

?>
<div class="card">
    <form method="POST" action="/admin/categories/backend/save-category.php" class="form-horizontal">
        <div class="card-body">
            <h4 class="card-title">Create Category</h4>
            <div class="form-group row">
                <label for="fname" class="col-sm-3 text-end control-label col-form-label">Name</label>
                <div class="col-sm-9">
                    <input type="text" name="name" class="form-control" id="fname" placeholder="Name" />
                </div>
            </div>
            <div class="form-group row">
                <label for="fname" class="col-sm-3 text-end control-label col-form-label">Category</label>
                <div class="col-sm-9">
                    <select class="form-control" name="parent_id">
                        <option value="">Select category</option>
                        <?php foreach ($categories as $cat) : ?>
                            <option value="<?php echo $cat['id']; ?>"><?php echo $cat['name']; ?></option>
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