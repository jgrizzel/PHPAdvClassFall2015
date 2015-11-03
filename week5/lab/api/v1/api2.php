<?php

include_once './models/RestServer.php';

$restServer = new RestServer();
try {
    $restServer->setStatus(200);
    $restServer->getId();
    $restServer->getResource();
} catch (Exception $ex) {
    $restServer->setErrors($ex->getMessage());
}
$restServer->outputResponse();


