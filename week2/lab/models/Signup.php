<?php

/**
 * Description of Signup
 *
 * @author GFORTI
 */
class Signup {

    private $db;

    function __construct() {

        $util = new Util();
        $dbo = new DB($util->getDBConfig());
        $this->setDb($dbo->getDB());
    }

    private function getDb() {
        return $this->db;
    }

    private function setDb($db) {
        $this->db = $db;
    }

    public function save($email, $password) {

        $stmt = $this->getDb()->prepare("INSERT INTO users set email = :email, password = :password, created = now()");

        $password = sha1($password);

        $binds = array(
            ":email" => $email,
            ":password" => $password
        );

        if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
            return true;
        }
        return false;
    }

    public function emailExist($email) {

        $dbs = $this->getDb()->prepare('select * from users where email = :email');
        $dbs->bindParam(':email', $email, PDO::PARAM_STR);

        if ($dbs->execute() && $dbs->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }

}
