<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>
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
    background-color: #007bff;
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
.btn {
            padding: 6px 12px;
            margin-bottom: 10px;
        }
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
            color:white;
        }
        .btn-danger {
            background-color: #dc3545;
            border-color: #dc3545;
        }

    </style>
</head>
<body>

<h2>Admin Page</h2>

<a href="products.php" class="btn btn-primary">Products</a>
    <a href="add-product.php" class="btn btn-primary">Add Product</a>

<table>
    <tr>
        <th>Order ID</th>
        <th>Products</th>
        <th>Payment</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Address</th>
        <th>Email</th>
        <th>Phone Number</th>
    </tr>
    <?php
    // Include database config file
    include 'config.php';

    // Check if delete button is clicked
    if(isset($_POST['delete_order'])) {
        $order_id = $_POST['order_id'];
        
        // Delete the order from the database
        $delete_sql = "DELETE FROM orders WHERE order_id = $order_id";
        $delete_result = $conn->query($delete_sql);
        
        if($delete_result) {
         
            header("Location: order-details.php");
           
        } else {
            echo "<script>alert('Failed to delete order');</script>";
        }
    }

    // Query to fetch data
    $sql = "SELECT orders.order_id, orders.products, orders.payment, order_users.f_name, order_users.l_name, order_users.address, order_users.email, order_users.phone_number FROM orders JOIN order_users ON orders.order_id = order_users.order_id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Output data of each row
        while($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>".$row["order_id"]."</td>
                    <td>".$row["products"]."</td>
                    <td>".$row["payment"]."</td>
                    <td>".$row["f_name"]."</td>
                    <td>".$row["l_name"]."</td>
                    <td>".$row["address"]."</td>
                    <td>".$row["email"]."</td>
                    <td>".$row["phone_number"]."</td>
                    <td>
                        <form method='post'>
                            <input type='hidden' name='order_id' value='".$row["order_id"]."'>
                            <button type='submit' name='delete_order' class='btn btn-danger'>Delete</button>
                        </form>
                    </td>
                  </tr>";
        }
    } else {
        echo "0 results";
    }
    $conn->close();
?>

</table>

</body>
</html>