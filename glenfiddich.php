<?php

use Random\BrokenRandomEngineError;

    date_default_timezone_set('Europe/Belgrade');
    include 'dbh.inc.php';
    include 'comments.inc.php';
    session_start();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="shortcut icon" type="image/png" href="img/Favicon.png">
    <link rel="stylesheet" href="glenfiddich.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/b127971f21.js" crossorigin="anonymous"></script>
    <title>Glenfiddich 0.7 18YO</title>
</head>         
<body>

<div class="container5">
    <?php

echo "<form method='POST' action='".getLogin($conn)."'>
    <input type='text' name='uid'>
    <input type='password' name='pwd'>
    <button type='submit' name='loginSubmit'>PRIJAVA</button>
    </form>";
echo "<form method='POST' action='".userLogout($conn)."'>
    <button type='submit' name='logoutSubmit'>ODJAVA</button>
    </form>";

    if(isset($_SESSION['id'])) {
        echo "Prijavljeni ste!";     
    } else{
        echo "Niste prijavljeni!";
    }
?>
</div>



<!-- navigacija -->

<div class="container-nav">

    <nav>
        <ul class="list">
            <p></p>
            <li class="link"><a href=""><img src="img/logo.png" alt=""></a></li>
            <p></p>
            <li class="link"><a href="index.php" class="abc">Početna</a></li>
            <li class="link"><a href="about.html" class="abc">O nama</a></li>
            <li class="link"><a href="katalog.html" class="abc">Katalog</a></li>
            <li class="link"><a href="news.html" class="abc">Novosti</a></li>
            <li class="link"><a href="contact.html" class="abc">Kontakt</a></li>
            <p></p>
            <p></p>
                <li class="link"><a href="login.php"><div class="user"><i class="fa-solid fa-user"> </i></div></a></li>
            <p></p>
        </ul>
    </nav>
</div>

<div class="container">
    <p></p>
    <div class="box1">
    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="img/Glenfiddich0.71.jpg" alt="First slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="img/Glenfiddich0.72.jpg" alt="Second slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="..." alt="Third slide">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

</div>
    </div>
    <div class="box2">
        <h2>Glenfiddich 0.7 18YO</h2>
        <p>Šifra proizvoda: GF-4889</p>
        <p>Koriste se fino špansko oloroso drvo i američki hrast za sazrevanje ovog bogatog, intrigantno voćnog i robusnog izraza hrasta, ali postoji mnogo više razloga zašto je ovaj izraz poseban.
Svaka serija je pojedinačno numerisana i pažljivo nadgledana. Svaka od njih ima izuzetnu doslednost i karakter iz intenzivnog perioda venčanja, kao i toplu, istaknutu završnicu.
Zaista izuzetan single malt, rezultat ne samo osamnaest godina brige i pažnje, već i zanata i znanja u proizvodnji viskija koje se prenosi kroz generacije.</p>
    </div>
    <p></p>
</div>









<div class="container3">
<p></p>
<?php
if(isset($_SESSION['id'])) {
    echo "<form method='POST' action='".setComments($conn)."'>
        <input type='hidden' name='uid' value='".$_SESSION['id']."'>
        <input type='hidden' name='date' value='".date('Y-m-d H:i:s')."'>
        <textarea name='message'></textarea>
        <button type='submit' name='commentSubmit'>Posalji</button>
    </form>";     
} else{
    echo "Morate biti prijavljeni da biste komentarisali!";
}

?>
<p></p>
</div>


<div class="container3">
    <p></p>
    <div class="cnt">
        <?php
    getComments($conn);
    ?>
    </div>
    <p></p>
    
</div>





<div class="container3">
    <p></p>
    <button class="AddMoreBtn">Prikaži još komentara</button>
    <p></p>
</div>

<div class="line"></div>

<footer>
  <p>&reg LiquorStore Serbia 2022 - All rights reserved </p>
</footer>



</body>
</html>