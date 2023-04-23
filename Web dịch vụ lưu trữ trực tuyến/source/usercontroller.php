<?php
require_once("db.php");
class UserController {
    public function login($us, $ps)
    {
        global $conn;
        // $hash_pass = password_hash($ps, PASSWORD_DEFAULT);
        $stm = $conn->prepare("select * from users where name= ? and password=? ");
        $stm->bind_param("ss",$us, $ps);
        $stm->execute();
        $us = new UserInfo();
        $stm->bind_result($us->id, $us->name, $us->email, $us->permission, $us->password);
        $stm->fetch();
        return $us; 
    }
    public function check($us)
    {
        global $conn;
        $stm = $conn->prepare("select * from users where name=?");
        $stm->bind_param("s",$us);
        $stm->execute();
        $us = new UserInfo();
        $stm->bind_result($us->id, $us->name, $us->email, $us->permission, $us->password);
        $stm->fetch();
        return $us; 
    }
    public function checkID($us)
    {
        global $conn;
        $stm = $conn->prepare("select * from users where id=?");
        $stm->bind_param("s",$us);
        $stm->execute();
        $us = new UserInfo();
        $stm->bind_result($us->id, $us->name, $us->email, $us->permission, $us->password);
        $stm->fetch();
        return $us; 
    }
    public function checkpass($us)
    {
        global $conn;
        $stm = $conn->prepare("select * from users where password=?");
        $stm->bind_param("s",$us);
        $stm->execute();
        $us = new UserInfo();
        $stm->bind_result($us->id, $us->name, $us->email, $us->permission, $us->password);
        $stm->fetch();
        return $us; 
    }
    // public function insert($us, $ps, $em) 
    // {
    //     global $conn;
    //     $role = 1;
    //     $stm = $conn->prepare("INSERT INTO users(name, email, permissiion, password) values (?,?,?,?)");
    //     $stm->bind_param("ssis", $us,$em, $role, $ps);
    //     // $stm->excute([$us,$em, $role, $ps]);
        
    // }
    public function checkEmail($em)
    {
        global $conn;
        $stm = $conn->prepare("select * from users where email=?");
        $stm->bind_param("s",$em);
        $stm->execute();
        $em = new UserInfo();
        $stm->bind_result($em->id, $em->name, $em->email, $em->permission, $em->password);
        $stm->fetch();
        return $em; 
    }
}
class UserInfo {
    public $id;
    public $name;
    public $email;
    public $permission;
    public $password;
}


?>