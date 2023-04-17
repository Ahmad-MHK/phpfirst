<?php session_start(); 
    require_once("connection.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="layout.css">
    <title>Document</title>
    <link rel="stylesheet" href="layout.css">
</head>
<body>

<?php 
include("header.php");

if(isset($_POST["submit_button"])){
    $titel = $_POST["titel"];
    $omschrijvijng = $_POST["omschrijving"];
    $prijs = $_POST["prijs"];
    
    $sql = "INSERT INTO menu(titel, omschrijving, prijs) VALUES(:titel, :omschrijving, :prijs)";
    $statement = $conn->prepare($sql);
    $statement->execute([":titel" => $titel, ":omschrijving" => $omschrijvijng, ":prijs" => $prijs]);
    header("Location:index.php");
}
?>

<div class="container">
            <form action="add-menuu.php" method="POST">
              <div class="title">Menu add</div>
              <div class="input-box underline">
                <input type="text" name="titel" placeholder="Titel">
                <div class="underline"></div>
              </div>
              <div class="input-box">
                <input type="text" name="omschrijving" placeholder="omschrijving">
                <div class="underline"></div>
              </div>
              <div class="input-box underline">
                <input type="text" name="prijs" placeholder="prijs">
                <div class="underline"></div>
              </div>
              <div class="input-box button">
                <input type="submit" name="submit_button">
              </div>
            </form>
          </div>
</body>
</html>