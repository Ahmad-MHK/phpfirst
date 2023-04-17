<?php session_start(); 
    require_once("connection.php");
?>

<?php 
    $sql = 'SELECT * FROM menu';
    $statement = $conn->prepare($sql);
    $statement->execute();
    $meal = $statement->fetchAll(PDO::FETCH_OBJ);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="layout.css">
</head>

<?php 
    include("header.php");
    if(isset($_SESSION["username"])) {
?>

<body>
    <main>
        <div class="add-menu">
            <a href="add-menuu.php"><button class="add-button">Add menu</button></a>
        </div>
        <div class="table-size">
            <table class="admin-table">
            <tr>
                <th>ID</th>
                <th>Titel</th>
                <th>omschrijving</th>
                <th>Prijs</th>
                <th>Action</th>
            </tr>
            <?php
                foreach ($meal as $menu):
            ?>
           <!-- Inside the loop for displaying menu items -->
            <tr>
                <td><?= $menu->id;?></td>
                <td><?= $menu->titel;?></td>
                <td><?= $menu->omschrijving;?></td>
                <td><?= $menu->prijs;?></td>
                <td>
                    <a href="./edit.php?id=<?= $menu->id; ?>"><button class="edit.action">edit</button></a>
                    <a href="./delete.php?id=<?= $menu->id; ?>"><button class="delete-action">delete</button></a>
                </td>
            </tr>

            <?php
                endforeach;
            ?>
            </table>
        </div>
    </main>
    <?php
    }
    else {
        header("Location:login.php");
    }
    ?>
</body>
</html>
