<?php

/**
 * ETML
 * Author: Lopezji
 * Date: 20.03.2017
 * Description:
 */

include ('Another/config.php');

class PDOLink
{

    private $connector;

    function __construct(){
        //Connecter base de donnée:
        $this->connector=new PDO('mysql:host='.$GLOBALS['config']['host'].';dbname='.$GLOBALS['config']['dbname']
            ,$GLOBALS['config']['user'],
            $GLOBALS['config']['pass']);
    }
    function executeQuery($query){
        //Préparation requête à executer
        $req = $this->connector->prepare($query);
        //Execute requete
        $req->execute();
        return $req;
    }

    function prepareData($req){
        //Récupération données
        return $req->fetchAll(PDO::FETCH_ASSOC);
    }

    function closeCursor($req){
        //Ferme la requete
        $req->closeCursor();
    }

    function destructObject(){
        //Met connexion à null
        $this->connector = null;
    }
}