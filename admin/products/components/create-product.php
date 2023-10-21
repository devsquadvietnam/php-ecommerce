<div class="card">
    <form method="POST" action="/admin/products/backend/save-product.php" class="form-horizontal">
        <div class="card-body">
            <h4 class="card-title">Create Product</h4>
            <div class="form-group row">
                <label for="fname" class="col-sm-3 text-end control-label col-form-label">Name</label>
                <div class="col-sm-9">
                    <input type="text" name="name" class="form-control" id="fname" placeholder="Product name" />
                </div>
            </div>
            <div class="form-group row">
                <label for="price" class="col-sm-3 text-end control-label col-form-label">Price</label>
                <div class="col-sm-9">
                    <input type="number" name="price" class="form-control" id="price" placeholder="Price" />
                </div>
            </div>
            <div class="form-group row">
                <label for="Quantity" class="col-sm-3 text-end control-label col-form-label">Quantity</label>
                <div class="col-sm-9">
                    <input type="number" name="quantity" class="form-control" id="Quantity" placeholder="Quantity" />
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