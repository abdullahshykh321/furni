<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Manage Posts</title>
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
<link href="css/style.css" rel="stylesheet">
<style>
    body {
        background-color: #f8f9fa;
        color: #343a40;
        font-family: Arial, sans-serif;
    }
    .container {
        max-width: 800px;
        margin: 50px auto;
    }
    h2 {
        margin-bottom: 30px;
        color: #343a40;
    }
    table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 30px;
    }
    table th, table td {
        border: 1px solid #dee2e6;
        padding: 8px;
        text-align: left;
    }
    table th {
        background: #3b5d50;
        color: #fff;
    }
    table td {
        background-color: #fff;
    }
    .btn {
        padding: 6px 12px;
        margin-bottom: 10px;
    }
    .btn-primary {
        background-color: #007bff;
        border-color: #007bff;
    }
    .btn-danger {
        background-color: #dc3545;
        border-color: #dc3545;
    }
</style>
</head>
<body>
<div class="container">
    <h2>Manage Posts</h2>
    <a href="add-product.php" class="btn btn-primary"><i class="fas fa-plus"></i> Add New Post</a>
    <?php
    include "config.php";
    // session_start(); // Remove this line

    $sql = "SELECT * FROM products";

    $result = mysqli_query($conn, $sql) or die("query failed");
    ?>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Price</th>
                <th>Actions</th> <!-- Added a new table header for actions -->
            </tr>
        </thead>
        <tbody>
            <?php
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
            ?>
            <tr>
                <td><?php echo $row['id'] ?></td>
                <td><?php echo $row['title'] ?></td>
                <td><?php echo $row['price'] ?></td>
                <td>
                    <a href="edit-product.php?id=<?php echo $row['id'] ?>" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i> Edit</a>
                    <a href="delete_product.php?id=<?php echo $row['id'] ?>" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i> Delete</a>
                </td>
            </tr>
            <?php
                }
            } else {
                echo "<tr><td colspan='4'>No posts found.</td></tr>";
            }
            ?>
        </tbody>
    </table>
</div>
</body>
</html>
