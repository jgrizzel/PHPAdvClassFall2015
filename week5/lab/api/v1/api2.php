<?php

include_once './autoload.php';

$RestServer = new RestServer();
try {
    $RestServer->setStatus(200);
    $id = $RestServer->getId();
    $resource = $RestServer->getResource();
    $verb = $RestServer->getVerb();
    $data = $RestServer->getServerData();

    if ('corps' === $resource) {
        $corps = new Corps();
        $results = null;


        if ($verb === 'GET') {
            if ($id === NULL) {
                $results = $corps->getAll();
            } else {
                $results = $corps->get($id);
            }
        }

        if ($verb === 'PUT') {

            if ($id === NULL) {
                throw new InvalidArgumentException('Corporation ID ' . $id . ' was not found');
            } else {
                $results = $corps->put($data, $id);
            }
        }

        if ($verb === 'POST') {


            if ($corps->post($data)) {
                $RestServer->setMessage('Corporation  Added');
                $RestServer->setStatus(201);
            } else {
                throw new Exception('Corporation not added');
            }
        }

        if ($verb === 'DELETE') {

            if ($id === NULL) {
                throw new InvalidArgumentException('No ID');
            } else {
                if ($resourceCorps->delete($id)) {
                    $RestServer->setMessage($id . ' deleted');
                } else {
                    throw new InvalidArgumentException($id . ' not deleted');
                }
            }
        }

        $RestServer->setData($results);
    }
} catch (Exception $ex) {
    $RestServer->setErrors($ex->getMessage());
    $RestServer->setStatus(500);
}

$RestServer->outputReponse();


