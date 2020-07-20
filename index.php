<?php
    require_once "connection.php";

    if(isset($_POST['save'])){
        $todo = $_POST['todo'];
        $date = date('l, d F Y');

        // jika field kosong maka error
        if(empty($todo)){
            $error = "field is required";
        }else{
            //jika ada maka masukkan ke database
            $sql = "INSERT INTO tbl_todo(name, date) VALUES('$todo','$date')";

            $result = mysqli_query($connection, $sql);
            
            if($result){
                $success = "Successfully added";
            }
        }
         
    }
    // Hapus todo
    if(isset($_GET['delete_id'])){
        $delete_todo = $_GET['delete_id'];
        $sql = "DELETE FROM tbl_todo WHERE id = $delete_todo";
        $result = mysqli_query($connection, $sql);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <title>Simple Todo App</title>

</head>
<body>
    <div class="container">
        <div class="todo">
            <h2>PHP Todo App</h2>
            <div>
                <form action="" method="POST">
                    <div class="form-group">
                        <input type="text" name="todo" class="form-control" placeholder="Todo name">
                    </div>
                    <div class="form-group">
                        <button name='save' class="btn btn-block btn-success">Add a new todo</button>
                    </div>
                        <?php 
                            if(isset($success)){
                                echo "<div class='alert alert-success'>$success</div>";
                            }else if(isset($error)){ 
                                // tampilkan error jika field blm diisi
                                echo "<div class='alert alert-danger'>$error</div>";
                            }
                        ?>
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
                            $query = "SELECT * FROM tbl_todo";
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
                                <!-- kirim id yang di hapus menggunakan query string (?) -->
                                <a href="index.php?delete_id=<?php echo $row['id'] ?>" class="btn btn-sm btn-danger">FINISH</a>
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