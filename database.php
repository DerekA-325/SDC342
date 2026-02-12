<?php
class Database {
    private $host = 'localhost';
    private $dbname = 'sdc342_wk3gp';
    private $username = 'root';
    private $password = '';

    private $conn;
    private $conn_error = '';

    function __construct() {
        mysqli_report(MYSQLI_REPORT_OFF);

        $this->conn = mysqli_connect($this->host, $this->username, $this->password, $this->dbname);

        if($this->conn === false) {
            $this->conn_error = "Failed to connect to DB: " . mysqli_connect_error();
        }
    }

    function __destruct() {
        if($this->conn) {
            mysqli_close($this->conn);
        }
    }

    function getDBConn() {
        return $this->conn;
    }

    function getDBError() {
        return $this->conn_error;
    }

    function getDBHost() {
        return $this->host;
    }

    function getDBName() {
        return $this->dbname;
    }

    function getDBUser() {
        return $this->username;
    }

    function getDBUserPw() {
        return $this->password;
    }
}