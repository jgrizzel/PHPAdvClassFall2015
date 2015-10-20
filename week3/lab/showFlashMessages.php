<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        session_start();
        
            include './models/IMessage.php';
            include './models/Message.php';
            include './models/FlashMessage.php';

            $flashMessage = new FlashMessage();
            
            $messages = $flashMessage->getAllMessages();
            
            print_r($messages);
        // put your code here
        ?>
    </body>
</html>
