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
        <div class="bg-info">
            <?php
            session_start();

            include './models/IMessage.php';
            include './models/Message.php';
            include './models/FlashMessage.php';

            $flashMessage = new FlashMessage();

            $flashMessage->addMessage('test1', 'this is my test msg1!');
            $flashMessage->addMessage('test2', 'this is my test msg2!');
            $flashMessage->addMessage('test3', 'this is my test msg3!');

            var_dump($flashMessage->getAllMessages());
            echo '<br/>';
            var_dump($flashMessage instanceof Imessage);
            echo '<br/>';
            var_dump($flashMessage->removeMessage('test'));
            echo'<br/>';
            var_dump($flashMessage->getAllMessages());
            echo'<br/>';

            var_dump($_SESSION);
            ?>
    </body>
</html>
