<?php 
/*
$servername = "localhost";
$username = "root";
$password = "";
$db = "happyplace";

$connection = new mysqli($servername, $username, $password, $db);
*/

class Database
{
  private $host, $database, $username, $password, $connection;
  private $port = 3306;

  /** 
   * Sets the connection credentials to connect to your database.
   *
   * @param string $host - the host of your database
   * @param string $username - the username of your database
   * @param string $password - the password of your database
   * @param string $database - your database name
   * @param integer $port - the port of your database
   * @param boolean $autoconnect - to auto connect to the database after settings connectioncredentials
   */
  function __construct($host, $username, $password, $database, $port = 3306, $autoconnect = true)
  {
    $this->host = $host;
    $this->database = $database;
    $this->username = $username;
    $this->password = $password;
    $this->port = $port;
    if ($autoconnect) $this->open();
  }

  /**
   * Open the connectionto your database.
   */
  function open()
  {
    $this->connection= mysqli_connect($this->host, $this->username, $this->password, $this->database, $this->port);
  }

  /**
   * Close the connectionto your database.
   */
  function close()
  {
    $this->connection->close();
  }

  /** 
   *
   * Execute your query
   *
   * @param string $query - your sql query
   * @return the result of the executed query
   */
  function query($query)
  {
    return $this->connection->query($query);
  }

  /**
   * Escape your parameters to prevent SQL Injections!
   *
   * @param string $string - your parameter to escape
   * @return the escaped string
   */
  function escape($string)
  {
    return $this->connection->escape_string($string);
  }
}

$database = new Database("localhost", "root", "", "happyplace");

?>