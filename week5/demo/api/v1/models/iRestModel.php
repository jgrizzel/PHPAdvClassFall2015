<?php
/**
 *
 * @author Joshua
 */
interface iRestModel {
    function getAll();
    function get($id);
    function post();
    function put ();
    function delete ();
}
