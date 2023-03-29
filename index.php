<?php session_start(); 
    require_once("connection.php");
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
<body>

    <?php 
        include("header.php")
    ?>
    
    <main>
    <?php 
        if(isset($_SESSION["username"])) {
            echo "<center><h2>Hello " . $_SESSION["username"] . "</h2><center>";
        }
    ?>
        <div id="Menu"> 
            <div class="search-menu-naam">
                <div class="proc60">
                    <h1>Menu</h1>
                </div>
                <div class="proc40">
                    <input class="icon"  type="text" value placeholder="Search">
                </div>
            </div>

        <?php
            $stmt = $conn->query("SELECT * FROM menu");
            while($row = $stmt->fetch()) {
        ?>

            <div class="col-menu">
                <div class="eaten-block-1">
                    <div class="food-naam"><?php echo $row["titel"] ?></div>
                    <div class="gappe"></div>
                    <div class="food-omschrijfing"><?php echo $row["omschrijving"] ?></div>
                    <div class="gappe"></div>
                    <div class="food-prices"><?php echo $row["prijs"] ?></div>
                </div>
            </div>
            
        <?php 
            }
        ?>

        </div>
    </main>
    
</body>
</html>