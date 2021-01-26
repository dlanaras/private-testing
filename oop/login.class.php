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

    
    public function login($connection)
    {
    
        $verifacation = "SELECT username FROM admins WHERE username = '$this->username' AND password = '$this->password';";
        $result = mysqli_query($connection, $verifacation);
        if (mysqli_num_rows($result)) {
            $_SESSION["Admin"]=true;
            header ("location: CRUD.php");
        } else {

            die(mysqli_error($connection) . "Nah fam ya aint getting in here that easily");
        }
    
    }
}
