<?php
require_once(__DIR__ . '\database.php');

class RoleDB {
    public static function getRoles() {
        $db = new Database();
        $dbConn = $db->getDBConn();

        if ($dbConn) {
            $query = 'SELECT * FROM roles';

            return $dbConn->query($query);
        } else {
            return false;
        }
    }
}