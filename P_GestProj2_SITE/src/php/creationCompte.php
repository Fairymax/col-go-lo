<?php
/**
 * Created by PhpStorm.
 * User: Gomesan
 * Date: 09.05.2017
 * Description:
 */

?>

<!--PDO-->
<?php
include ("PDOLink.php");
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
                        Inscription
                    </h1>
                    <!-- Formulaire pour la création de compte -->
                   <form name="creationCompte" action="#" method="post">
                       <p>
                           Nom: </br>
                           <input type="text" name="loginName" >
                       </p>
                       <p>
                           Mot de passe: </br>
                           <input type="text" name="password" >
                       </p>
                       <p>
                           <input type="submit" name="btnSend" value="Envoyer">
                       </p>

                       <?php
                        if(isset($_POST["btnSend"]))
                        {
                            //Création des variables
                            $connector = new PDOLink();
                            $login = $_POST["loginName"];
                            //Convertis le mot de passe en Hash pour la sécurité
                            echo $password = password_hash($_POST["password"], PASSWORD_DEFAULT);

                            //Execute la requête pour la création de compte
                            $query = 'INSERT INTO `t_login`(`login`, `password`) VALUES ("' . $login . '","'. $password . '")';
                            $req = $connector->executeQuery($query);
                            //Ferme et détruis la requête en cours pour liberer l'espace de stockage
                            $connector->closeCursor($req);
                            $connector->destructObject();
                        }
                       ?>
                   </form>
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
