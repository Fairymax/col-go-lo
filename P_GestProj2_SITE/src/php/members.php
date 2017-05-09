<?php
/**
 * Created by PhpStorm.
 * User: Lopezji
 * Date: 05.04.2017
 * Time: 14:28
 */

include('PDOLink.php');

# Création d'objet
$connector = new PDOLink();

# Requête SQL
$query = 'SELECT * FROM t_former';

# Met la requête dans une valeur
$req = $connector->executeQuery($query);

# Récupère le résultat d'une requête
$data = $connector->prepareData($req);
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
        <table cellpadding="10">
        <tr>
            <th align="left">
                <p>Prénom</p>
            </th>
            <th align="left">
                <p>Nom</p>
            </th>
            <th align="left">
                <p>Surnom</p>
            </th>
        </tr>

        <?php

        # Données du tableau
        foreach ($data as $former) {
            ?>

            <tr>
                <td>
                    <?php echo $former['forLastname'] ?>
                </td>
                <td>
                    <?php echo $former['forFirstname'] ?>
                </td>
                <td>
                    <?php echo $former['forLocation'] ?>
                </td>
                <td>
                    <a class="button" href="detail.php?idFormer=<?php echo $former['idformer'] ?>">Détails </a>
                </td>
                <td>
                    <a href="delete.php?idFormer=<?php echo $former['idFormer'] ?>"
                       onClick="return confirm(' Êtes-vous sur de vouloir supprimer cet enseignant? ')">Supprimer </a>
                </td>
                <td>
                    <a href="insertForm.php?idformer=<?php echo $former['idformer'] ?>&type=edit">Modifier </a>
                </td>
            </tr>
            <?php
        }
        # Ferme la connexion
        $connector->closeCursor($req);
        # Destruction de l'objet
        $connector->destructObject();
        ?>
        </table>
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
