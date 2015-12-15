<?php

header("Access-Control-Allow-Orgin: *");
header("Access-Control-Allow-Methods: GET, POST, UPDATE, DELETE");
header("Content-Type: application/json; charset=utf8");
try {
    $verb = filter_input(INPUT_SERVER, 'REQUEST_METHOD');
    $verbs_allowed = array('GET', 'POST', 'PUT', 'DELETE');

    if (!in_array($verb, $verbs_allowed)) {
        throw new Exception("Unexpected Header Requested " . $verb);
    }

    if (strpos(filter_input(INPUT_SERVER, 'CONTENT_TYPE'), "application/json") !== false) {
        $data = json_decode(trim(file_get_contents('php://input')), true);

        switch (json_last_error()) {
            case JSON_ERROR_NONE: {
                    
                }
                break;
            case JSON_ERROR_SYNTAX:
            case JSON_ERROR_UTF8:
            case JSON_ERROR_DEPTH:
            case JSON_ERROR_STATE_MISMATCH:
            case JSON_ERROR_CTRL_CHAR:
                throw new Exception(json_last_error_msg());
                break;
            default:
                throw new Exception('JSON encode error Unknown error');
                break;
        }
    }
    $config = array(
        'DB_DNS' => 'mysql:host=localhost;port=3306;dbname=PHPAdvClassFall2015',
        'DB_USER' => 'root',
        'DB_PASSWORD' => ''
    );

    $db = new PDO($config['DB_DNS'], $config['DB_USER'], $config['DB_PASSWORD']);
    $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

    if ('address' === $resource) {

        if ('GET' === $verb) {

            if (NULL === $id) {
                $stmt = $db->prepare("SELECT * FROM address");

                if ($stmt->execute() && $stmt->rowCount() > 0) {
                    $response['data'] = $stmt->fetchAll(PDO::FETCH_ASSOC);
                }
            } else {
                $stmt = $db->prepare("SELECT * FROM address where address_id = :address_id");
                $binds = array(":address_id" => $id);

                if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
                    $response['data'] = $stmt->fetch(PDO::FETCH_ASSOC);
                } else {
                    throw new InvalidArgumentException('Address ID ' . $id . ' was not found');
                }
            }
        }

        if ('POST' === $verb) {
            $stmt = $db->prepare("INSERT INTO address SET fullname = :fullname, email = :email, addressline1 = :addressline1, city = :city, state = :state, zip = :zip, birthday = :birthday");
            $binds = array(
                ":fullname" => $data['fullname'],
                ":email" => $data['email'],
                ":addressline1" => $data['addressline1'],
                ":city" => $data['city'],
                ":state" => $data['state'],
                ":zip" => $data['zip'],
                ":birthday" => $data['birthday']
            );

            if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
                $response['message'] = 'Address Added';
                $status = 201;
            } else {
                throw new Exception('Address could not be added');
            }
        }


        if ('PUT' === $verb) {

            if (NULL === $id) {
                throw new InvalidArgumentException('Address ID ' . $id . ' was not found');
            }
        }
    } else {
        throw new InvalidArgumentException($resource . ' Resource Not Found');
        
    }
} catch (InvalidArgumentException $e) {
    $response['errors'] = $e->getMessage();
    $status = 400;
} catch (Exception $e) {
    $response['errors'] = $e->getMessage();
    $status = 500;
}




