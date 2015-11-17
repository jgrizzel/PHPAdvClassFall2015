<?php require_once './autoload.php'; ?>
<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">        
    </head>
    <body>
        <?php
        

        try {
            $upload = new Filehandler();
            $upload->isValidParameters('upfile2');
            $upload->isValidSize('upfile2');
           $ext = $upload->isValidType('upfile2');
            $upload->setName($ext,'upfile2');
            echo 'file uploaded';
        } catch (RuntimeException $e) {

            echo $e->getMessage();
        }
        ?>
    </body>
</html>
