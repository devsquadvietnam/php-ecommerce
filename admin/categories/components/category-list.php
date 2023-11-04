<?php 
    $sql = 'SELECT A.id, A.name, A.created_at, A.updated_at, B.name AS parent_name
     FROM categories A INNER JOIN categories B ON A.parent_id = B.id ORDER BY created_at DESC;';
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
                        <th>Parent Name</th>
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
                                echo "<td>" . $row['parent_name'] . "</td>";
                                echo "<td>" . $row['created_at'] . "</td>";
                                echo "<td>" . $row['updated_at'] . "</td>";
                                echo '<td>
                                <a href="/admin/categories/edit.php?id=' . $row['id'] . '" class="btn btn-primary">Edit</a>
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