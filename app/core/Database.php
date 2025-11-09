<?php
trait Database
{
  private function connect()
  {
    $string = "mysql:hostname=" . DBHOST . ";dbname=" . DBNAME;
    $con = new PDO($string, 'root', '');
    return $con;
  }

  // can be moved to Model.php
  public function query($query, $data = [])
  {
    $con = $this->connect();
    $stm = $con->prepare($query);

    $check = $stm->execute($data);

    if ($check) {
      $result = $stm->fetchAll(PDO::FETCH_ASSOC);

      if (is_array($result) && count($result)) {
        return $result;
      }
    }
    return false;
  }

  public function get_row($query, $data = [])
  {
    $con = $this->connect();
    $stm = $con->prepare($query);

    $check = $stm->execute($data);

    if ($check) {
      $result = $stm->fetchAll(PDO::FETCH_ASSOC);

      if (is_array($result) && count($result)) {
        return $result[0];
      }
    }
    return false;
  }
}
