<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        $folder = './uploads';
        $directory = scandir('./uploads');

        $finfo = new finfo(FILEINFO_MIME_TYPE);
        ?>

        <?php foreach ($directory as $file) : ?>        
            <?php if (is_file($folder . DIRECTORY_SEPARATOR . $file)) : ?>
                <p><?php
        $type = $finfo->file($folder . DIRECTORY_SEPARATOR . $file);
        echo 'File Name: ' . $file;
        echo 'File Type: ' . $type;
        echo 'File Size: ' . filesize($folder . DIRECTORY_SEPARATOR . $file);
         
                ?></p>
                <img src="./uploads/<?php echo $file; ?>" />

            <?php endif; ?>
        <?php endforeach; ?>

    </body>
</html>
