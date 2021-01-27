<?php

/**
 * Generate an entity object that provide CRUD operation for a database table.
 *
 * Some examples: 
 *
 *   // New Instance
 *   $users = new Entity($link, "users");
 *
 *   // Add new record
 *   $newRecord = new stdClass();
 *   $newRecord->username = "foxfabi";
 *   $users->save($newRecord);
 *
 *   // Update a record
 *   $updateRecord = $users->load(9556);
 *   $updateRecord->username = "dennfabi";
 *   $users->save($updateRecord);           
 *
 * @author   Fabian Dennler <fd@fabforge.ch>
 */

class Entity
{

  private $connection = '';
  private $table = '';
  public $columns;
  public $data = array();

  /* @param string $table The name of the table to generate code for. */
  public function __construct($link, $table)
  {
    $this->connection = $link; // Database connection
    $this->table = $table;
    $this->describe();
  }

  /**
   * Get the data definition for the requested table.
   */
  private function describe()
  {
    try {
      $sql = "DESCRIBE " . $this->table;
      $statement = $this->connection->prepare($sql);
      if ($statement->execute()) {
        $result = $statement->get_result();
        while ($row = $result->fetch_object()) {
          $this->columns[$row->Field] = array(
            'name' => $row->Field,
            'type' => $row->Type,
            'key' => $row->Key,
            'extra' => $row->Extra,
          );
        }
        ksort($this->columns);
      }
    } catch (Exception $e) {
      throw $e;
    }
  }

  /**
   * Load the record from Database where id = $id
   *
   * @param $id Entity ID
   *
   * @return $entity entity loaded
   */
  public function load($id)
  {
    try {
      $statement = $this->connection->prepare("SELECT * FROM " . $this->table . " WHERE id=?");
      $statement->bind_param('d', $id);
      $statement->execute();
      $result = $statement->get_result();
      $statement->close();
      $obj = $result->fetch_object();
      return $obj;
    } catch (Exception $e) {
      throw $e;
    }
  }

  /**
   * Fetch all records from Database that match the given filter
   *
   * @param $filter SQL Filter
   *
   * @return $entities Entities matching filter
   */
  public function fetch($filter = "")
  {
    try {
      $sql = sprintf("SELECT * FROM " . $this->table);
      if ($filter != "") {
        $sql .= sprintf(" WHERE %s", $filter);
      }
      $statement = $this->connection->prepare($sql);
      $statement->execute();
      $result = $statement->get_result();
      $statement->close();
      return $result;
    } catch (Exception $e) {
      throw $e;
    }
  }

  /**
   * Delete the record from Database where id = $id
   *
   * @param $id Entity ID
   *
   * @return $entity entity loaded
   */
  public function delete($id)
  {
    try {
      $statement = $this->connection->prepare("DELETE * FROM " . $this->table . " WHERE id=?");
      $statement->bind_param('d', $id);
      $result = $statement->execute();
      $statement->close();
      return $result;
    } catch (Exception $e) {
      throw $e;
    }
  }

  /**
   * Save a record to Database
   *
   * @param $entity Entity to save
   *
   * @return $entity entity saved
   */
  public function save($entity)
  {
    $this->prepare($entity);
    if (isset($entity->id)) {
      $sql = "UPDATE " . $this->table . " SET "; //title = ? , notes = ?, deadline = ? WHERE id = ?";
      foreach ($this->data as $column => $value) {
        if ($column == "id") {
          continue;
        }
        $values[] = $column . " ='" . $value . "'";
      }
      $sql  .= implode(",", $values);
      $sql .= sprintf(" WHERE id=%d", $entity->id);
    } else {
      $sql = "INSERT INTO " . $this->table . " (%s) VALUES ('%s');";
      // implode keys
      $columns = implode("`, `", array_keys($this->data));
      // implode values
      $values = implode("', '", $this->data);
      $sql = sprintf($sql, $columns, $values);
    }
    try {
      echo $sql;
      $statement = $this->connection->prepare($sql);
      $result = $statement->execute();
      $entity = $this->load($this->connection->insert_id);
      $statement->close();
      return $entity;
    } catch (Exception $e) {
      throw $e;
    }
  }

  /**
   * Prepare the data of this entity for save (INSERT OR UPDATE)
   *
   * @return void
   */
  private function prepare($entity)
  {
    foreach ($this->columns as $column => $details) {
      if (!empty($entity->$column)) {
        $this->data[$details['name']] = $entity->$column;
      }
    }
  }

  /**
   * Set an entity variable.
   * Is run when writing data to inaccessible
   * (protected or private) or non-existing properties.
   *
   * @param $name  Name of the variable to set
   * @param $value Value to set
   *
   * @return void
   */
  public function __set($name, $value)
  {
    if (isset($this->columns[$name])) {
      $this->$name = $value;
    } else {
      $trace = debug_backtrace(); // Generates a backtrace
      // Generates a user-level error/warning/notice message
      trigger_error(
        'Undefined column via __set(): ' . $name .
          ' in ' . $trace[0]['file'] .
          ' on line ' . $trace[0]['line'],
        E_USER_NOTICE
      );
    }
  }


  /**
   * Get an entity variable.
   * Is utilized for reading data from inaccessible
   * (protected or private) or non-existing properties.
   *
   * @param $name Name of the variable to set
   *
   * @return Value of the variables
   */
  public function __get($name)
  {
    if (!empty($this->$name)) {
      return $this->$name;
    }
    $trace = debug_backtrace(); // Generates a backtrace
    // Generates a user-level error/warning/notice message
    trigger_error(
      'Undefined property via __get(): ' . $name .
        ' in ' . $trace[0]['file'] .
        ' on line ' . $trace[0]['line'],
      E_USER_NOTICE
    );
    return null;
  }
}

?>