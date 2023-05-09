<?php
session_start();

class Connection{
  public $host = "localhost";
  public $user = "root";
  public $password = "";
  public $db_name = "commentssection";
  public $conn;

  public function __construct(){
    $this->conn = mysqli_connect($this->host, $this->user, $this->password, $this->db_name);
  }
}

class Register extends Connection{
  public function registration($name, $uid, $email, $pwd, $confirmpassword){
    $duplicate = mysqli_query($this->conn, "SELECT * FROM user WHERE  uid = '$uid'");
    if(mysqli_num_rows($duplicate) > 0){
      return 10;
   
    }
    else{
      if($pwd == $confirmpassword){
        $query = "INSERT INTO user VALUES('', '$name', '$uid', '$email', '$pwd')";
        mysqli_query($this->conn, $query);
        return 1;
        
      }
      else{
        return 100;
  
      }
    }
  }
}

class Login extends Connection{
  public $id;
  public function login($uid, $pwd){
    $result = mysqli_query($this->conn, "SELECT * FROM user WHERE uid = '$uid'");
    $row = mysqli_fetch_assoc($result);

    if(mysqli_num_rows($result) > 0){
      if($pwd == $row["pwd"]){
        $this->id = $row["id"];
        return 1;
      
      }
      else{
        return 10;
      
      }
    }
    else{
      return 100;
    
    }
  }

  public function idUser(){
    return $this->id;
  }
}

class Select extends Connection{
  public function selectUserById($id){
    $result = mysqli_query($this->conn, "SELECT * FROM tb_user WHERE id = $id");
    return mysqli_fetch_assoc($result);
  }
}