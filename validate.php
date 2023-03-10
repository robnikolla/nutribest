<?php 
    include_once("./dbCon.php");
    //Input variables from shipping and checkout
    $data['firstname'] = $_POST['firstname'];
    $data['lastname'] = $_POST['lastname'];
    $data['address'] = $_POST['address'];
    $data['address2'] = $_POST['address2'];
    $data['city'] = $_POST['city'];
    $data['zip'] = $_POST['zip'];
    $data['email'] = $_POST['email'];
    $data['phone'] = $_POST['phone'];
    $data['cardfirstname'] = $_POST['cardfirstname'];
    $data['cardlastname'] = $_POST['cardlastname'];
    $data['cardnum'] = $_POST['cardnum'];
    $data['cardexp'] = $_POST['cardexp'];
    $data['cardcvv'] = $_POST['cardcvv'];
    $data['success'] = 0;
    
    
    $cardnumformat = "/(^4[0-9]{12}(?:[0-9]{3})?$)|(^(?:5[1-5][0-9]{2}|222[1-9]|22[3-9][0-9]|2[3-6][0-9]{2}|27[01][0-9]|2720)[0-9]{12}$)|(3[47][0-9]{13})|(^3(?:0[0-5]|[68][0-9])[0-9]{11}$)|(^6(?:011|5[0-9]{2})[0-9]{12}$)|(^(?:2131|1800|35\d{3})\d{11}$)/";
    $expdateformat = "/^(0[1-9]|1[0-2])\/([0-9]{2})$/";
    $cvvformat = "/([0-9]{3})/";
    // Check if the checkout inputs are empty (Shipping inputs are already validated)
    if(empty($data['cardfirstname'])||empty($data['cardlastname'])||empty($data['cardnum'])||empty($data['cardexp'])|| empty($data['cardcvv'])){
        echo"Fill out the fields!";
        return false;
    }
    else if(preg_match($cardnumformat,$data['cardnum']) == 0) {
        echo "Card Number is not valid!";
        return false;
    }
    else if(preg_match($expdateformat,$data['cardexp']) == 0){
        echo "Card Expiration Date is not valid!";
        return false;
    }else if (preg_match($cvvformat,$data['cardcvv']) == 0){
        echo "CVV is not valid!";
        return false;
    }
    else {
        //Database Insertion
        $pwd = bin2hex(openssl_random_pseudo_bytes(4));
        $sql = "INSERT INTO `customers`(`name`, `surname`, `address`, `address2`, `city`, `zip`, `email`, `phone`, `cardfirstname`, `cardlastname`, `cardnum`, `cardexp`, `cardcvv`,`password`) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
        $stm = $databaseconn->connDB()->prepare($sql);
        $stm->execute([$data['firstname'],$data['lastname'],$data['address'],$data['address2'],$data['city'],$data['zip'],$data['email'],$data['phone'],$data['cardfirstname'],$data['cardlastname'],$data['cardnum'],$data['cardexp'],$data['cardcvv'],$pwd]);
        //Return of Data in json format 
        $data["success"] = "1";
        echo (json_encode($data));
    }



   
?>