<?php 

//$mysqli = new mysqli("localhost", "root", "", "db_name");

$host = "localhost";
$user = "root";
$pwd  = "";
$db  = "pdo_db_test";
$charset = "utf8mb4";
$opt = [];

$dns = "mysql:host=$host;dbname=$db;charset=$charset";

try {
    $pdo = new PDO($dns, $user, $pwd, $opt);
} catch(Exception $e) {
    echo $e->getMessage();
}

# SELECT (Read)
// $sql = "SELECT * FROM `todos` WHERE id >= 1 AND id < 10";
// $stmt = $pdo->query($sql);

// $todos = [];
// echo "<pre>";
// while($row = $stmt->fetch()) {
//     $todos[] = $row;
//     print_r($row);
// }


# Create
// $title = "X Y";
// $deadline = "2020-11-25";

// $sql = "INSERT INTO `todos` (`title`, `deadline`) VALUES (?, ?)";
$stmt = $pdo->prepare($sql);
if($stmt->execute([$title, $deadline])) {
    echo "Yes";
} else {
    echo "No";
}


# Update (Edit)
// $title = "Call Tea";
// $deadline = "2020-11-29";
// $id = 92;
// $sql = "UPDATE `todos` SET `title`=?, `status`=?, `deadline`=? WHERE `id`=?";
// $stmt = $pdo->prepare($sql);
// $stmt->execute([$title, 1, $deadline, $id]);
// if($stmt->rowCount()) {
//     echo "Yes";
// } else {
//     echo "No";
// }



# Delete
// $id = 92;
// $sql = "DELETE FROM `todos` WHERE `id`=?";
// $stmt = $pdo->prepare($sql);
// $stmt->execute([$id]);
        
// if($stmt->rowCount() > 0) {
//     echo "Yes";
// } else {
//     echo "No - Delete";
// }


// if(isset($_GET['action']) && isset($_GET['id'])) {
//     if($_GET['action'] == "delete") {
//         $id = $_GET['id'];
//         $sql = "DELETE FROM `todos` WHERE `id`=?";
//         $stmt = $pdo->prepare($sql);
//         $stmt->execute([$id]);
        
//         if($stmt->rowCount() > 0) {
//             header("Location: ?action=delete&status=1");
//         } else {
//             header("Location: ?action=delete&status=0");
//         }
//     }
// }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PDO - PHP</title>
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" />
</head>
<body>
    <div class="container my-4">
        <?php if(isset($_GET['status'])): ?>
            <div class="alert <?= (isset($_GET['status']) && ($_GET['status'] == 1)) ? 'alert-success' : 'alert-danger' ?>">
                <?php if(isset($_GET['action'])): ?>
                    <?php 
                        switch($_GET['action']) {
                            case "insert":
                                if(isset($_GET['status'])) {
                                    if($_GET['status'] == 1) {
                                        echo "Insert was performed successfully.";
                                    } else if($_GET['status'] == 0) {
                                        echo "Something want wrong while inserting data!";
                                    }
                                }
                            break;
                            case "delete":
                                if(isset($_GET['status'])) {
                                    if($_GET['status'] == 1) {
                                        echo "Delete was performed successfully.";
                                    } else if($_GET['status'] == 0) {
                                        echo "Something want wrong while deleting data!";
                                    }
                                }
                            break;
                        }
                    ?>
                <?php endif ?>
            </div>
        <?php endif; ?>

        <?php if(count($todos)): ?>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <tr>
                        <th>ID</th>
                        <th>Task</th>
                        <th>Status</th>
                        <th>Deadline</th>
                        <th>Actions</th>
                    </tr>
                    <?php foreach($todos as $todo): ?>
                    <tr>
                        <td><?= $todo['id'] ?></td>
                        <td><?= $todo['title'] ?></td>
                        <td><?= $todo['status'] ?></td>
                        <td><?= $todo['deadline'] ?></td>
                        <td>
                            <a href="?action=edit" class="btn btn-sm btn-link">
                                Edit
                            </a>
                            <a href="?action=delete&id=<?= $todo['id'] ?>" class="btn btn-sm btn-link">
                                Delete
                            </a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </table>
            </div>
        <?php else: ?>
            <div class="alert alert-info">
                You haven't define any todo!
            </div>
        <?php endif; ?>
    </div>


    <div class="container my-5">
        <form action="">
            <div class="form-group">
                <input type="text" name="title" class="form-control" placeholder="Enter todo title" />
            </div>
            <div class="form-group">
            <input type="date" name="deadline" class="form-control" placeholder="Enter deadline date" />
            </div>
            <button type="submit" class="btn btn-sm btn-primary">
                Save
            </button>
        </form>
    </div>

</body>
</html>