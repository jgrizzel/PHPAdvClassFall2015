<?php
require_once './autoload.php';
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>


    <h1> Sign Up! </h1>


<?php


if (isset($errors) && count($errors) > 0) { ?>
        <h2>Errors:</h2>
        <ul>
    <?php foreach ($errors as $error) { ?>
                <li><?php echo $error; ?></li>
            <?php } ?>
        </ul>
        <?php } ?>


    <form method="post">
        Email: <input name="email" value="" /> <br />
        Password: <input name="password" value="" /> <br />    

        <input type="submit" value="Submit" />
    </form>


</html>