<?php

class Person {
    private $personNo;
    private $personFirstName;
    private $personLastName;
    private $personStartDate;
    private $role;

    public function __construct($personFirstName, $personLastName, $personStartDate, $role) {
        $this->personFirstName = $personFirstName;
        $this->personLastName = $personLastName;
        $this->personStartDate = $personStartDate;
        $this->role = $role;
    }

    public function getPersonNo() {
        return $this->personNo;
    }

    public function setPersonNo($value) {
        $this->personNo = $value;
    }

    public function getFirstName() {
        return $this->personFirstName;
    }

    public function setFirstName($value) {
        $this->personFirstName = $value;
    }

    public function getLastName() {
        return $this->personLastName;
    }

    public function setLastName($value) {
        $this->personLastName = $value;
    }

    public function getStartDate() {
        return $this->personStartDate;
    }

    public function setStartDate($value) {
        $this->personStartDate = $value;
    }

    public function getRole() {
        return $this->role;
    }

    public function setRole($value) {
        $this->role = $value;
    }
}