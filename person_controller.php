<?php
include_once(__DIR__ . '\person.php');
include_once(__DIR__ . '\..\model\person_db.php');

class PersonController {
    private static function rowToPerson($row) {
        $person = new Person($row['PersonFirstName'],
                            $row['PersonLastName'],
                            $row['PersonStartDate'],
                            new Role($row['RoleNo'],
                            $row['RoleName']));
        $person->setPersonNo($row['PersonNo']);
        return $person;
    }

    public static function getAllPeople() {
        $queryRes = PersonDB::getPeople();

        if($queryRes) {
            $people = array();

            foreach ($queryRes as $row) {
                $people[] = self::rowToPerson($row);
            }
            return $people;
        } else {
            return false;
        }
    }

    public static function getPeopleByRole($roleNo) {
        $queryRes = PersonDB::getPeopleByRole($roleNo);

        if($queryRes) {
            $people = array();

            foreach($queryRes as $row) {
                $people[] = self::rowToPerson($row);
            }
            return $people;
        } else {
            return false;
        }
    }

    public static function getPersonByNo($personNo) {
        $queryRes = PersonDB::getPerson($personNo);

        if ($queryRes) {
            return self::rowToPerson($queryRes);
        } else {
            return false;
        }
    }

    public static function deletePerson($personNo) {
        return PersonDB::deletePerson($personNo);
    }

    public static function addPerson($person) {
        return PersonDB::addPerson(
            $person->getFirstName(),
            $person->getLastName(),
            $person->getStartDate(),
            $person->getRole()->getRoleNo());
    }

    public static function updatePerson($person) {
        return PersonDB::updatePerson(
            $person->getPersonNo(),
            $person->getFirstName(),
            $person->getLastName(),
            $person->getStartDate(),
            $person->getRole()->getRoleNo());
    }
}