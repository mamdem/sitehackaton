<?php
session_start();


session_destroy();

?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HACKATHON-PTN</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

    <link rel="stylesheet" href="./src/style.css">

</head>

<body>
    <!-- nav -->
    <div class="navbar-fixed">
        <nav>
            <div class="nav-wrapper bg_nav z-depth-2 ">
                <a href="index.php" class="col s6 brand-logo black-text">
                    <img src="src/images/logo_hackathon_ptn.png" alt="erreur de chargement du logo" class="logo">
                    <!-- <span class="texte_logo">HACKATHON</span> -->
                </a>
                <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons white-text">menu</i></a>
                <ul class="right hide-on-med-and-down">
                    <li><a href="index.php#paragraph_0" class="sidenav-close li_nav black-text">Accueil</a></li>
                    <li><a href="index.php#paragraph_1" class="sidenav-close li_nav black-text">Hackathon PTN</a></li>
                    <li><a href="index.php#paragraph_2" class="sidenav-close black-text">Programme</a></li>
                    <li><a href="index.php#paragraph_3" class="sidenav-close li_nav black-text">Compétition</a></li>
                    <li><a href="index.php#paragraph_4" class="sidenav-close li_nav black-text">Speakers</a></li>
                    <li><a href="index.php#paragraph_5" class="sidenav-close li_nav black-text">Partenaires</a></li>
                    <li><a href="index.php#paragraph_6" class="sidenav-close li_nav black-text">Le PTN</a></li>
                    <li><a href="index.php#paragraph_7" class="sidenav-close li_nav black-text">Contact</a></li>
                </ul>
            </div>
        </nav>
    </div>
    <!-- sidenav -->
    <ul class="sidenav bg" id="mobile-demo">
        <div class="">
            <h3>HACKATHON</h3>
        </div>
        <br>
        <hr>
        <li><a href="index.php#paragraph_0" class="black-text">Accueil</a></li>
        <li><a href="index.php#paragraph_1" class="black-text">Hackathon PTN</a></li>
        <li><a href="index.php#paragraph_2" class=" black-text">Programme</a></li>
        <li><a href="index.php#paragraph_3" class=" black-text">Compétition</a></li>
        <li><a href="index.php#paragraph_4" class=" black-text">Speakers</a></li>
        <li><a href="index.php#paragraph_5" class=" black-text">Partenaires</a></li>
        <li><a href="index.php#paragraph_6" class=" black-text">Le PTN</a></li>
        <li><a href="index.php#paragraph_7" class=" black-text">Contact</a></li>
    </ul>
    <!-- content -->
    <div class="container">
        <div class="card-panel bg center">
            <h3>Déconnection effectuée avec succes</h3>
            <a href="index.php"> Accueil</a>
            <br>
            <a href="postuler.php"> Postuler</a>
        </div>
    </div>
    <br><br><br><br><br><br><br>
    <!-- footer -->
    <?php
    require_once 'sections/footer.php';
    ?>
</body>
<script src="main.js"></script>


<script type="text/javascript">

</script>

</html>