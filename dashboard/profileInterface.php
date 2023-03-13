<?php 
    session_start();
    include("../logic/customer.php");
    if(!isset($_SESSION['ID'])){
        header("Location:../index.html");
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CDN import-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="../style/landing.css">
    <link rel="stylesheet" href="../style/table.css">
    <link rel="stylesheet" href="../style/profile.css">
    <!-- Roboto Font-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet"> 
    <!-- Cart icon (Imported from Google icons)-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <!-- Heart icon -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,500,1,0" />
    <!-- Edit Icon -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,500,0,0" />
    <title>NutriBest</title>
</head>
<body class="bg-body-tertiary">
    <nav class="navbar navbar-light bg-light navbar-expand-lg" style="background-color:#263c6f;color:white">
        <div class="container-fluid">
          <a class="navbar-brand" href="#"><img style="width:60px;height:auto;font-weight:600;margin-right:20px;"src="../img/logo.png">NutriBest</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
            <ul class="navbar-nav  mb-1 mb-lg-0 ">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="./index.html">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">About</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="./products.html">Products</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Contact</a>
              </li>
            </ul>
          </div>
          <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
            <ul class="navbar-nav  mb-1 mb-lg-0">
             
              <li class="nav-item dropdown">
                <a class="nav-link active dropdown-toggle d-flex align-items-center" href="#" data-bs-toggle="dropdown" aria-expanded="false"> 
                  <span class="material-symbols-outlined mr-2">
                  shopping_cart
                  </span>
                  Cart</a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="#">Edit Cart</a></li>
                  <li><hr class="dropdown-divider"></li>
                  <li><a class="dropdown-item" href="./order.html">Order Now</a></li>
                </ul>
              </li>
       <li class="nav-item">
                <a class="nav-link d-flex align-items-center" href="#">
                  <span class="material-symbols-outlined mr-2">
                    favorite
                    </span>
                  Wishlist</a>
              </li>
             
            </ul>
          </div>
          
      </nav>
      <ul class="nav nav-pills mb-3 justify-content-center" id="pills-tab" role="tablist">
  <li class="nav-item" role="presentation">
    <button class="nav-link active" id="pills-order-tab" data-bs-toggle="pill" data-bs-target="#pills-order" type="button" role="tab" aria-controls="pills-order" aria-selected="true">Orders</button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Profile</button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact" aria-selected="false">Contact</button>
  </li>
</ul>
<div class="tab-content" id="pills-tabContent">
    <!-- Orders Tab -->
<div class="tab-pane fade show active" id="pills-order" role="tabpanel" aria-labelledby="pills-order-tab" tabindex="0">
  <h3>Your Orders:</h3>
  <table class="ordertbl col-sm-6">
        <tr>
          <th>Order ID</th>
          <th>Full Name</th>
          <th>Shipping Address</th>
          <th>Status</th>
          <th>Date</th>
        </tr>
        <?php 

                $customer = new Customer();
                $orders = $customer->fetchSessionOrders();
                $userdata = $customer->edit($_SESSION['ID']);
                $usercardcensored = substr($userdata['cardnum'],0,5)."********";

                foreach($orders as $order){
                
                  $output; 
                  if($order['status'] == "Paid"){
                    $output = "alert-success";
                  } else if ($order['status'] == "Cancelled"){
                    $output = "alert-danger";
                  } else if ($order['status'] == "Refunded"){
                    $output = "alert-secondary";
                  }
                ?>
                <tr>
                  <td><?= $order['ID']?></td>
                  <td><?= $order['name']." ".$order['surname']?></td>
                  <td><?= $order['address'] ?></td>
                  <td ><p class="alert <?= $output ?>" style="padding:5px;margin:0;text-align:center;font-size:0.9rem"><?= $order['status'] ?></p></td>
                  <td><?= date_format(date_create($order['orderdate']), '  d-m-Y | h:i A')?></td>
                 
                </tr>
                  <?php } ?>

        </table>


  </div>
  <!-- Profile Tab -->
  <div class="tab-pane fade p-2 d-flex justify-content-center" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab" tabindex="0">
      <div class="userinfocard col-sm-6 d-flex flex-wrap justify-content-center"> 
    
       
       <div class="mx-3">
          <h3>Profile Info 
            <a href="./updUser.php?ID=<?= $_SESSION['ID']?>" ><span class="material-symbols-outlined" style="margin-left:10px">
              edit
            </span></h3></a><br>
        <p><b>Name: </b><?= $userdata["name"]." ".$userdata["surname"]?> </p>
        <p><b>Address: </b><?= $userdata["address"]?></p>
        <p><b>Address2: </b><?= $userdata["address2"]?></p>
        <p><b>City: </b><?= $userdata["city"]?></p>
        <p><b>Zip: </b><?= $userdata["zip"]?></p>
        <p><b>Email: </b><?= $userdata["email"]?></p>
        <p><b>Phone: </b><?= $userdata["phone"]?></p>
        </div>
        <div class="mx-3">
          <br><br><br>
          <p><b>Card First Name: </b><?= $userdata["cardfirstname"]?> </p>
          <p><b>Card Last Name: </b><?= $userdata["cardlastname"]?> </p>  
          <p><b>Card Number: </b><?= $usercardcensored?></p>
          <p><b>Expiration Date: </b><?= $userdata["cardexp"]?> </p> 
          <p><b>CCV: </b>***</p>
        </div>
      </div> 

  </div>
 
 
  <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab" tabindex="0"><h3>333</h3></div>
</div>


        

      </div>
  
    <footer class="container py-5">
    <div class="row">
      <div class="col-12 col-md">
        <img style="width:60px;height:auto;font-weight:600;margin-right:20px;"src="../img/logo.png">
        <p>Nutribest</p>
        <small class="d-block mb-3 text-muted">©2023</small>
      </div>
      <div class="col-6 col-md">
        <h5>Features</h5>
        <ul class="list-unstyled text-small">
          <li><a class="text-muted" href="#">Cool stuff</a></li>
          <li><a class="text-muted" href="#">Random feature</a></li>
          <li><a class="text-muted" href="#">Team feature</a></li>
          <li><a class="text-muted" href="#">Stuff for developers</a></li>
          <li><a class="text-muted" href="#">Another one</a></li>
          <li><a class="text-muted" href="#">Last time</a></li>
        </ul>
      </div>
      <div class="col-6 col-md">
        <h5>Resources</h5>
        <ul class="list-unstyled text-small">
          <li><a class="text-muted" href="#">Resource</a></li>
          <li><a class="text-muted" href="#">Resource name</a></li>
          <li><a class="text-muted" href="#">Another resource</a></li>
          <li><a class="text-muted" href="#">Final resource</a></li>
        </ul>
      </div>
      <div class="col-6 col-md">
        <h5>Resources</h5>
        <ul class="list-unstyled text-small">
          <li><a class="text-muted" href="#">Business</a></li>
          <li><a class="text-muted" href="#">Education</a></li>
          <li><a class="text-muted" href="#">Government</a></li>
          <li><a class="text-muted" href="#">Gaming</a></li>
        </ul>
      </div>
      <div class="col-6 col-md">
        <h5>About</h5>
        <ul class="list-unstyled text-small">
          <li><a class="text-muted" href="#">Team</a></li>
          <li><a class="text-muted" href="#">Locations</a></li>
          <li><a class="text-muted" href="#">Privacy</a></li>
          <li><a class="text-muted" href="#">Terms</a></li>
        </ul>
      </div>
    </div>
  </footer>
    
    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>