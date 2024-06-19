<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Add Product</title>
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
        max-width: 600px;
        margin: 100px auto;
    }
    h2 {
        margin-bottom: 30px;
        color: #343a40;
    }
    form {
        background: #f9f9f9;
        padding: 20px;
        border-radius: 5px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }
    form label {
        display: block;
        margin-bottom: 10px;
    }
    form input[type="text"],
    form input[type="file"],
    form input[type="number"] {
        width: 100%;
        padding: 8px;
        margin-bottom: 15px;
        border: 1px solid #ccc;
        border-radius: 5px;
        box-sizing: border-box;
    }
    form select {
        width: 100%;
        padding: 8px;
        margin-bottom: 15px;
        border: 1px solid #ccc;
        border-radius: 5px;
        box-sizing: border-box;
    }
    form input[type="submit"] {
        background: #007bff;
        color: #fff;
        border: none;
        padding: 10px 20px;
        border-radius: 5px;
        cursor: pointer;
    }
</style>
</head>
<body>
<div class="container">
    <h2>Add Product</h2>
    <form action="save-product.php" method="post" enctype="multipart/form-data">
        <label for="image">Image:</label>
        <input type="file" id="image" name="image" accept="image/*" required>
        
        <label for="title">Title:</label>
        <input type="text" id="title" name="title" required>
        
        <label for="price">Price:</label>
        <input type="text" id="price" name="price" step="0.01" value="RS:">
        
        <label for="item-type">Item Type:</label>
        <select id="item-type" name="item-type" required>
            <option value="shop-item">Shop Item</option>
            <option value="main-page">Main Page Item</option>
        </select>
        
        <input type="submit" value="Add Product">
    </form>
</div>
</body>
</html>
