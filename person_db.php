<?php
require_once(__DIR__ . '\database.php');

class PersonDB {
    public static function getPeople() {
        $db = new Database();
        $dbConn = $db->getDBConn();

        if($dbConn) {
            $query = 'SELECT * FROM people
                        INNER JOIN roles
                            ON people.RoleNo
                            = roles.RoleNo';
        

            return $dbConn->query($query);
        } else {
            return false;
        }
    }

    public static function getPeopleByRole($roleNo) {
        $db = new Database();
        $dbConn = $db->getDBConn();
        if ($dbConn) {
            $query = "SELECT * FROM people
                        INNER JOIN roles
                        ON people.RoleNo = roles.RoleNo
                        WHERE people.RoleNo = '$roleNo'";
            
            return $dbConn->query($query);
        } else {
            return false;
        }
    }

    public static function getPerson($personNo) {
        $db = new Database();
        $dbConn = $db->getDBConn();
        if($dbConn) {
            $query = "SELECT * FROM people
                        INNER JOIN roles
                        ON people.RoleNo = roles.RoleNo
                        WHERE PersonNo = '$personNo'";

            $result = $dbConn->query($query);
            return $result->fetch_assoc();
        } else {
            return false;
        }
    }

    public static function deletePerson($personNo) {
        $db = new Database();
        $dbConn = $db->getDBConn();

        if($dbConn) {
            $query = "DELETE FROM people
                        WHERE PersonNo = '$personNo'";
            
            return $dbConn->query($query) === TRUE;
        } else {
            return false;
        }
    }

    public static function addPerson($fname, $lname, $start, $roleNo) {
        $db = new Database();
        $dbConn = $db->getDBConn();

        if ($dbConn) {
            $query = "INSERT INTO people (PersonFirstName, PersonLastName,
                                            PersonStartDate, RoleNo)
                        VALUES ('$fname', '$lname', '$start', '$roleNo')";
            return $dbConn->query($query) === TRUE;
        } else {
            return false;
        }
    }

    public static function updatePerson($pNo, $fname, $lname, $start, $roleNo) {
        $db = new Database();
        $dbConn = $db->getDBConn();

        if ($dbConn) {
            $query = "UPDATE people SET
                        PersonFirstName = '$fname',
                        PersonLastName = '$lname',
                        PersonStartDate = '$start',
                        RoleNo = '$roleNo'
                        WHERE PersonNo = '$pNo'";

            return $dbConn->query($query) === TRUE;
        } else {
            return false;
        }
    }
}