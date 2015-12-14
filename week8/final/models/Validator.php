<?php

/**
 * Description of Validator
 *
 * @author GFORTI
 */
class Validator {

    /**
     * A method to check if an email is valid.
     *
     * @param {String} [$email] - must be a valid email
     *
     * @return boolean
     */
    public function emailIsValid($email) {
        return ( is_string($email) && !empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL) !== false );
    }

    public function passwordIsValid($password) {
        return ( is_string($password) && !empty($password));
    }

}
