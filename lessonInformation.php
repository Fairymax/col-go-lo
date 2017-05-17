<?php
/**
 * Created by PhpStorm.
 * User: colombofa
 * Date: 10.05.2017
 * Time: 14:32
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
                        Cours Proposés
                    </h1>
                    <?php
                    $connector = New PDOLink();
                    $query = "SELECT `idLesson`, `lesLabel` FROM `t_lesson`";
                    $req = $connector->executeQuery($query);
                    $result = $connector->prepareData($req);
                    ?>
                    <table>
                        <?php
                        foreach($result as $lessons) {
                            ?>
                            <tr>
                                <th>
                                    <?php
                                    echo $lessons["lesLabel"];
                                    ?>
                                </th>
                                <th>
                                    <a href="lessonDetails.php?id=<?php echo $lessons['idLesson']?>">Détails</a>
                                </th>
                            </tr>
                            <?php
                        }
                        ?>
                    </table>
                    <?php
                    $connector->closeCursor($req);
                    $connector->destructObject();
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
