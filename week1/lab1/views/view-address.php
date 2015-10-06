<?php
require_once '../functions/dbconnect.php';
require_once '../functions/dbfunctions.php';

include '../templates/messages.html.php';


$addresses = getAllAddress();

if (count($addresses) > 0) :
    ?>
    <h1>Addresses</h1>
    <ul>
        <?php foreach ($addresses as $key => $values) : ?>
            <li><?php echo $values['fullname']; ?> </li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>