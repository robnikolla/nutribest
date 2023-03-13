<?php 
include_once("../dbCon.php");

class Customer extends dbCon{
    private $ID;
    private $fname;
    private $lname;
    private $address;
    private $address2;
    private $city;
    private $state;
    private $zip;
    private $email;
    private $phone;
    private $password;

    private $cardfirstname;
    private $cardlastname;
    private $cardnum;   
    private $cardexp;
    private $cardcvv;

    private $dbConnection;

    public function __construct($ID='',$fname='', $lname='', $address='', $address2='', $city='', $state='', $zip='', $email='', $phone='', $password='',$cardfirstname='',$cardlastname='',$cardnum='',$cardexp='',$cardcvv=''){
        $this->ID = $ID;
        $this->fname = $fname;
        $this->lname = $lname;
        $this->address = $address;
        $this->address2 = $address2;
        $this->city = $city;
        $this->state = $state;
        $this->zip = $zip;
        $this->email = $email;
        $this->phone = $phone;
        $this->password = $password;
        $this->cardfirstname = $cardfirstname;
        $this->cardlastname = $cardlastname;
        $this->cardnum = $cardnum;
        $this->cardexp = $cardexp;
        $this->cardcvv = $cardcvv;

        $this->dbConnection = $this->connDB();
    }
    public function getID(){
        return $this->ID;
    }
    public function setID($id){
        $this->ID = $id;
    }
    public function getFname(){
        return $this->fname;
    }

    public function setFname($fname){
        $this->fname = $fname;
    }

    public function getLname(){
        return $this->lname;
    }

    public function setLname($lname){
        $this->lname = $lname;
    }

    public function getAddress(){
        return $this->address;
    }

    public function setAddress($address){
        $this->address = $address;
    }

    public function getAddress2(){
        return $this->address2;
    }

    public function setAddress2($address2){
        $this->address2 = $address2;
    }

    public function getCity(){
        return $this->city;
    }

    public function setCity($city){
        $this->city = $city;
    }

    public function getState(){
        return $this->state;
    }

    public function setState($state){
        $this->state = $state;
    }

    public function getZip(){
        return $this->zip;
    }

    public function setZip($zip){
        $this->zip = $zip;
    }

    public function getEmail(){
        return $this->email;
    }

    public function setEmail($email){
        $this->email = $email;
    }

    public function getPhone(){
        return $this->phone;
    }

    public function setPhone($phone){
        $this->phone = $phone;
    }

    public function getPassword(){
        return $this->password;
    }

    public function setPassword($password){
        $this->password = $password;
    }
    public function getcardfirstname(){
        return $this->cardfirstname;
    }

    public function setcardfirstname($cardfirstname){
        $this->cardfirstname = $cardfirstname;
    }
    public function getcardlastname(){
        return $this->cardlastname;
    }

    public function setcardlastname($cardlastname){
        $this->cardlastname = $cardlastname;
    }
    public function getcardnum(){
        return $this->cardnum;
    }

    public function setcardnum($cardnum){
        $this->cardnum = $cardnum;
    }
    public function getcardexp(){
        return $this->cardexp;
    }

    public function setcardexp($cardexp){
        $this->cardexp = $cardexp;
    }
    public function getcardcvv(){
        return $this->cardcvv;
    }

    public function setcardcvv($cardcvv){
        $this->cardcvv = $cardcvv;
    }
    
 
     // Edit Method
     public function edit($id){
        $data = null;

        $sql = "SELECT * FROM customers WHERE ID = ?";
        $stm = $this->dbConnection->prepare($sql);
        $stm->execute([$id]);
        $data = $stm->fetch(PDO::FETCH_ASSOC);
        return $data;
    }

    // Update Method
    public function update(){
        try{
            $sql = "UPDATE customers SET name=?, surname=?, address=?, address2=?,city=?,zip=?,email=?,phone=?,cardfirstname=?,cardlastname=?,cardnum=?,cardexp=?,cardcvv=? WHERE ID=?";
            $stm = $this->dbConnection->prepare($sql);
            $stm->execute([$this->fname, $this->lname, $this->address, $this->address2,$this->city,$this->zip,$this->email,$this->phone,$this->cardfirstname,$this->cardlastname,$this->cardnum,$this->cardexp,$this->cardcvv, $this->ID]);
            return $stm;
        } catch(Exception $e){
            return $e->getMessage();
        }
    } 

    // Fetch Method
    public function fetchSessionOrders(){
        try{
            $sql = "SELECT c.name,c.surname,c.address,o.ID, o.status, o.orderdate FROM `customers` c inner join `order` o on c.ID = o.customer where c.ID ='".$_SESSION['ID']."'";
            $stm = $this->dbConnection->prepare($sql);
            $stm->execute();
            $data = $stm->fetchAll();
            return $data;
        } catch(Exception $e){
            return $e->getMessage();
        }
    } 
}