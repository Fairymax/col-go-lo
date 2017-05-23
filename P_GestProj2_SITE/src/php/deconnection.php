<?php
/**
 * Created by PhpStorm.
 * User: gomesan
 * Date: 09.05.2017
 * Description: Page qui permet de fermer la session active
 */

//On lance la session
session_start();

// On détruit les variables de notre session
session_unset ();

// On détruit notre session
session_destroy ();

// On redirige le visiteur vers la page d'accueil
header ('location: index.php');
?>