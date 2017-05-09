<?php
/**
 * Created by PhpStorm.
 * User: Lopezji
 * Date: 05.04.2017
 * Time: 14:28
 */
include ("Another/loginForm.php");
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

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Connexion
                    </h1>
                    <form name="loginForm" action="#" method="post">
                        <p>
                            Login: </br>
                            <input type="text" name="loginName" >
                        </p>
                        <p>
                            Mot de passe: </br>
                            <input type="password" name="password" >
                        </p>
                        <p>
                            <input type="submit" name="btnSend" value="Connexion">
                        </p>
                        <p>
                            <a href="creationCompte.php">Créer un utilisateur</a>
                        </p>

                        <?php
                            if(isset($_POST["btnSend"]))
                            {
                                //Créer une connexion avec la class modele
                                $modele = new loginForm();
                                $login = $_POST["loginName"];
                                $pwd = htmlspecialchars(trim($_POST["password"]));

                                // on teste si nos variables sont définies
                                if (isset($login) && isset($pwd))
                                {
                                    //Se connecte à la BD
                                    $modele->loginPDO();

                                    // on vérifie les informations du formulaire, à savoir si le pseudo saisi est bien un pseudo autorisé, de même pour le mot de passe
                                    if ($modele->checkPseudo($login) && $modele->checkPassword($pwd))
                                    {
                                        // on enregistre les paramètres de notre visiteur comme variables de session ($login et $pwd) (notez bien que l'on utilise pas le $ pour enregistrer ces variables)
                                        $_SESSION['login'] = $login;
                                        echo "Vous vous êtes connecté";
                                        echo '<meta http-equiv="refresh" content="1;URL=index.php">';
                                    }else
                                    {
                                        echo  "Les identifiants rentrée sont erronnée";
                                    }
                                }
                            }
                        ?>
                </div>
            </div>
        </div>
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
