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
        <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
    </head>
    <body>
        <div class="bg-danger">
        <?php
        include './models/IMessage.php';
        include './models/Message.php';
        include './models/ErrorMessage.php';        
        
        $errorMessage = new ErrorMessage();
        
        $errorMessage->addMessage('test', 'this is my test msg!');
                
        var_dump($errorMessage->getAllMessages());
        echo '<br/>';
        var_dump($errorMessage instanceof Imessage);
        echo '<br/>';
        var_dump($errorMessage->removeMessage('test'));
        echo'<br/>';
        var_dump($errorMessage->getAllMessages());
        echo'<br/>';
        
        
        
        ?>
        </div>
    </body>
</html>
