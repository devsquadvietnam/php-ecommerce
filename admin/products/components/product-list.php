<?php 
    $sql = 'SELECT P.id, P.name, P.price, P.quantity, P.created_at, P.updated_at, C.name as category_name
     FROM products P LEFT JOIN categories C ON P.category_id = C.id ORDER BY created_at DESC;';
    $result = $connection->query($sql);
?>

<div class="card">
    <div class="card-body"> 
        <?php 
            // echo isset($_SESSION['message']) ? '<div class="alert alert-success">' 
            // . $_SESSION['message'] .
            // '</div>' : "" 
        ?>

        <?php 
            if(isset($_SESSION['message'])) {
                echo '<div class="alert alert-success">'. $_SESSION['message'] .'</div>';
                unset($_SESSION['message']);
            } 
        ?>
        
        <h5 class="card-title">Basic Datatable</h5>
        <div class="table-responsive">
            <table id="zero_config" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Category</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Created At</th>
                        <th>Updated At</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        if($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                                echo '<tr>';
                                echo "<td>" . $row['id'] . "</td>";
                                echo "<td>" . $row['name'] . "</td>";
                                echo "<td>" . $row['category_name'] . "</td>";
                                echo "<td>" . $row['price'] . "</td>";
                                echo "<td>" . $row['quantity'] . "</td>";
                                echo "<td>" . $row['created_at'] . "</td>";
                                echo "<td>" . $row['updated_at'] . "</td>";
                                echo '<td>
                                <a href="/admin/products/edit.php?id=' . $row['id'] . '" class="btn btn-primary">Edit</a>
                                    <button data-id="' . $row['id'] .'" class="btn btn-danger btnDeleteProduct">Delete</button>
                                </td>';
                                echo '</tr>';
                            }
                        }
                    ?>
                </tbody>
                <tfoot>
                    
                </tfoot>
            </table>
        </div>
    </div>
</div>