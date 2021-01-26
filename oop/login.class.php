<?php

require_once("database.php");

class Login {

    private $username;
    private $password;
  
    public function __construct($username, $password)
    {
      $this->username = $username;
      $this->password = $password;
    }
  
    public function toJson()
    {
      return json_encode([
        "username" => $this->username,
        "username" => $this->password
      ]);
    }
  

public function login($connection, $username, $password)
{
    if ($username != "" && $password != "") {
        $verifacation = "SELECT username FROM user WHERE username = '$username' AND password = '$password';";
        $result = mysqli_query($connection, $verifacation);
        if (mysqli_num_rows($result)) {
            $_SESSION["Admin"]=true;
        } else {
            die(mysqli_error($connection) . "nah fam");
        }
    } else {
        die(mysqli_error($connection) . "nah fam");
    }
}
}

/*
class Login
{
  private $username;
  private $password;

  public function __construct($username, $password)
  {
    $this->username = $username;
    $this->password = $password;
  }

  public function toJson()
  {
    return json_encode([
      "username" => $this->username,
      "username" => $this->password
    ]);
  }

  public function create($connection)
  {
    $username = $connection->real_escape_string($this->username);
    $password = $connection->real_escape_string($this->password);
    $sql = "";

    $result = $connection->query($sql);

    if (!$result) {
      die($connection->error);
    }
  }

  public static function fetchAll($connection)
  {
    $sql = "";
    $result = $connection->query($sql);

    if (!$result) {
      die($connection->error);
    }

    $markersFromDatabase = $result->fetch_all(MYSQLI_ASSOC);
    $creditentials = [];

    foreach ($markersFromDatabase as $marker) {
      $creditentials[] = new Login($login['username'], $login['password']);
    }

    return $creditentials;
  }
} 


class Login
{
  private $username;
  private $password;

  public function __construct($username, $password)
  {
    $this->username = $username;
    $this->password = $password;
  }


  
  public function toJson()
  {
    return json_encode([
      "username" => $this->username,
      "username" => $this->password
    ]);
  }

  public function isMatching() 
  {
        if ($username != "" && $password != "") {
            $myusername = mysqli_real_escape_string($connection, $_POST['username']);
                $mypassword = mysqli_real_escape_string($connection, $_POST['password']);
                $verifacation = "SELECT username FROM signup WHERE username = '$myusername' AND password = '$mypassword';";
                $result = mysqli_query($connection, $verifacation);
                if (mysqli_num_rows($result)) {
                    echo "Acess granted";
                    header("Location: insertToCrud.php");
                } else {
                    echo ("this user does not exist");
                }
        }
    }
  } */
?>