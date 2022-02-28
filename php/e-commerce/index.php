<?php
    session_start();
    include 'classes/autoload.php';
    $products = new Products;
    $errors = [];

    // unset($_SESSION['cart']);

    if(!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }

    if(isset($_POST['add_to_cart_btn'])) {
        $id = $_POST['product_id'];
        $_SESSION['qty'] = $_POST['qty'];

        if($id > 0)
            add_to_cart($products->get($id));
        else 
            $errors[] = "Product doesn't exist!";
    }

    function add_to_cart($product) {
        $product = [
            'id' => $product['id'],
            'title' => $product['title'],
            'price' => $product['price'], 
            'qty' => $_SESSION['qty']
        ];

        if(count($_SESSION['cart']) > 0) {
            $existing_item_id = null;
            foreach($_SESSION['cart'] as $item_id => $item) {
                if($product['id'] == $item['id'])
                    $existing_item_id = $item_id;
            }
            if(is_null($existing_item_id)) {
                $next_item = count($_SESSION['cart']);
                $_SESSION['cart'][$next_item] = $product;
            } else {
                $_SESSION['cart'][$existing_item_id]['qty'] += $product['qty'];
            }
        } else {
            $_SESSION['cart'][0] = $product;
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome | e-commerce</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" />
</head>
<body>

    <?php include 'includes/menu.php' ?>

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

    <div class="container my-5">
        <div class="row">
            <?php foreach($products->all() as $product): ?>
                <div class="col-md-4 my-2">
                    <div class="card">
                        <div class="card-body">
                            <?php
                                $images = json_decode($product['images'], true);

                                if(count($images)) {
                            ?>
                                <img src="./assets/img/products/<?= $images[0] ?>" alt="<?= $product['title'] ?>" class="img-fluid" style="height: 220px; display: block; margin: 0px auto;" />
                                <?php }  ?>
                            <h4><?= $product['title'] ?></h4>
                            <p>
                                Price: <strong><?= $product['price'] ?></strong>
                            </p>
                            <form method="POST">
                                <input type="number" name="qty" min="1" max="<?= $product['qty'] ?>" value="1">
                                <input type="hidden" name="product_id" value="<?= $product['id'] ?>">
                                <button type="submit" name="add_to_cart_btn" class="btn btn-sm btn-primary">Add to cart</button>
                            </form>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    
</body>
</html>