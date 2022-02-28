<?php 

$mysqli = new mysqli("localhost", "root", "", "phpdb");

if($mysqli->connect_errno == 0) {
    // CRUD
    $username = "ylber.velu";
    $password = password_hash("12345", PASSWORD_BCRYPT);

    // CREATE
    $sql = "INSERT INTO `users` (`username`, `password`) VALUES ('$username', '$password')";
    // if($mysqli->query($sql)) {
    //     echo "Success";
    // } else {
    //     echo $mysqli->error;
    // }

    // READ
    $sql = "SELECT * FROM `users`";
    $result = $mysqli->query($sql);
    $results = [];
    
    if($result->num_rows) {
        while($row = $result->fetch_assoc()) {
            $results[] = $row;
        }
    } else {
        // echo "Table is empty!";
    }

    // UPDATE
    // $sql = "UPDATE `users` SET `username`='ABC' WHERE `id`=7";
    // if($mysqli->query($sql)) {
    //     echo "Update Success";
    // } else {
    //     echo $mysqli->error;
    // }

    // DELETE
    if(isset($_GET['id'])) {
        $sql = "DELETE FROM `users` WHERE `id`=".$_GET['id'];
        if($mysqli->query($sql)) {
            header("Location: 1-mysqli.php?status=1");
        } else {
            header("Location: 1-mysqli.php?status=0");
            //echo "Error: " .$mysqli->error;
        }
    }
} else {
    echo "mysqli error!";
}

if(isset($_GET['action'])) {
    $action = $_GET['action'];

    switch($action) {
        case "close":
            header("Location: 1-mysqli.php");
        break;
    }
}
?>


<?php if(isset($_GET['status'])): ?>
    <?php if($_GET['status'] == 1): ?>
        <p>
            <strong>Notice:</strong> User was deleted successfully.
            <a href="?action=close">Close</a>
        </p>
    <?php else: ?>
        <p>
            <strong>Error:</strong> Something want wrong!
        </p>
    <?php endif; ?>
<?php endif ?>

<?php if(count($results )): ?>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Username</th>
            <th>Password</th>
            <th></th>
        </tr>
        <?php foreach($results as $row): ?>
        <tr>
            <td><?= $row['id'] ?></td>
            <td><?= $row['username'] ?></td>
            <td><?= $row['password'] ?></td>
            <td><a href="?id=<?= $row['id'] ?>">Delete</a></td>
        </tr>
        <?php endforeach; ?>
    </table>
<?php endif; ?>