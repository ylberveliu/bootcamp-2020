<?php
    if(isset($_GET['action']) && ($_GET['action'] == 'logout')) {
        session_destroy();
        header("Location: login.php");
    }
?>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container">
    <a class="navbar-brand" href="#">e-commerce</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
                <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
            </li>
            <?php if(isset($_SESSION['is_admin']) && $_SESSION['is_admin'] == 0): ?> 
                <li class="nav-item">
                    <a class="nav-link"  href="profile.php">Profile</a>
                </li>
            <?php endif; ?>
            <?php if(isset($_SESSION['is_admin']) && $_SESSION['is_admin'] == 1): ?> 
                <li class="nav-item">
                    <a class="nav-link"  href="admin-panel.php">Admin panel</a>
                </li>
            <?php endif; ?>
            <li class="nav-item">
                <a class="nav-link" href="cart.php">
                    Cart (<?php echo isset($_SESSION['cart']) ? count($_SESSION['cart']) : 0; ?>)
                </a>
            </li>
            <?php if(isset($_SESSION['username'])): ?> 
            <li class="nav-item">
                <a class="nav-link"  href="?action=logout">Logout</a>
            </li>
            <?php endif; ?>
        </ul>
    </div>
  </div>
</nav>