<?php

require_once('database.php');

Class User {

  public function get_users(){
    $db = db_conn();
    $query = $db->prepare("SELECT * FROM users;");
    $query->execute();
    $rows = $query->fetchAll(PDO::FETCH_ASSOC);
    return $rows;
  }

  public function user_exists($username){
    $db = db_conn();
    $query = $db->prepare("SELECT * FROM users WHERE username = :username;");
    $query->execute(['username' => $username]);
    if ($query->rowCount() > 0){
      return true;
    }
    return false;
  }

  public function get_user($username, $password){
    $db = db_conn();
    $query = $db->prepare("SELECT * FROM users WHERE username = :username;");
    $query->execute(['username' => $username]);
    $user = $query->fetch(PDO::FETCH_ASSOC);
    if ($user && password_verify($password, $user['pass'])) {
        return true;
    }
    return false;
  }

  public function create_user($username, $password){
    $db = db_conn();
    $query = $db->prepare("INSERT INTO users(username, pass) VALUES(:username, :password);");
    if ($query->execute([
                        'username' => $username,
                        'password' => $password
    ])){
      return true;
    }
    return false;
  }
  
}
?>