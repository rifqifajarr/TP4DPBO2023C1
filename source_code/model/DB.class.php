<?php

class DB {
    var $servername = "";
    var $username = "";
    var $password = "";
    var $db_name = "";
    var $conn = "";
    var $res = 0;

    function __construct($servername, $username, $password, $db_name) {
        $this->servername = $servername;
        $this->username = $username;
        $this->password = $password;
        $this->db_name = $db_name;
    }

    function open() {
        $this->conn = 
        mysqli_connect($this->servername, $this->username, $this->password, $this->db_name);
    }

    function close() {
        mysqli_close($this->conn);
    }

    function execute($query) {
        $this->res = mysqli_query($this->conn, $query);
        return $this->res;
    }

    function getResult() {
        return mysqli_fetch_array($this->res);
    }
}

?>