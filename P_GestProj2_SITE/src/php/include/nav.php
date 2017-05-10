<?php
session_start();
/**
 * ETML
 * Author: Lopezji
 * Date: 13.03.2017
 * Description: Nav du site
 */
?>

<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="index.php">Navigateur</a>
    </div>
    <!-- Top Menu Items -->

    <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
    <div class="collapse navbar-collapse navbar-ex1-collapse">
        <ul class="nav navbar-nav side-nav">
            <li class="active">
                <a href="index.php"><i class="fa fa-fw fa-home"></i> Accueil</a>
            </li>
            <?php
                echo '<li>';
                if(isset($_SESSION['login']) =="")
                {
                    echo '<a href="connection.php"><i class="fa fa-fw fa-bar-chart-o"></i> Connexion</a>';
                }else{
                    echo '<a href="deconnection.php"><i class="fa fa-fw fa-bar-chart-o"></i> Déconnexion</a>';
                }
                echo '</li>';

            ?>
            <li>
                <a href="members.html"><i class="fa fa-fw fa-table"></i> Membres</a>
            </li>
            <li>
                <a href="forms.html"><i class="fa fa-fw fa-edit"></i> Forms</a>
            </li>
        </ul>
    </div>
    <!-- /.navbar-collapse -->
</nav>
