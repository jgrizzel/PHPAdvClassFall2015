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
        include './models/IMessage.php';
        include './models/Message.php';
        
        $message =  new Message();
        
        $message->addMessage('test', 'this is my test msg!');
                
        var_dump($message->getAllMessages());
        echo '<br/>';
        var_dump($message instanceof Imessage);
        echo '<br/>';
        var_dump($message->removeMessage('test'));
        echo'<br/>';
        
             
        
        ?>
    </body>
</html>
