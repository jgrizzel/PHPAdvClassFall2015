<?php

class loggedIn {

    public function isLoggedIn($_SESSION) {
        if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
            echo '<a href="?logout=1">Logout</a>';
        } else {
            echo '<a href="index.php">Login</a>';
        }
        $logout = filter_input(INPUT_GET, 'logout');

        if ($logout == 1) {
            $_SESSION['loggedin'] = false;
            header('Location: index.php');
        }
    }
    
   
 public function emailIsValid($email) {
        return ( is_string($email) && !empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL) !== false );
    }
}
?>
<br />
<br/>

