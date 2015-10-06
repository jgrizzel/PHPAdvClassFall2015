<!DOCTYPE html>
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
        <?php
        require_once '../functions/dbconnect.php';
        require_once '../functions/dbfunctions.php';


        $fullname = filter_input(INPUT_POST, 'fullname');
        $email = filter_input(INPUT_POST, 'email');
        $addressline1 = filter_input(INPUT_POST, 'addressline1');
        $city = filter_input(INPUT_POST, 'city');
        $state = filter_input(INPUT_POST, 'state');
        $zip = filter_input(INPUT_POST, 'zip');
        $birthday = filter_input(INPUT_POST, 'birthday');

        $zipRegex = '^\d{5}(?:[-\s]\d{4})?$';

        if (isPostRequest()) {
            if (empty($fullname)) {
                $message = 'Enter Name';
            } else if (filter_var($email, FILTER_VALIDATE_EMAIL) == false) {
                $message = 'Email NOT Valid';
            } else if (empty($addressline1)) {
                $message = 'Enter Address';
            } else if (empty($city)) {
                $message = 'Enter city';
            } else if (empty($state)) {
                $message = 'Enter State';
            } else if (!preg_match($zipRegex, $zip)) {
                $message = 'Zip Not Valid';
            } elseif (addAddress($fullname, $email, $addressline1, $city, $state, $zip, $birthday)) {
                $message = 'Address Added';
            }
        }

        include '../templates/messages.html.php';
        include '../templates/add-address.html.php';
        ?>
    </body>
</html>