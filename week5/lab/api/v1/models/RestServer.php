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
    private $resource;
    private $id;
    private $verb;
    private $verbs_allowed;
    private $serverData;

    function getStatus() {
        return $this->status;
    }

    function setStatus($status) {

        if (!array_key_exists($status, $this->status_codes)) {
            throw new Exception("Invalid Status Code " . $status);
        }
        $this->status = $status;
    }

    public function setMessages($messages) {
        $this->response["message"] = $messages;
    }

    public function setErrors($errors) {
        $this->response["errors"] = $errors;
    }

    public function setData($data) {
        $this->response["data"] = $data;
    }

    function getResource() {
        return $this->resource;
    }

    function getId() {
        return $this->id;
    }

    private function getRestArgs() {
        $endpoint = filter_input(INPUT_GET, 'endpoint');
        $restArgs = explode('/', rtrim($endpoint, '/'));
        $this->resourse = array_shift($restArgs);
        $this->id = null;

        if (isset($restArgs[0]) && is_numeric($restArgs[0])) {
            $id = intval($restArgs[0]);
        }
    }

    public function getVerb() {
        return $this->verb;
    }

    private function setVerb() {
        /* Lets get the verb to know what action the user wants to perform */

        $this->verb = filter_input(INPUT_SERVER, 'REQUEST_METHOD');
        $this->verbs_allowed = array('GET', 'POST', 'PUT', 'DELETE');

        if (!in_array($this->verb, $this->verbs_allowed)) {
            throw new Exception("Unexpected Header Requested " . $this->verb);
        }
    }

    function __construct() {
        header("Access-Control-Allow-Orgin: *");
        header("Access-Control-Allow-Methods: GET, POST, UPDATE, DELETE");
        header("Content-Type: application/json; charset=utf8");
        $this->getRestArgs();
        $this->setVerb();
        $this->getserverData();
    }

    public function outputResponse() {
        header("HTTP/1.1 " . $this->getStatus() . " " . $this->status_codes[$this->getStatus()]);
        echo json_encode($this->response, JSON_PRETTY_PRINT);
    }

    public function getserverData() {
        return $this->serverData;
    }

    function setserverData() {
        /* set 'always_populate_raw_post_data = -1' so you can pass json
          to your rest server instead of post data */
        if (strpos(filter_input(INPUT_SERVER, 'CONTENT_TYPE'), "application/json") !== false) {
            $this->serverData = json_decode(trim(file_get_contents('php://input')), true);


            switch (json_last_error()) {
                case JSON_ERROR_NONE: { //data UTF-8 compliant
                        //tell client to recieve JSON data and send           
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
    }

}
