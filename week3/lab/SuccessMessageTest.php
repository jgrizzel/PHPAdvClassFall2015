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
        <div class="bg-primary">
        <?php
       include './models/IMessage.php';
        include './models/Message.php';
        include './models/SuccessMessage.php';        
        
        $successMessage = new SuccessMessage();
        
        $successMessage->addMessage('test', 'this is my test msg!');
                
        var_dump($successMessage->getAllMessages());
        echo '<br/>';
        var_dump($successMessage instanceof Imessage);
        echo '<br/>';
        var_dump($successMessage->removeMessage('test'));
        echo'<br/>';
        var_dump($successMessage->getAllMessages());
        echo'<br/>';
        
        ?>
        </div>
    </body>
</html>
