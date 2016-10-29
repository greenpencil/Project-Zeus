<?php
class DB {
    private static $_instance = null;
    private $_PDO,
        $_query,
        $_error = false,
        $_results,
        $_count = 0;

    //Constructs the Database, connecting to the database.
    private function __construct() {
        try {
            $this->_PDO = new PDO('mysql:dbname=zeus;host=127.0.0.1', 'root', 'katie');
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    //Get's the Instance of the Database.
    public static function getInstance() {
        if(!isset(self::$_instance)) {
            self::$_instance = new DB();
        }
        return self::$_instance;
    }

    //Performs the PDO Query from the other methods.
    public function query($sql) {
        $this->_error = false;
        if($this->_query = $this->_PDO->prepare($sql)) {
            if($this->_query->execute()) {
                $this->_results = $this->_query->fetchAll(PDO::FETCH_OBJ);
                $this->_count = $this->_query->rowCount();
            } else {
                $this->_error = true;
            }
        }

        return $this;
    }

    //Updates the database based on the SQL Query posted.
    public function update($sql) {
        if(!$this->query($sql)->getErrors()) {
            return true;
        }
        return false;
    }

    //Get's an entires Tables results.
    public function getAll($table) {
        $sql = "SELECT * FROM " . $table . "";
        if(!$this->query($sql)->getErrors()) {
            return $this;
        }
        return null;
    }

    //Performs a specific SQL query.
    public function specificSQL($sql) {
        if(!$this->query($sql)->getErrors()) {
            return $this;
        }
        return null;
    }

    //Inserts details performing the specific SQL query.
    public function insertSQL($sql) {
        if(!$this->query($sql)->getErrors()) {
            return true;
        }
        return false;
    }

    //Deletes items based on the SQL query.
    public function delete($sql) {
        if(!$this->query($sql)->getErrors()) {
            return true;
        }
        return false;
    }

    //Get's all the results which are stored after fetching the query
    public function getResults() {
        return $this->_results;
    }

    //Gets the first item stored in _results
    public function getFirst() {
        return $this->_results[0];
    }

    //Gets any reported errors.
    public function getErrors() {
        return $this->_error;
    }

    //Get's the number of results from a query
    public function getCount() {
        return $this->_count;
    }

    //Gets the Database connection
    public function getPDO() {
        return $this->_pdo;
    }
}