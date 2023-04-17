<?php
session_start();
require_once("connection.php");


if(isset($_SESSION["username"])) {
    // Check if form is submitted
    if(isset($_POST["submit"])) {
        $id = $_POST["id"];
        $title = $_POST["title"];
        $description = $_POST["description"];
        $price = $_POST["price"];

        // Update menu item in database
        $sql = "UPDATE menu SET titel = :title, omschrijving = :description, prijs = :price WHERE id = :id";
        $statement = $conn->prepare($sql);
        $statement->bindParam(':title', $title);
        $statement->bindParam(':description', $description);
        $statement->bindParam(':price', $price);
        $statement->bindParam(':id', $id);
        $result = $statement->execute();

        if($result) {
            echo "Menu item updated successfully.";
        } else {
            echo "Failed to update menu item.";
        }
    }
    
    // Fetch menu item details based on ID
    if(isset($_GET["id"])) {
        $id = $_GET["id"];
        $sql = "SELECT * FROM menu WHERE id = :id";
        $statement = $conn->prepare($sql);
        $statement->bindParam(':id', $id);
        $statement->execute();
        $menu = $statement->fetch(PDO::FETCH_OBJ);
    } else {
        // Redirect to main page if ID is not provided
        header("Location: index.php");
        exit;
    }
} else {
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Menu Item</title>
    <link rel="stylesheet" href="layoutlogin.css">
</head>
<body>
<main>
    <div class="edit-menu">
        <h2>Edit Menu Item</h2>
        <form method="post" action="">
            <input type="hidden" name="id" value="<?= $menu->id; ?>">
            <label for="title">Title:</label><br>
            <input type="text" id="title" name="title" value="<?= $menu->titel; ?>"><br>
            <label for="description">Description:</label><br>
            <input type="text" id="description" name="description" value="<?= $menu->omschrijving; ?>"><br>
            <label for="price">Price:</label><br>
            <input type="number" id="price" name="price" value="<?= $menu->prijs; ?>"><br>
            <input type="submit" name="submit" value="Update">
        </form>
    </div>
</main>
</body>
</html>
