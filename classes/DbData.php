<?php

class DbData 
{   
    public function dbConnect() {

        try {

            return new PDO("mysql:host=localhost;dbname=jesaispas;charset=utf8", "root", "Ereul9Aeng", array(\PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION));
        } catch (Exception $e) {

            die("Erreur : " . $e->getMessage());
        }
    }

    public function checkInputs($pseudo, $password) {
        
        $db = $this->dbConnect();
        // Récupérer les informations de la BDD selon le pseudo fournit
        $res_select = $db->prepare("SELECT id, pseudo, password FROM users WHERE pseudo = :pseudo");
        $res_select->execute(array(
            "pseudo" => $pseudo
        ));
        if ($res_select) {
            $data = $res_select->fetch();

            if (password_verify($password, $data["password"])) {
                
                return true;
            }
        }

        return false;
    }
}