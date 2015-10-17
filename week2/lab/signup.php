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
            $signup = new Signup();
            
            $email= filter_input(INPUT_POST, 'email');
        ?>
        
        <h1>Signup Form</h1>
        
        <?php include './templates/login-form.html.php'; ?>
        
    </body>
</html>
