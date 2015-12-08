<?php require_once './autoload.php'; ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Upload Files</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
    </head>
    <body>
        <!-- The data encoding type, enctype, MUST be specified as below -->
        <form class="form-inline" role="form"enctype="multipart/form-data" action="upload.php" method="POST">
            <div class="form-group"> Send this file: <input name="upfile2" type="file" /></div>
            <div class="form-group"><input type="submit" value="Send File" /></div>
        </form>
        <div><a href="./view-files.php">View Files</a></div>

        <?php include './templates/errors.html.php'; ?>
        <?php include './templates/messages.html.php'; ?>
    </body>
</html>