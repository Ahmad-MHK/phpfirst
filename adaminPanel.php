<?php session_start(); 
    require_once("connection.php");
?>

<?php 
    $sql = 'SELECT * FROM menu';
    $statement = $conn->prepare($sql);
    $statement->execute();
    $meal = $statement->fetchALL(PDO::FETCH_OBJ);
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
    include("header.php")
?>

<body>
    <main>
        <table class="admin-table">
        <tr>
            <th>ID</th>
            <th>Titel</th>
            <th>omschrijving</th>
            <th>Prijs</th>
        </tr>
        <?php
            foreach ($meal as $menu):
        ?>
        <tr>
            <td><?= $menu->id;?></td>
            <td><?= $menu->titel;?></td>
            <td><?= $menu->omschrijving;?></td>
            <td><?= $menu->prijs;?></td>
        </tr>
        <?php
            endforeach;
        ?>
        </table>
    </main>
</body>
</html>
