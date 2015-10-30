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
        $util = new Util();
        $dbc = new DB($util->getDBConfig());
        $db = $dbc->getDB();
        $validtor = new Validator();

        $login = new Login();

        $email = filter_input(INPUT_POST, 'email');
        $password = filter_input(INPUT_POST, 'password');

        $errors = array();

        if ($util->isPostRequest()) {

            if (!$validtor->emailIsValid($email)) {
                $errors[] = 'Email is not valid';
            }


            if (!$validtor->passwordIsValid($password)) {
                $errors[] = 'Please enter a password';
            }



            if (count($errors) <= 0) {
                $user_id = $login->verify($email, $password);
                if ($user_id > 0) {
                    $_SESSION['user_id'] = $user_id;
                    header('Location:admin.php');
                } else {
                    $message = 'Please try to log in again';
                }
            }
        }
        include './templates/errors.html.php';
        include './templates/messages.html.php';
        ?>
<div class="container">
        <h1>Login Form</h1>
</div>
<?php include './templates/login-form.html.php'; ?>

    </body>
</html>