<?php
include_once(__DIR__ . '\role.php');
include_once(__DIR__ . '\..\model\role_db.php');

class RoleController {
    public static function getAllRoles() {
        $queryRes = RoleDB::getRoles();

        if($queryRes) {
            $roles = array();

            foreach($queryRes as $row) {
                $roles[] = new Role($row['RoleNo'],
                $row['RoleName']);
            }

            return $roles;
        } else {
            return false;
        }
    }
}