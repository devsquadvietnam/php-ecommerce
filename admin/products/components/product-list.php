<?php 
    $sql = 'SELECT * FROM products;';
    $result = $connection->query($sql);
?>

<div class="card">
    <div class="card-body">
        <h5 class="card-title">Basic Datatable</h5>
        <div class="table-responsive">
            <table id="zero_config" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Created At</th>
                        <th>Updated At</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        if($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                                echo '<tr>';
                                echo "<td>" . $row['id'] . "</td>";
                                echo "<td>" . $row['name'] . "</td>";
                                echo "<td>" . $row['price'] . "</td>";
                                echo "<td>" . $row['quantity'] . "</td>";
                                echo "<td>" . $row['created_at'] . "</td>";
                                echo "<td>" . $row['updated_at'] . "</td>";
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