<?php
require 'user.php';

if(!empty($_SESSION["id"])){
  header("Location: index.php");
}

$register = new Register();

if(isset($_POST["submit"])){
  $result = $register->registration($_POST["name"], $_POST["uid"], $_POST["email"], $_POST["pwd"], $_POST["confirmpassword"]);

  if($result == 1){
    echo
    "<script> alert('Registration Successful'); </script>";
  }
  elseif($result == 10){
    echo
    "<script> alert('Username or Email Has Already Taken'); </script>";
  }
  elseif($result == 100){
    echo
    "<script> alert('Password Does Not Match'); </script>";
  }
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
    <link rel="shortcut icon" type="image/png" href="img/Favicon.png">
    <script src="https://kit.fontawesome.com/b127971f21.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style/registracija.css">
    <title>Registrujte se</title>
    

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
                <li class="link"><a href="login.php"><div class="user"><i class="fa-solid fa-user"> </i></div></a></li>
                <p></p>
            </ul>
        </nav>
    </div>

    <div class="container">
        <p></p>
        <div class="container1">
        <h2>Registrujte se</h2>
    <form class="" action="" method="post" autocomplete="off">
      <label for="">Ime : </label> <br>
      <input type="text" name="name" required value=""> <br>
      <label for="">Korisničko ime : </label> <br>
      <input type="text" name="uid" required value=""> <br>
      <label for="">Email : </label> <br>
      <input type="email" name="email" required value=""> <br>
      <label for="">Lozinka : </label> <br>
      <input type="password" name="pwd" required value=""> <br>
      <label for="">Potvrdi lozinku : </label> <br>
      <input type="password" name="confirmpassword" required value=""> <br>
      <button type="submit" name="submit">Register</button>
    </form>
    <br> 
    <p>Već imate nalog?  <a href="login.php">Prijavite se</a></p>
    </div>
    <p></p>
    </div>
    
    

    <div class="line"></div>

          <footer>
            <p>&reg LiquorStore Serbia 2022 - All rights reserved </p>
          </footer>
  </body>
</html>