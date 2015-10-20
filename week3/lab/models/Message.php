<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Message
 *
 * @author Joshua
 */
class Message implements IMessage {

    private $messages = array();

    public function addMessage($key, $msg) {
        $this->messages[$key] = $msg;
        
    }

    public function removeMessage($key) {
        unset($this->messages[$key]);
    }

    public function getAllMessages() {
        return $this->messages;
    }

}
