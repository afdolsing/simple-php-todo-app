<?php
    include "connection.php";

    if(isset($_POST['save'])){
        $todo = $_POST['todo'];
        $date = date('l, d F Y');
        $sql = "INSERT INTO tbl_list(name, date) VALUES('$todo','$date')";

        $result = mysqli_query($connection, $sql);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Simple Todo App</title>

</head>
<body>
    <div class="container">
        <div class="todo">
            <h2>PHP Todo App</h2>
            <div>
                <label>Add a new todo</label>
                <form action="" method="POST">
                    <div class="form-group">
                        <input type="text" name="todo" class="form-control" placeholder="Todo name">
                    </div>
                    <div class="form-group">
                        <button name='save' class="btn btn-block btn-success">Add a new todo</button>
                    </div>
                </form>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover">
                    <thead>
                        <th>No</th>
                        <th>Todo</th>
                        <th>Date Added</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                        <?php 
                            $query = "SELECT * FROM tbl_list";
                            $result = mysqli_query($connection, $query);

                            $no = 1;
                            while ($row = mysqli_fetch_array($result)):
                                $name = $row['name'];
                                $date = $row['date'];
                        ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $name; ?></td>
                            <td><?= $date; ?></td>
                            <td>
                                <a href="delete.php?id=<?php echo $row['id'] ?>" class="btn btn-sm btn-danger">FINISH</a>
                            </td>
                        </tr>
                        <?php endwhile;
                        ?>
                    </tbody>
                </table>
            </div>    
        </div>
    </div>
    
</body>
</html>