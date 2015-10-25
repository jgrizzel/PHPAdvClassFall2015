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
            $dbc = new DB($util->getDBConfig());
            $db = $dbc->getDB();
            
            /*
            $stmt = $db->prepare("UPDATE test set dataone = :dataone, datatwo = :datatwo where id = :id");
                
            $binds = array(
                ":id" => $id,
                ":dataone" => $dataone,
                ":datatwo" => $datatwo
            );

            if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
               $result = 'Record updated';
            }*/
            
            $login = new Login();
            
            $email= filter_input(INPUT_POST, 'email');
        ?>
        
        <h1>Login Form</h1>
        
        <?php include './templates/login-form.html.php'; ?>
        
    </body>
</html>