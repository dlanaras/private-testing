<?php

/**
 * Simple MySQLi Database class for PHP7.
 * The class contains main functions for your database.
 *
 * @author FD
 */

class Database
{
  private static $instance; //The single instance
  private $host, $database, $username, $password;
  private $connection;
  private $port = 3306;

  /*
   * Get an instance of the Database (Singleton)
   * @return Instance
   */
  public static function getInstance() {
    if(!self::$instance) { // If no instance then make one
      self::$instance = new self();
    }
    return self::$instance;
  }

  /**
   * Sets the connection credentials to connect to your database.
   *
   * @param string $host - the host of your database
   * @param string $username - the username of your database
   * @param string $password - the password of your database
   * @param string $database - your database name
   * @param integer $port - the port of your database
   * @param boolean $autoconnect - to auto connect to the database after settings connection credentials
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
   * Open the connection to your database.
   */
  function open()
  {
    try {
      $this->connection = new mysqli($this->host, $this->username, $this->password, $this->database, $this->port);
    } catch (Exception $e) {
      echo "FAIL! ",  $ex->getMessage() . PHP_EOL;
    }
  }

  /**
   * Close the connection to your database.
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


  /**
   *
   * Returns the database connection
   *
   * @return object $connection
   */
  public function getConnection()
  {
    return $this->connection;
  }
}

?>