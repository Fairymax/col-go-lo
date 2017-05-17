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
        <h1 class="page-header">Liste des membres</h1><br>
        <h2>Enseignants</h2><br>
        <!-- Entête de tableau -->
        <table cellpadding="10">
            <tr>
                <th align="left">
                    <p>Prénom</p>
                </th>
                <th align="left">
                    <p>Nom</p>
                </th>
                <th align="left">
                    <p>Adresse</p>
                </th>
            </tr>

            <?php

            // Données du tableau d'enseignants
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
                        <a class="button" href="detail.php?idFormer=<?php echo $former['idFormer'] ?>"> Détails </a>
                    </td>
                </tr>
                <?php
            } ?>
        </table>
        <?php
        # Ferme la connexion
        $connector->closeCursor($req);
        # Destruction de l'objet
        $connector->destructObject();

        //////////////////////// Deuxième requête ////////////////////////

        # Création d'objet
        $connector = new PDOLink();

        # Requête SQL
        $query = 'SELECT * FROM t_student';

        # Met la requête dans une valeur
        $req = $connector->executeQuery($query);

        # Récupère le résultat d'une requête
        $data = $connector->prepareData($req);
        ?>
        <br><h2>Élèves</h2><br>
        <table cellpadding="10">
            <tr>
                <th align="left">
                    <p>Prénom</p>
                </th>
                <th align="left">
                    <p>Nom</p>
                </th>
                <th align="left">
                    <p>Adresse</p>
                </th>
            </tr>
            <?php
            // Données du tableau d'étudiants
            foreach ($data as $student) {
                ?>

                <tr>
                    <td>
                        <?php echo $student['stuLastname'] ?>
                    </td>
                    <td>
                        <?php echo $student['stuFirstname'] ?>
                    </td>
                    <td>
                        <?php echo $student['stuLocation'] ?>
                    </td>
                    <td>
                        <a class="button" href="detail.php?idStudent=<?php echo $student['idStudent'] ?>"> Détails </a>
                    </td>
                </tr>
                <?php
            } ?>
        </table>
    </div>
    <?php
    # Ferme la connexion
    $connector->closeCursor($req);
    # Destruction de l'objet
    $connector->destructObject();
    ?>

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
