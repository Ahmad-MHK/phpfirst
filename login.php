<?php session_start(); 

  include("header.php");
  include "connection.php";
  
  if(isset($_POST["login"])) {
    if($_POST["username"] == "" or $_POST["email"] == "" or $_POST["password"] == "") {
      echo "<center><h1>Username, email and password cannot be empty</h1></center>";
    } else {
      $email=trim($_POST["email"]);
      $username=strip_tags(trim($_POST["username"]));
      $password=strip_tags(trim($_POST["password"]));
      $query=$conn->prepare("SELECT * FROM login WHERE email=? AND password=?");
      $query->execute(array($email, $password));
      $control=$query->fetch(PDO::FETCH_OBJ);
      if($control>0) {
        $_SESSION["username"] = $username;
        header("Location:index.php");
      }
      echo "<center><h1>Incorrect password or email</h1></center>";
    }
  }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="layoutlogin.css">
</head>
<body>
    <main>
        <div class="container">
            <form action="login.php" method="POST">
              <div class="title">Login</div>
              <div class="input-box underline">
                <input type="text" name="username" placeholder="Enter Your Username">
                <div class="underline"></div>
              </div>
              <div class="input-box">
                <input type="text" name="email" placeholder="Enter Your Email">
                <div class="underline"></div>
              </div>
              <div class="input-box underline">
                <input type="password" name="password" placeholder="Enter Your Password">
                <div class="underline"></div>
              </div>
              <div class="input-box button">
                <input type="submit" name="login">
              </div>
            </form>
          </div>
    </main>
</body>
</html>