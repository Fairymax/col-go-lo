<?php
/**
 * Created by PhpStorm.
 * User: Lopezji
 * Date: 05.04.2017
 * Time: 14:28
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

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Connexion
                    </h1>
                    <table>
                        <tr>
                            <td class="Cell">Identifiant:</td>
                            <td class="Cell"><input type="text" name="pseudo" /></td>
                        </tr>
                        <tr>
                            <td class="Cell">Mot de passe:</td>
                            <td class="Cell"><input type="password" name="password" /></td>
                        </tr>
                    </table>
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
