<?php

/**
 * Description of Login
 *
 * @author GFORTI
 */
class Login {

    protected $db = null;

    public function __construct() {
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

    public function verify($email, $password) {

        $stmt = $this->getDb()->prepare("SELECT * FROM users WHERE email = :email");
        $binds = array(
            ":email" => $email
        );

        if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
            $results = $stmt->fetch(PDO::FETCH_ASSOC);
            if (password_verify($password, $results['password'])) {
                return $results['user_id'];
            }
        }

        return 0;
    }

}
