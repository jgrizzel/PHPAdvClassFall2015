<?php require_once './autoload.php'; ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
       
            $util = new Util();
            $db = new DB($util->getDBConfig());
            $login = new Login();
            
            $email= filter_input(INPUT_POST, 'email');
        ?>
        
        <h1>Login Form</h1>
        
        <?php include './templates/login-form.html.php'; ?>
        
    </body>
</html>
