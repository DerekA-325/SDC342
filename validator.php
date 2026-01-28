<?php 
    namespace Avery_validator;

    //Validate the format of the name to be LastName, FirstName
    //using REGEX
    function nameValid($val) {
        if (empty($val)) {
            return 'Required entry';
        }
        elseif (strpos($val, ",") === false) {
            return 'Invalid format. Name must contain a comma.';
        }
        else {
            //Explode function seperates the names at the comma and stores them
            //as array elements
            $names = explode(',', $val);
            if (count($names) != 2)
            return 'Invalid format. Name must be input as LastName, FirstName';
            $lastname = trim($names[0]);
            $firstname = trim($names[1]);
            if (strlen($lastname) < 2){
            return 'Invalid format. Last name must be at least 2 letters long.';
            } elseif (strlen($firstname) < 1) {
               return 'Invalid format. First name must be at least 1 letter long.'; 
            }
        }
    }

    //Validate an e-mail address using the built-in PHP e-mail address
    //format validator; pass a message back through the parameter
    //passed by reference
    function emailValid($val, &$msg) {
        if (empty($val)) {
            $msg = 'Required entry';
        }
        elseif (strlen($val) > 0) {
            if (!filter_var($val, FILTER_VALIDATE_EMAIL))
            $msg = "Not a valid e-mail address.";
        }
    }

    //Validate a date using a REGEX; the REGEX to use
    //may be provided or may use the default format provided
    //in the parameter
    function dateValid($val, $regex="/^(\d{2})\/(\d{2})\/(\d{4})$/") {
        if (empty($val)) {
            return 'Required entry';
        }
        elseif (strlen($val) > 0) {
            if (!preg_match($regex, $val))
            return "Invalid format.";
            else
            return '';
        }
    }

    //Validate that a value is numeric; throw an exception if
    //the value is not numeric - note the use of \Exception to
    //indicate the Exception class is not from the validation
    //namespace
    function numericValue($val) {
        if (empty($val)) {
            throw new \Exception('Required entry');
        }
        elseif (!is_numeric($val)) {
            throw new \Exception('Not a valid number');
        }
    }

    //Validate the length of a string, returning an error message
    //or a blank string; parameters passed by value
    function stringValid($val, $len) {
        if (strlen($val) < $len && strlen($val) != 0)
        return 'Must be at  least ' . $len . ' characters.';
        else
        return '';
    }