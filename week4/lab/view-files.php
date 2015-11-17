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
        <table class="table"> 
            <tr> <td> File Name </td> <td>File Type</td> <td>File Size</td> </tr>
            <?php foreach ($directory as $file) :        
                if (is_file($folder . DIRECTORY_SEPARATOR . $file)) : ?>
                    <tr>
                        <?php $type = $finfo->file($folder . DIRECTORY_SEPARATOR . $file); ?>
                        <td><?php echo $file; ?></td>
                        <td><?php echo $type; ?></td>
                        <td><?php echo filesize($folder . DIRECTORY_SEPARATOR . $file); ?></td>
                        
                    </tr>
                    <!-- <img src="./uploads/<?php echo $file; ?>" />-->

                <?php endif; ?>
            <?php endforeach; ?>
        </table>
        <div><a href="./upload-form.php">Upload Files</a></div>
    </body>
</html>
