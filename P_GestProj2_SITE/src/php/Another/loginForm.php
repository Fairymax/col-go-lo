<?php
//PDO
include ("PDOLink.php");
/**
 * Created by PhpStorm.
 * User: gomesan
 * Date: 09.05.2017
 * Time: 14:12
 */
class loginForm
{
    //Variable
    private $data;
    private $password = "";

    /**
     * Vérifie que le login et le password sont bien ceux de la base de donnée
     */
    function loginPDO()
    {
        $bdd = new PDOLink();

        //2ème : Faire la requête
        //Inserer la requête dans un variable "query"
        $query = 'SELECT login, password FROM t_login';

        //Lance la requête
        $reqs = $bdd->executeQuery($query);

        foreach($reqs as $user){
            $item[] = array(
                'login' => $user[0],
                'password' => $user[1]
            );
        }

        $this->data = $item;

        //Fermer et supprime l'ouverture de la base de donnée
        $bdd->closeCursor($reqs);
        $bdd->destructObject();
    }

    /**
     * Vérification du login de connexion
     * @param $loginForm
     * @return bool
     */
    function checkPseudo($loginForm){

        foreach($this->data as $check) {
            if($loginForm == $check['login']){
                $this->password = $check['password'];
                return true;
            }
        }
    }

    /**
     * Vérification du mot de passe de connexion
     * @param $pass
     * @return bool
     */
    function checkPassword($pass){
        if($this->password != "") {
            if(password_verify($pass,trim($this->password))){
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
}