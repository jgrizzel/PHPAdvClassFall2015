<?php require_once './autoload.php'; ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" integrity="sha512-dTfge/zgoMYpP7QbHy4gWMEGsbsdZeCXz7irItjcC3sPUFtf0kuFbDz/ixG7ArTxmDjLXDmezHubeNikyKGVyQ==" crossorigin="anonymous">

        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css" integrity="sha384-aUGj/X2zp5rLCbBxumKTCw2Z50WgIr1vs/PFN4praOTvYXWlVyh2UtNUU0KAUhAX" crossorigin="anonymous">

        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js" integrity="sha512-K1qjQ+NcF2TYO/eI3M6v8EiNYZfA95pQumfvcVrTHtwQVDG+aHRqLi/ETn2uB+1JqwYqVG3LIvdm9lj6imS/pQ==" crossorigin="anonymous"></script>
    </head>
    <body>
        <?php
        $email = filter_input(INPUT_POST, 'email');
        $password = filter_input(INPUT_POST, 'password');


        $util = new Util();
        $validtor = new Validator();
        $signup = new Signup();

        $errors = array();

        if ($util->isPostRequest()) {

            if (!$validtor->emailIsValid($email)) {
                $errors[] = 'Email is not valid';
            }

            if ($signup->emailExist($email)) {
                $errors[] = 'Email already exist.';
            }


            if (!$validtor->passwordIsValid($password)) {
                $errors[] = 'Please enter a password';
            }



            if (count($errors) <= 0) {

                if ($signup->save($email, $password)) {
                    $message = 'Signup complete';
                } else {
                    $message = 'Signup failed';
                    echo '<a href="index.php">Sign In</a>';
                }
            }
        }
        ?>

        <?php include './templates/errors.html.php'; ?>
        <?php include './templates/messages.html.php'; ?>
        <div class="container">
            <h1>Sign Up Form</h1>

        </div>
        <?php include './templates/login-form.html.php';
        ?>

    </body>
</html>