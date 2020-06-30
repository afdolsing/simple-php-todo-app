<?php
    include "connection.php";

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
                    <button class="btn btn-block btn-success">Add a new todo</button>
                </div>
            </form>
            </div>    
        </div>
    </div>
    
</body>
</html>