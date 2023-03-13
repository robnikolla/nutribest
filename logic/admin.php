<?php 
include_once("../dbCon.php");

class Admin extends dbCon{
    private $ID;
    private $name;
    private $surname;
    private $email;
    private $password;

    private $dbConnection;

    public function __construct($ID='', $name='', $surname='', $email='', $password=''){
        $this->ID = $ID;
        $this->name = $name;
        $this->surname = $surname;
        $this->email = $email;
        $this->password = $password;

        $this->dbConnection = $this->connDB();
    }

    public function getID(){
        return $this->ID;
    }

    public function setID($ID){
        $this->ID = $ID;
    }

    public function getName(){
        return $this->name;
    }

    public function setName($name){
        $this->name = $name;
    }

    public function getSurname(){
        return $this->surname;
    }

    public function setSurname($surname){
        $this->surname = $surname;
    }

    public function getEmail(){
        return $this->email;
    }

    public function setEmail($email){
        $this->email = $email;
    }

    public function getPassword(){
        return $this->password;
    }

    public function setPassword($password){
        $this->password = $password;
    }

    // Register Method
    public function registerUser(){
        try{
            $sql = "INSERT INTO admindb(`name`,`surname`,`email`,`password`) value (?,?,?,?)";
            $stm = $this->dbConnection->prepare($sql);
            $stm->execute([$this->name, $this->surname, $this->email, $this->password]);
        } catch(Exception $e){
            return $e->getMessage();
        }
    }        
    // Fetch Method
    public function showAllAdmins(){
        try{
            $sql = "SELECT * FROM admindb";
            $stm = $this->dbConnection->prepare($sql);
            $stm->execute();
            $users = $stm->fetchAll();
            return $users;
        } catch(Exception $e){
            return $e->getMessage();
        }
    }
    // Edit Method
    public function edit($id){
        $data = null;

        $sql = "SELECT * FROM admindb WHERE ID = ?";
        $stm = $this->dbConnection->prepare($sql);
        $stm->execute([$id]);
        $data = $stm->fetch(PDO::FETCH_ASSOC);
        return $data;
    }

    // Update Method
    public function update(){
        try{
            $sql = "UPDATE admindb SET name=?, surname=?, email=?, password=? WHERE ID=?";
            $stm = $this->dbConnection->prepare($sql);
            $stm->execute([$this->name, $this->surname, $this->email, $this->password, $this->ID]);
            return $stm;
        } catch(Exception $e){
            return $e->getMessage();
        }
    }
}
?>
