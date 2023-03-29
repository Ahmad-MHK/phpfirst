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

    <?php 
        include("header.php")
    ?>
    
    <main>
        <div class="container">
            <form action="#">
              <div class="title">Login</div>
              <div class="input-box underline">
                <input type="text" placeholder="Enter Your Email" required>
                <div class="underline"></div>
              </div>
              <div class="input-box">
                <input type="password" placeholder="Enter Your Password" required>
                <div class="underline"></div>
              </div>
              <div class="input-box button">
                <input type="submit" name="" value="Continue">
              </div>
            </form>
          </div>
    </main>
</body>
</html>