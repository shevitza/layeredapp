<?php
namespace config;
/**
 * Description of Database
 *
 * @author Evgenia
 */
use \PDO;
class Database
{
    private $connection;
    private $host='localhost';
    private $username='root';
    private $password='';
    private $database='blog';
    
    public function __construct()
    {
        $this->database_connection();
    }


    function database_connection(){
        $this->connection = new \PDO("mysql:host=" . $this->host . ";dbname="
                . $this->database, $this->username, $this->password);
        $this->connection->exec("set names utf8"); 
    }
    function getConnection()
    {
        return $this->connection;
    }


}
