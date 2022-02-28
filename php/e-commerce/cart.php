<?php
    session_start();
    if(!isset($_SESSION['cart'])) {
       header("Location: index.html");
    } else {
        $products = $_SESSION['cart'];
    }

    if(isset($_GET['action']) && ($_GET['action'] == 'delete')) {
        if(isset($_GET['product_id']) && (is_numeric($_GET['product_id'])))  {
            unset($_SESSION['cart'][$_GET['product_id']]);
            header("Location: cart.php");
        } else
            $errors[] = "Something want wrong!";
        
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart | e-commerce</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" />
</head>
<body>

<?php include 'includes/menu.php' ?>
    
<div class="container my-5">
        <h4 class="mb-5">Cart</h4>
        <div class="row">
            <!-- CREATE PRODUCT -->
            <div class="col-md-12">
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
                        <?php foreach($products as $index => $product): ?>
                            <tr>
                                <th><?= $product['id'] ?></th>
                                <th><?= $product['title'] ?></th>
                                <th><?= $product['price'] ?> &euro;</th>
                                <th><?= $product['qty'] ?></th>
                                <th>
                                    <a href="?action=delete&product_id=<?= $index ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?');">Delete</a>
                                </th>
                            </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php 
                else: 
                    header("Location: index.php");
                endif; 
                ?>
            </div>
        </div>
    </div>

</body>
</html>