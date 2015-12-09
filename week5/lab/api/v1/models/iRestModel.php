<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 *
 * @author jgriz
 */
interface iRestModel {

    function getAll();

    function get($id);

    function post($data);

    function put($data, $id);

    function delete($id);
}
