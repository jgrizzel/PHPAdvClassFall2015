<?php require_once './autoload.php'; ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>View Files</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
    </head>
    <body>
        <?php
        $folder = './uploads';
        $directory = scandir('./uploads');
        $isPost = new Filehandler();

        if ($isPost->isPost()) {
            $filename = filter_input(INPUT_POST, 'filename');
            try {
                $deleteFile = new Filehandler();
                $deleteFile->deleteFiles($filename);
                $message = 'File was deleted successfully.';
            } catch (Exception $e) {
                $errors[] = $e->getMessage();
            }
        }

        $finfo = new finfo(FILEINFO_MIME_TYPE);
        ?>
        <table class="table"> 
            <tr> <td> File Name </td> <td>File Type</td> <td>File Size</td> </tr>
            <?php
            foreach ($directory as $file) :
                if (is_file($folder . DIRECTORY_SEPARATOR . $file)) :
                    ?>
                    <tr>
                        <?php $type = $finfo->file($folder . DIRECTORY_SEPARATOR . $file); ?>
                        <td><?php echo $file; ?></td>
                        <td><?php echo $type; ?></td>
                        <td><?php echo filesize($folder . DIRECTORY_SEPARATOR . $file); ?></td>
                        <td><form action="#" method="POST">
                                <input class="btn" type="submit" value="Delete" />
                                <input type="hidden" value="<?php echo basename($file) ?>" name="filename"/>
                            </form></td>

                    </tr>
                    <!-- <img src="./uploads/<?php echo $file; ?>" />-->

                <?php endif; ?>
            <?php endforeach; ?>
            <?php include './templates/errors.html.php'; ?>
            <?php include './templates/messages.html.php'; ?>
        </table>
        <div><a href="./upload-form.php">Upload Files</a></div>
    </body>
</html>
