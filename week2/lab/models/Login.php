<?php


/**
 * Description of Login
 *
 * @author GFORTI
 */
class Login {
    //put your code here
    
    
    public function verify($email, $password) {
        
        $stmt = $this->getDb()->prepare("SELECT * FROM users WHERE email = :email");
                
        $binds = array(
            ":email" => $email
        );

        if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
            $results = $stmt->fetch(PDO::FETCH_ASSOC);
            if ( password_verify($password, $results['password']) ){
                return $results['user_id'];   
            }
        }
        
        return 0;
    }
    
    
}
