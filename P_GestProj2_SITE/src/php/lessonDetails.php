<?php
/**
 * Created by PhpStorm.
 * User: colombofa
 * Date: 10.05.2017
 * Time: 15:27
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
<?php
$idLesson = $_GET["id"];
$connector = new PDOLink();
$req = $connector->executeQuery("SELECT idLesson, lesLabel, lesStartDate, lesDuration, lesLessonDate FROM t_lesson WHERE  idLesson = $idLesson");
$result = $connector->prepareData($req);
?>
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
                        <?php
                        echo "Détails du cours de ".$result[0]['lesLabel'];
                        ?>
                    </h1>
                    <?php
                    foreach($result as $lessons)
                    {
                        echo "Prochaine date : ".$lessons['lesStartDate'].'<br>';
                        echo "Durée d'un cours : ".$lessons['lesDuration'].'<br>';
                        echo "Nombre de cours : ".$lessons['lesLessonDate'];
                    }
                    ?>
                    <form action="#" method="post">
                        <input type="button" value="S'inscrire">
                    </form>
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
