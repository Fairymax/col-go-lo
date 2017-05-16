<?php
/**
 * Created by PhpStorm.
 * User: Lopezji
 * Date: 16.05.2017
 * Time: 13:32
 */

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include("include/head.php");# Inclu le fichier head.php?>
</head>

<body>

<div id="wrapper">
    <!-- Navigation -->
    <nav>
        <?php include("include/nav.php");# Inclu le fichier nav.php?>
    </nav>
    <div id="page-wrapper">
        <?php if(!isset($_SESSION['login']) ==""){?>
            <h1>Profil de <?php echo $_SESSION["login"]; ?> </h1>
        <?php } else{ ?>
            <h1>Accès Refusé</h1>
            <p>Cette page est réservée aux membres connectés. Veuillez vous identifier <a href="connection.php">ici </a>ou créer un compte <a href="creationCompte.php">ici</a>.</p>
        <?php } ?>

    </div>

    <!-- jQuery -->
    <script src="src/js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="src/js/bootstrap.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="src/js/plugins/morris/raphael.min.js"></script>
    <script src="src/js/plugins/morris/morris.min.js"></script>
    <script src="src/js/plugins/morris/morris-data.js"></script>

</body>

</html>
