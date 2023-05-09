<?php
require 'user.php';

if(!empty($_SESSION["id"])){
  header("Location: login.php");
}

$login = new Login();

if(isset($_POST["submit"])){
  $result = $login->login($_POST["uid"], $_POST["pwd"]);

  if($result == 1){
    $_SESSION["login"] = true;
    $_SESSION["id"] = $login->idUser();
    header("Location: login.php");
  }
  elseif($result == 10){
    echo
    "<script> alert('Pogrešna lozinka'); </script>";
  }
  elseif($result == 100){
    echo
    "<script> alert('Korisnik nije registrovan'); </script>";
  }
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="login.css">
    <link rel="shortcut icon" type="image/png" href="img/Favicon.png">
    <title>Prijavite se</title>
  </head>
  <body>


  <div class="container-nav">

        <nav>
            <ul>
                <p></p>
                <li><a href=""><img src="img/logo.png" alt=""></a></li>
                <p></p>
                <li><a href="index.php" class="abc">Početna</a></li>
                <li><a href="about.html" class="abc">O nama</a></li>
                <li><a href="katalog.html" class="abc">Katalog</a></li>
                <li><a href="news.html" class="abc">Novosti</a></li>
                <li><a href="contact.html" class="abc">Kontakt</a></li>
                <p></p>
                <p></p>
                <li class="link"><a href="login.php"><div class="user"><i class="fa-solid fa-user"> </i></div></a></li>
                <p></p>
            </ul>
        </nav>
    </div>

    <div class="container">
        <p></p>
        <div class="container1">
            <h2>Prijavite se</h2>
    <form class="" action="" method="post" autocomplete="off">
      <label for="">Username</label> <br>
      <input type="text" name="uid" required value=""> <br>
      <label for="">Lozinka</label> <br>
      <input type="password" name="pwd" required value=""> <br>
      <button type="submit" name="submit">Login</button>
    </form>
    <br>
    <p>Nemate nalog?  <a href="registracija.php">Registrujte se</a></p>
        </div>
    <p></p>
    </div>
    

    <div class="line"></div>

          <footer>
            <p>&reg LiquorStore Serbia 2022 - All rights reserved </p>
          </footer>
  </body>
</html>