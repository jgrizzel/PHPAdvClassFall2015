<?php require_once './autoload.php'; ?>
<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
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
            $upload->setName($ext, 'upfile2');
            $message = 'File Successfully Uploaded';
        } catch (RuntimeException $e) {

            $errors[] = $e->getMessage();
        }
        ?>

        <?php include './templates/errors.html.php'; ?>
        <?php include './templates/messages.html.php'; ?>
        <div><a href="./view-files.php">View Files</a></div>
        <div><a href="./upload-form.php">Upload Files</a></div>
    </body>

</html>
