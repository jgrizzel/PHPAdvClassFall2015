<?php

class FlashMessage extends Message {

    public function __construct() {
        if (!isset($_SESSION['flashmessages'])) {
          $this->setFlashMessages();
        }

        $this->messages = $_SESSION['flashmessages'];
    }

    public function addMessage($key, $msg) {
        parent::addMessage($key, $msg);
       $this->setFlashMessages();
    }

    public function removeMessage($key) {
        parent::removeMessage($key);
        $this->setFlashMessages();
    }

    public function getAllMessages() {
        $messages = $_SESSION['flashmessages'];
        $_SESSION['flashmessages']= array();
        return $messages;
    }

    public function removeAllMessages() {
        parent::removeAllMessages();
        $this->setFlashMessages();
    }
    
    private function setFlashMessages(){
        $_SESSION['flashmessages']= $this->getAllMessages();
    }

}
