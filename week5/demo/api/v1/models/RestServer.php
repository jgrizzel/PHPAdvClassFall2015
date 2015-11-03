<?php

/**
 * Description of RestServer
 *
 * @author Joshua
 */
class RestServer {

    //always start class with constructor
    private $status = 200;
    private $status_codes = array(
        200 => 'OK',
        201 => 'Created',
        202 => 'Accepted',
        400 => 'Bad Request',
        401 => 'Unauthorized',
        403 => 'Access Forbidden',
        404 => 'Not Found',
        409 => 'Conflict',
        500 => 'Internal Server Error',
    );
    
    private $response = array(
        "message" => NULL,
        "errors" => NULL,
        "data" => NULL
    );
    
    function getStatus() {
        return $this->status;
    }

    function setStatus($status) {
        
        if ( !in_array($status, $this->status_codes) ) {
        throw new Exception("Invalid Status Code". $status);
    }
        $this->status = $status;
    }

    
    function __construct() {
        header("Access-Control-Allow-Orgin: *");
        header("Access-Control-Allow-Methods: GET, POST, UPDATE, DELETE");
        header("Content-Type: application/json; charset=utf8");
    }

    public function outputResponse() {
        header("HTTP/1.1 " . $this->getStatus() . " " . $this->status_codes[$this->getStatus()]);
        echo json_encode($this->response, JSON_PRETTY_PRINT);
    }

}
