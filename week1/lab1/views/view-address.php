<?php
require_once '../functions/dbconnect.php';
require_once '../functions/dbfunctions.php';

include '../templates/messages.html.php';


$addresses = getAllAddress();

if (count($addresses) > 0) :
    ?>
    <h1>Addresses</h1>
    <ul>
        

        <table  class="table table-bordered">
                <tr>
                    <th>
                        Full Name
                    </th>
                    
                    <th>
                        Email
                    </th>
                    
                    <th>
                        Address
                    </th>
                    
                    <th>
                        City
                    </th>
                    <th>
                        State
                    </th>
                    <th>
                        Zip
                    </th>
                    <th>
                        Birthday
                    </th>
                </tr>
                <?php foreach ($addresses as $key => $values) : ?>
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