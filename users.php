<?php
class User{
private $name; 
private $nickname;
private $email;
private $password;
private $passwordcheck;
private $profilkep;

public function __construct($name, $nickname, $email, $password, $passwordcheck, $profilkep){
    $this->name = $name;
    $this->nickname = $nickname;
    $this-> email = $email;
    $this-> password = $password;
    $this-> passwordcheck = $passwordcheck;
    $this-> profilkep = $profilkep;
}

public function getName(){
    return $this->name;
}
public function setName($name){
    $this->name = $name;
    return $this;
}

public function getNickname(){
    return $this->nickname;
}
public function setNickname($nickname){
    $this->nickname = $nickname;
return $this;
}


public function getEmail(){
return $this->email;
}
public function setEmail($email){
    $this->email = $email;
    return $this;
}

public function getPassword(){
    return $this->password;
}
public function setPassword($password){
    $this->password = $password;
    return $this;
}

public function getPasswordcheck(){
    return $this->passwordcheck;
}

public function setPasswordcheck($passwordcheck){
    $this->passwordcheck = $passwordcheck;
    return $this;
}

    /**
     * @return mixed
     */
    public function getProfilkep()
    {
        return $this->profilkep;
    }

    /**
     * @param mixed $profilkep
     */
    public function setProfilkep($profilkep)
    {
        $this->profilkep = $profilkep;
    }

public function savetxt(){
    $user = [
        "name" => $this->name,
        "nickname"=> $this->nickname,
        "email" => $this-> email,
        "password" => $this-> password,
        "passwordcheck" => $this-> passwordcheck,
        "profilkep" => $this-> profilkep,
    ];
    $file = fopen("users.txt", "a");
    fwrite($file, serialize($user) ."\n");
    fclose($file);
    }
}

?>