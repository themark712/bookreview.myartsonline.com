<?php

/**
 * Main Model class
 */

trait Model
{
  use Database;

  //public $table = 'tablename';
  protected $limit = 10;
  protected $offset = 0;
  public $order_type = "ASC";
  //public $order_column = "Id";
  protected $errors = [];

  public function findAll()
  {
    $query = "SELECT * FROM $this->table ORDER BY $this->order_column $this->order_type";
    return $this->query($query);
  }


  public function where($data, $data_not = [])
  {
    // get keys from $data/data_not arrays
    $keys = array_keys($data);
    $keys_not = array_keys($data_not);

    $query = "SELECT * FROM $this->table WHERE ";

    foreach ($keys as $key) {
      $query .= $key . " = :" . $key . " && ";
    }

    foreach ($keys_not as $key) {
      $query .= $key . " != :" . $key . " && ";
    }

    // remove trailing && characters
    $query = trim($query, " && ");
    $query .= " ORDER BY $this->order_column $this->order_type LIMIT $this->limit OFFSET $this->offset";
    //echo $query;

    $data = array_merge($data, $data_not);
    return $this->query($query, $data);
  }

  public function first($data, $data_not = [])
  {
    // get keys from $data/data_not arrays
    $keys = array_keys($data);
    $keys_not = array_keys($data_not);

    $query = "SELECT * FROM $this->table WHERE ";

    foreach ($keys as $key) {
      $query .= $key . " = :" . $key . " && ";
    }

    foreach ($keys_not as $key) {
      $query .= $key . " != :" . $key . " && ";
    }

    // remove trailing && characters
    $query = trim($query, " && ");
    $query .= " LIMIT $this->limit OFFSET $this->offset";

    $data = array_merge($data, $data_not);

    $result = $this->query($query, $data);

    if ($result) {
      return $result[0];
    }

    $result = false;
  }

  public function insert($data)
  {
    // remove unwanted data
    if (!empty($this->allowedColumns)) {
      foreach ($data as $key => $value) {
        if (!in_array($key, $this->allowedColumns)) {
          unset($data[$key]);
        }
      }
    }

    // get keys from $data array
    $keys = array_keys($data);

    $query = "INSERT INTO $this->table (" . implode(',', $keys) . ") VALUES (:" . implode(',:', $keys) . ")";
    $this->query($query, $data);
    //$id=$this->query('SELECT LAST_INSERT_ID()');
    
    //return $id;
    return false;
  }

  public function update($id, $data, $id_column = 'Id')
  {
    // remove unwanted data
    if (!empty($this->allowedColumns)) {
      foreach ($data as $key => $value) {
        if (!in_array($key, $this->allowedColumns)) {
          unset($data[$key]);
        }
      }
    }

    // get keys from $data/data_not arrays
    $keys = array_keys($data);

    $query = "UPDATE $this->table SET ";

    foreach ($keys as $key) {
      $query .= $key . " = :" . $key . ", ";
    }

    // remove trailing , character
    $query = trim($query, ", ");
    $query .= " WHERE $id_column=:$id_column";

    $data["$id_column"] = $id;
    //echo $query;

    $this->query($query, $data);
    return false;
  }

  public function delete($id, $id_column = 'Id')
  {
    $data["$id_column"] = $id;
    $query = "DELETE FROM $this->table WHERE $id_column=:$id_column";

    $this->query($query, $data);

    return false;
  }
}
