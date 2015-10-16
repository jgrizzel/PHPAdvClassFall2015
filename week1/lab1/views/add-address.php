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

        $nameRegex = '/^[A-Za-z0-9 ]{3,20}$/';
        $zipRegex = '/^[0-9]{5}(?:-[0-9]{4})?$/';
        $stateRegex = '/^[A-Za-z0-9 ]{2}$/';
        
        $message = array();

        if (isPostRequest()) {
            if (!preg_match($nameRegex, $fullname)) {
                $message[] = 'Enter Name';
            }  if (filter_var($email, FILTER_VALIDATE_EMAIL) == false) {
                $message[] = 'Email NOT Valid';
            }  if (!preg_match($nameRegex, $addressline1)) {
                $message[] = 'Enter Address';
            }  if (!preg_match($nameRegex,$city)) {
                $message[] = 'Enter city';
            }  if (!preg_match($stateRegex, $state)) {
                $message[] = 'Enter State';
            }  if (!preg_match($zipRegex, $zip)) {
                $message[] = 'Zip Not Valid';
            }  
            
            if (addAddress($fullname, $email, $addressline1, $city, $state, $zip, $birthday) && $message ===0){
                $message[] = 'Address Added';
            }
        }

        include '../templates/messages.html.php';
        include '../templates/add-address.html.php';
        ?>
    </body>
</html>