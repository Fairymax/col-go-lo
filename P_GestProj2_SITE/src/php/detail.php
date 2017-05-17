<?php
/**
 * ETML
 * Auteur: Jimmy Lopez
 * Date: 09.05.2017
 * Description: Page qui dirige vers les details de la personne souhaitée
 */
// inclu le PDOLink.php
include('PDOLink.php');

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
        <h1 class="page-header">Détails</h1><br>
<?php

if (isset($_GET['idFormer'])) // Vérifie si la personne que l'on veut afficher est un enseignant
{
// Création d'objet
$connector = new PDOLink();

// Stocke l'id de l'enseignant
$id = $_GET['idFormer'];

# Requête SQL
$query = "SELECT * FROM t_former WHERE idFormer=" . $id;

# Met la requête dans une valeur
$req = $connector->executeQuery($query);

# Récupère le résultat d'une requête
$data = $connector->prepareData($req);

// Crée des valeurs contenant les information de l'enseignant
$firstname = $data[0]['forFirstname'];
$lastname = $data[0]['forLastname'];
$location = $data[0]['forLocation'];
$email = $data[0]['forEmail'];
$phoneNumber = $data[0]['forPhoneNumber'];
$profession = $data[0]['forProfession'];
$AVSNumber = $data[0]['forAVSNumber'];

?>
<table>
    <?php

    # Données du tableau
    foreach ($data as $former) {
        ?>
        <tr>
            <td>
                <?php echo "Prénom : ". $former['forFirstname'] ?>
            </td>
        </tr>
        <tr>
            <td>
                <?php echo "Nom : ". $former['forLastname'] ?>
            </td>
        </tr>
        <tr>
            <td>
                <?php echo  "Adresse : ". $former['forLocation'] ?>
            </td>
        </tr>
        <tr>
            <td>
                <?php echo  "Email : ". $former['forEmail'] ?>
            </td>
        </tr>
        <tr>
            <td>
                <?php echo  "Numéro de Tél. : ". $former['forPhoneNumber'] ?>
            </td>
        </tr>
        <tr>
            <td>
                <?php echo  "Profession : ". $former['forProfession'] ?>
            </td>
        </tr>
        <tr>
            <td>
                <?php echo  "Numéro d'AVS : ". $former['forAVSNumber'] ?>
            </td>
        </tr>
        <?php
    }
    # Ferme la connexion
    $connector->closeCursor($req);
    # Destruction de l'objet
    $connector->destructObject();
    }

    ///////////// Deuxième requete /////////////


    elseif (isset($_GET['idStudent'])) // Vérifie si la personne que l'on veut afficher est un étudiant
    {

    $id = $_GET['idStudent'];

    # Création d'objet
    $connector = new PDOLink();

    # Requête SQL
    $query = "SELECT * FROM t_student WHERE idStudent=" . $id;

    # Met la requête dans une valeur
    $req = $connector->executeQuery($query);

    # Récupère le résultat d'une requête
    $data = $connector->prepareData($req);

    // Crée des valeurs contenant les information de l'étudiant
    $firstname = $data[0]['stuFirstname'];
    $lastname = $data[0]['stuLastname'];
    $location = $data[0]['stuLocation'];
    $email = $data[0]['stuEmail'];
    $phoneNumber = $data[0]['stuPhoneNumber'];
    $AVSNumber = $data[0]['stuAVSNumber'];

    ?>
    <table>
        <?php

        # Données du tableau
        foreach ($data as $student) {
            ?>
            <tr>
                <td>
                    <?php echo "Prénom : ". $student['stuFirstname'] ?>
                </td>
            </tr>
            <tr>
                <td>
                    <?php echo  "Nom : ". $student['stuLastname'] ?>
                </td>
            </tr>
            <tr>
                <td>
                    <?php echo  "Adresse : ". $student['stuLocation'] ?>
                </td>
            </tr>
            <tr>
                <td>
                    <?php echo  "Email : ". $student['stuEmail'] ?>
                </td>
            </tr>
            <tr>
                <td>
                    <?php echo  "Numéro de Tel. : ". $student['stuPhoneNumber'] ?>
                </td>
            </tr>
            <tr>
                <td>
                    <?php echo  "Numéro d'AVS : ". $student['stuAVSNumber'] ?>
                </td>
            </tr>
            <?php
        }
        # Ferme la connexion
        $connector->closeCursor($req);
        # Destruction de l'objet
        $connector->destructObject();
        }
        ?>
    </table>
    <br><a class="button" href="members.php">Retour aux membres</a>
    </div>

