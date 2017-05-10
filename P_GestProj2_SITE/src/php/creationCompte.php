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
                           <input type="text" name="lastname" >
                       </p>
                       <p>
                           Prénom: </br>
                           <input type="text" name="firstname" >
                       </p>
                       <p>
                           Adresse: </br>
                           <input type="text" name="adress" >
                       </p>
                       <p>Email: </br>
                           <input type="text" name="mail" >
                       </p>
                       <p>
                           Téléphone: </br>
                           <input type="text" name="phoneNumber" >
                       </p>
                       <p>
                           Vous êtes: </br>
                           <input type="radio" name="type" value="1"> Enseignant
                           <br>
                           <input type="radio" name="type" value="2"> Etudiant
                       </p>
                       <p>
                           Profession: </br>
                           <input type="text" name="prof" >
                       </p>
                       <p>
                           AVS: </br>
                           <input type="text" name="avsCode" >
                       </p>
                       <p>
                           Login: </br>
                           <input type="text" name="loginName" >
                       </p>
                       <p>
                           Mot de passe: </br>
                           <input type="password" name="password" >
                       </p>
                       <p>
                           <input type="submit" name="btnSend" value="Envoyer">
                       </p>

                       <?php
                        if(isset($_POST["btnSend"]))
                        {
                            //Partie de la requête des utilisateurs
                            //Création des variables
                            $connector = new PDOLink();

                            //Regarde qu'elle est le type de l'enregistrement pour définir ou va la requête sql
                            if($_POST['type'] == 1) {
                                $query = 'INSERT INTO `t_former`(`forLastname`, `forFirstname` , `forLocation`, `forEmail` , `forPhoneNumber` , `forProfession` , `forAVSNumber) VALUES ("' . $_POST['lastname'] . '","' . $_POST['firstname'] . '",
                                "' . $_POST['adress'] . '","' . $_POST['mail'] .'","'. $_POST['phoneNumber'].'","'. $_POST['prof'] . '","' . $_POST['avsCode'] .'")';
                            }else{
                                $query = 'INSERT INTO `t_student`(`stuLastname`, `stuFirstname` , `stuLocation`, `stuEmail` , `stuPhoneNumber` , `stuProfession` , `stuAVSNumber) VALUES ("' . $_POST['lastname'] . '","' . $_POST['firstname'] . '",
                                "' . $_POST['adress'] . '","' . $_POST['mail'] .'","'. $_POST['phoneNumber'].'","'. $_POST['prof'] . '","' . $_POST['avsCode'] .'")';
                            }
                            //Execute la requête pour l'ajout des informations dans la table respective
                            $req = $connector->executeQuery($query);
                            //Ferme et détruis la requête en cours pour liberer l'espace de stockage
                            $connector->closeCursor($req);
                            $connector->destructObject();


                            //Partie de la requête du compte
                            //Création des variables
                            $connector = new PDOLink();
                            $login = $_POST["loginName"];
                            //Convertis le mot de passe en Hash pour la sécurité
                            $password = password_hash($_POST["password"], PASSWORD_DEFAULT);

                            //Execute la requête pour la création de compte
                            $query = 'INSERT INTO `t_login`(`login`, `password`) VALUES ("' . $login . '","'. $password . '")';
                            $req = $connector->executeQuery($query);
                            //Ferme et détruis la requête en cours pour liberer l'espace de stockage
                            $connector->closeCursor($req);
                            $connector->destructObject();

                            echo "La création du compte à été un succès";
                            echo '<meta http-equiv="refresh" content="2;URL=index.php">';
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
