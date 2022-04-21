<?php

    class database{
        var $_sql = "";
        var $_connection = null;
        var $_cursor = null;
        var $_host = "localhost";
        var $_user = "root";
        var $_pass = "";
        var $_database = "doanphp";

        function __construct() {
            $this->_connection = @mysqli_connect($this->_host, $this->_user, $this->_pass);
            if(!$this->_connection) {
                die("Can't connect Mysql");
            }
            $db = $this->_database;
            if($db != "" && !mysqli_select_db($this->_connection, $db)) {
                die("Can't open database");
            }
        }

        function setQuery($sql) {
            $this->_sql = $sql;
        }

        function query() {
            $this->_cursor = mysqli_query($this->_connection, $this->_sql);
            return $this->_cursor;
        }

        function disconnect() {
            mysqli_close($this->_connection);
        }
    }
    
    $_host = "localhost";
    $_user = "root";
    $_pass = "";
    $_database = "doanphp";
    $DB_con = "";
    try
    {
        $DB_con = new PDO("mysql:host={$_host};dbname={$_database}",$_user,$_pass);
        $DB_con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch(PDOException $exception)
    {
        echo $exception->getMessage();
    }

    include_once 'pagination.php';
    $paginate = new paginate($DB_con);

?>