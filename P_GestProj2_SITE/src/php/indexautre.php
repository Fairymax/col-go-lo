<?php
/**
 * ETML
 * Author: Lopezji
 * Date: 13.03.2017
 * Description: Page index
 */

?>
<html>
    <head>
        <title>Index</title>
    </head>
    <body>
        <?php
            include("PDOLink.php");#Inclu class PDOLink

            include("include/header.php");#Inclu header du site

            include("include/nav.php");#Inclu nav du site

            //Création objet
            $connector = new PDOLink();

            //Création requête
            $query = "SELECT idTeacher, teaLastname, teaFirstname, teaNickname FROM t_teacher";

            //Execute requete
            $req = $connector->executeQuery($query);

            //Recupère valeurs de requete
            $data = $connector->prepareData($req)
        ?>
        <section>
            <h3>Liste des enseignants</h3>
            <table>
            <!-- En-tête du tableau-->
            <tr>
                <td>
                    <h4>Firstname</h4>
                </td>

                <td>
                    <h4>Lastname</h4>
                </td>

                <td>
                    <h4>Nickname</h4>
                </td>

                <td>
                    <h4>Button</h4>
                </td>
            </tr>

            <?php
            foreach($data as $teacher)
            {
                ?>
                <tr>
                    <td>
                        <?php echo $teacher['teaFirstname'] ?>
                    </td>
                    <td>
                        <?php echo $teacher['teaLastname'] ?>
                    </td>
                    <td>
                        <?php echo $teacher['teaNickname'] ?>
                    </td>
                    <td>
                        <button type="button">details</button>
                    </td>
                </tr>

            <?php
            }
            //Ferme la requête
            $connector->closeCursor($req);
            //Met connexion à null
            $connector->destructObject();
            ?>
            </table>
        </section>
        <?php
            include("include/footer.php");#Inclu footer du site
        ?>
    </body>

</html>
