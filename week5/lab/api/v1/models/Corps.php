<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Corps
 *
 * @author jgriz
 */
class Corps implements iRestModel {

    private $db;

    function __construct() {

        $util = new Util();
        $dbo = new DB($util->getDBConfig());
        $this->setDb($dbo->getDB());
    }

    private function getDb() {
        return $this->db;
    }

    private function setDb($db) {
        $this->db = $db;
    }

    public function getAll() {
        $stmt = $this->getDb()->prepare("SELECT * FROM corps");
        $results = array();
        if ($stmt->execute() && $stmt->rowCount() > 0) {
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        return $results;
    }

    public function get($id) {

        $stmt = $this->getDb()->prepare("SELECT * FROM corps where id=:id");
        $binds = array(":id" => $id);

        $results = array();
        if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
            $results = $stmt->fetch(PDO::FETCH_ASSOC);
        }

        return $results;
    }

    public function post($data) {
        $stmt = $this->getDb()->prepare("INSERT INTO corps SET corp = :corp, incorp_dt = :incorp_dt, email = :email, owner = :owner, phone = :phone, location = :location");
        $binds = array(
            ":corp" => $data['corp'],
            ":incorp_dt" => date("F j, Y, g:i a"),
            ":email" => $data['email'],
            ":owner" => $data['owner'],
            ":phone" => $data['phone'],
            ":location" => $data['location']
        );
        if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
            return true;
        }
        return false;
    }

    public function put($data, $id) {
        $dataResults = array();
        $stmt = $this->getDb()->prepare("UPDATE corps SET corp = :corp, incorp_dt = :incorp_dt, email = :email, owner = :owner, phone = :phone, location = :location WHERE id= :id  ");
        $binds = array(
            ":id" => $id,
            ":corp" => $data['corp'],
            ":incorp_dt" => $data ['incorp_dt'],
            ":email" => $data['email'],
            ":owner" => $data['owner'],
            ":phone" => $data['phone'],
            ":location" => $data['location']
        );
        if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
            $dataResults = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        return $dataResults;
    }

    public function delete($id) {
        $results = false;
        $stmt = $this->getDb()->prepare("DELETE FROM corps Where id = :id");
        $binds = array(":id" => $id);
        if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
            $results = true;
        }
        return $results;
    }

}
