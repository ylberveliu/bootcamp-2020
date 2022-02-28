<?php 
    session_start();
    include 'autoload.php';

    $p = new Products;

    if(isset($_SESSION['is_admin']) || isset($_COOKIE['is_admin'])) {
        if($_SESSION['is_admin'] != 1) {
            die("You are not allowed to view this page!");
        }
    }
    

    $errors = [];
    $products = $p->all();

    if(isset($_POST['save_product_btn'])) {
        $title = $_POST['title'];
        $price = $_POST['price'];
        $qty = $_POST['qty'];

        $images = [];
        $tmp_names = [];
        // $upload_errors = false;

        // foreach($_FILES['images']['size'] as $image_size) {
        //     if($image_size > 132123213)
        //         $upload_errors = true;
        // }

        // echo "<pre>";
        // if($upload_errors) {
        //     foreach($_FILES['images']['name'] as $image_name) {
        //         $images[] = $images;
        //     }
        // }

        if(!empty($title) && !empty($price) && !empty($qty) && !empty($_FILES['image']['name'])) {
            $images = [$_FILES['image']['name']];
            
            move_uploaded_file($_FILES['image']['tmp_name'], "./assets/img/products/".$_FILES['image']['name']);

            if($p->create(['title' => $title, 'price' => $price, 'qty' => $qty, 'images' => json_encode($images), "admin_id" => 1]))
                header("Location: admin-panel.php");
            else
                $errors[] = "Something want wrong while adding the product!";
        } else 
            $errors[] = "All fields are required!";
    }

    if(isset($_GET['action']) && ($_GET['action'] == 'edit')) {
        if(isset($_GET['product_id']) && (is_numeric($_GET['product_id'])))  {
            echo "PO";
            $_SESSION['product_id'] = $_GET['product_id'];
            header("Location: edit-product.php");
        } else
            $errors[] = "Product doesn't exist!";
        
    }

    if(isset($_GET['action']) && ($_GET['action'] == 'delete')) {
        if(isset($_GET['product_id']) && (is_numeric($_GET['product_id'])))  {
            if($p->delete($_GET['product_id'])) 
                header("Location: admin-panel.php");
            else
                $errors[] = "Something want wrong while deleting product with id: " .$_GET['product_id'];
        } else
            $errors[] = "Product doesn't exist!";
        
    }

    if(isset($_GET['action']) && ($_GET['action'] == 'logout')) {
        session_destroy();
        header("Location: login.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products | e-commerce</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" />
</head>
<body>

    <?php include 'includes/menu.php' ?>

    <div class="container my-5">
        <h3>Create product</h3>
        <div class="row">
            <?php
                if(count($errors)) {
            ?>
                <div class="alert alert-danger">
                    <ul>
                   <?php foreach($errors as $error): ?>
                        <li><?= $error ?></li>
                    <?php endforeach; ?>
                    </ul>
                </div>
            <?php   
                }
            ?>
            <!-- CREATE PRODUCT -->
            <div class="col-md-8">
                <form method="POST" action="<?= $_SERVER['PHP_SELF'] ?>" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" name="title" class="form-control" id="title" />
                    </div>
                    <div class="form-group">
                        <label for="price">Price</label>
                        <input type="text" name="price" class="form-control" id="price" />
                    </div>
                    <div class="form-group">
                        <label for="qty">Quantity</label>
                        <input type="number" name="qty" class="form-control" id="qty" />
                    </div>
                    <div class="form-group">
                        <label for="images">Images</label>
                        <br />
                        <input type="file" name="image" />
                    </div>
                    <button type="submit" name="save_product_btn" class="btn btn-primary">Save</button>
                </form>
            </div>
        </div>
    </div>

    <div class="container my-5">
        <h3>Products</h3>
        <div class="row">
            <!-- CREATE PRODUCT -->
            <div class="col-md-8">
                <?php if(count($products) > 0): ?>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Price</th>
                            <th>Qty</th>
                            <th></th>
                        </tr>
                        <?php foreach($products as $product): ?>
                            <tr>
                                <th><?= $product['id'] ?></th>
                                <th><?= $product['title'] ?></th>
                                <th><?= $product['price'] ?> &euro;</th>
                                <th><?= $product['qty'] ?></th>
                                <th>
                                    <a href="?action=edit&product_id=<?= $product['id'] ?>" class="btn btn-sm btn-primary">Edit</a>
                                    <a href="?action=delete&product_id=<?= $product['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?');">Delete</a>
                                </th>
                            </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php else: ?>
                    0 products
                <?php endif; ?>
            </div>
        </div>
    </div>

</body>
</html>