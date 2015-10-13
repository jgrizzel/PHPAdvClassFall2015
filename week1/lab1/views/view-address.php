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

            <table border ="0" cellspacing="2" cellpadding="2">
                <tr>
                    <td>
                        <?php echo $values['fullname']; ?>
                    </td>
                    <td>
                        <?php echo $values['email']; ?>
                    </td>
                    <td>
                        <?php echo $values['addressline1']; ?>
                    </td>
                    <td>
                        <?php echo $values['city']; ?>
                    </td>
                    <td>
                        <?php echo $values['state']; ?>
                    </td>
                    <td>
                        <?php echo $values['zip']; ?>
                    </td>
                    <td>
                        <?php echo $values['birthday']; ?>
                    </td>
                </tr>
            </table>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>