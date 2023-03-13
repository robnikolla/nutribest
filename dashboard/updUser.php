<?php 
    session_start();
    include("../logic/customer.php");
    $customer = new Customer();
    $id = $_REQUEST["ID"];
    $userdata = $customer->edit($id);
    


    if(isset($_POST["updButton"])){
        $updCustomer = new Customer();
        $updCustomer->setID($id);
        $updCustomer->setFname($_POST['inpName']);
        $updCustomer->setLname($_POST['inpSurname']);
        $updCustomer->setAddress($_POST['inpAddress']);
        $updCustomer->setAddress2($_POST['inpAddress2']);
        $updCustomer->setCity($_POST['inpCity']);
        $updCustomer->setState($_POST['inpState']);
        $updCustomer->setZip($_POST['inpZip']);
        $updCustomer->setEmail($_POST['inpEmail']);
        $updCustomer->setPhone($_POST['inpPhone']);
        $updCustomer->setPassword($_POST['inpPassword']);
        $updCustomer->setcardfirstname($_POST['inpCardName']);
        $updCustomer->setcardlastname($_POST['inpCardSurname']);
        $updCustomer->setcardnum($_POST['inpCardNumber']);
        $updCustomer->setcardexp($_POST['inpCardExp']);
        $updCustomer->setcardcvv($_POST['inpCVV']);

    $updCustomer->update();

    header("Location:./profileInterface.php");
        
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Bootstrap CDN import-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <!-- Custom CSS Import-->
    <link rel="stylesheet" href="../style/landing.css">
    <link rel="stylesheet" href="../style/products.css">
    <link rel="stylesheet" href="../style/order.css">
    <!-- Roboto Font-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet"> 
    <!-- Cart icon (Imported from Google icons)-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <!-- Heart icon -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,500,1,0" />
    <title>Shipping Page</title>
</head>
<body class="bg-body-tertiary">
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
          <a class="navbar-brand" href="#"><img style="width:60px;height:auto;font-weight:600;margin-right:20px;"src="../img/logo.png">NutriBest</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
            <ul class="navbar-nav  mb-1 mb-lg-0 ">
              <li class="nav-item">
                <a class="nav-link " aria-current="page" href="./index.html">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">About</a>
              </li>
              <li class="nav-item">
                <a class="nav-link " href="./products.html">Products</a>
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
                  <li><a class="dropdown-item" href="#">Order Now</a></li>
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
    
     <div class="row flex-inline flex-wrap mb-5" style="padding-bottom:3rem;background-image:url('./img/pattern.png');background-size:30rem">
        <!-- Shipping Form-->
     <div class="col-md-8 container-sm pt-5 " style="padding:2rem 5rem;margin-top:2rem;backdrop-filter: blur(50px);border-radius:15px;background-color:#e1e9f0;">
            <h3 class="mb-3" style="font-weight:600">Shipping Details</h3>
            <p style="color:#5c5c5c">Update your shipping information.</p>
            <form class="row g-3" action="" method="POST" name="shippingform" >
                <div class="col-md-6">
                  <label for="inpName" class="form-label">First name</label>
                  <input type="text" value="<?= $userdata['ID']?>"name="inpID" hidden>
                  <input type="text" class="form-control" id="inpName" name="inpName" value="<?=$userdata['name'] ?>">
                  <p class="text-danger" id="errorName"></p>
                </div>
                <div class="col-md-6">
                  <label for="inpSurname" class="form-label">Last Name</label>
                  <input type="text" class="form-control" name="inpSurname" id="inpSurname" value="<?=$userdata['surname'] ?>">
                  <p class="text-danger" id="errorSurname"></p>
                </div>
                <div class="col-12">
                  <label for="inpAddress" class="form-label">Address</label>
                  <input type="text" class="form-control" id="inpAddress" name="inpAddress" placeholder="1234 Main St" value="<?=$userdata['address'] ?>">
                  <p class="text-danger" id="errorAddress"></p>
                </div>
                <div class="col-12">
                  <label for="inpAddress2" class="form-label">Address 2</label>
                  <input type="text" class="form-control" id="inpAddress2" name="inpAddress2" placeholder="Apartment, studio, or floor" value="<?=$userdata['address2'] ?>">
                  <p class="text-danger" id="errorAddress2"></p>
                </div>
                <div class="col-md-6">
                  <label for="inpCity" class="form-label">City</label>
                  <input type="text" class="form-control" id="inpCity" name="inpCity" value="<?=$userdata['city'] ?>">
                  <p class="text-danger" id="errorCity"></p>
                </div>
                <div class="col-md-4">
                  <label for="inpState" class="form-label">State</label>
                  <select id="inpState" name="inpState" class="form-select" value="<?=$userdata['state'] ?>">
                    <option value="" selected></option>
                    <option value="AL">Alabama</option>
                    <option value="AK">Alaska</option>
                    <option value="AZ">Arizona</option>
                    <option value="AR">Arkansas</option>
                    <option value="CA">California</option>
                    <option value="CO">Colorado</option>
                    <option value="CT">Connecticut</option>
                    <option value="DE">Delaware</option>
                    <option value="DC">District Of Columbia</option>
                    <option value="FL">Florida</option>
                    <option value="GA">Georgia</option>
                    <option value="HI">Hawaii</option>
                    <option value="ID">Idaho</option>
                    <option value="IL">Illinois</option>
                    <option value="IN">Indiana</option>
                    <option value="IA">Iowa</option>
                    <option value="KS">Kansas</option>
                    <option value="KY">Kentucky</option>
                    <option value="LA">Louisiana</option>
                    <option value="ME">Maine</option>
                    <option value="MD">Maryland</option>
                    <option value="MA">Massachusetts</option>
                    <option value="MI">Michigan</option>
                    <option value="MN">Minnesota</option>
                    <option value="MS">Mississippi</option>
                    <option value="MO">Missouri</option>
                    <option value="MT">Montana</option>
                    <option value="NE">Nebraska</option>
                    <option value="NV">Nevada</option>
                    <option value="NH">New Hampshire</option>
                    <option value="NJ">New Jersey</option>
                    <option value="NM">New Mexico</option>
                    <option value="NY">New York</option>
                    <option value="NC">North Carolina</option>
                    <option value="ND">North Dakota</option>
                    <option value="OH">Ohio</option>
                    <option value="OK">Oklahoma</option>
                    <option value="OR">Oregon</option>
                    <option value="PA">Pennsylvania</option>
                    <option value="RI">Rhode Island</option>
                    <option value="SC">South Carolina</option>
                    <option value="SD">South Dakota</option>
                    <option value="TN">Tennessee</option>
                    <option value="TX">Texas</option>
                    <option value="UT">Utah</option>
                    <option value="VT">Vermont</option>
                    <option value="VA">Virginia</option>
                    <option value="WA">Washington</option>
                    <option value="WV">West Virginia</option>
                    <option value="WI">Wisconsin</option>
                    <option value="WY">Wyoming</option>
                </select>
                <p class="text-danger" id="errorState"></p>
                </div>
                <div class="col-md-2">
                  <label for="inpZip" class="form-label">Zip</label>
                  <input type="text" class="form-control" id="inpZip" name="inpZip" value="<?=$userdata['zip'] ?>">
                
                </div>
                <div class="col-md-6">
                    <label for="inpEmail" class="form-label">E-Mail</label>
                    <input type="text" class="form-control" id="inpEmail" name="inpEmail" value="<?=$userdata['email'] ?>">
             
                  </div>
                  <div class="col-md-6">
                    <label for="inpPhone" class="form-label">Phone Number</label>
                    <input type="text" class="form-control" id="inpPhone" name="inpPhone" value="<?=$userdata['phone'] ?>">
               
                  </div>
                  <div class="col-md-6">
                    <label for="inpPassword" class="form-label">Password</label>
                    <input type="text" class="form-control" id="inpPassword" name="inpPassword" value="<?=$userdata['password'] ?>">
                    
                  </div>
                  <h3 class="mb-3" style="font-weight:600">Payment Info</h3>
                  <div class="col-md-6">
                  <label for="inpCardName" class="form-label">First Name</label>
                  <input type="text" class="form-control" id="inpCardName" name="inpCardName" value="<?=$userdata['cardfirstname'] ?>">
                </div>
                <div class="col-md-6">
                  <label for="inpCardSurname" class="form-label">Last Name</label>
                  <input type="text" class="form-control" id="inpCardSurname" name="inpCardSurname"value="<?=$userdata['cardlastname'] ?>">
                </div>
                <div class="col-12">
                    <label for="inpCardNumber" class="form-label">Credit Card Number</label>
                  <input type="text" class="form-control" id="inpCardNumber" name="inpCardNumber" value="<?=$userdata['cardnum'] ?>">
                </div>
                <div class="col-md-6">
                   <label for="inpCardExp" class="form-label" >Expiration Date</label>
                  <input pattern="([0-9]{2}[/][0-9]{2})"type="text" class="form-control" id="inpCardExp" name="inpCardExp" placeholder="MM/YY" maxlength="5" value="<?=$userdata['cardexp'] ?>">
                </div>
                <div class="col-md-6">
                    <label for="inpCVV" class="form-label">CVV</label>
                    <input pattern="([0-9]{3})" maxlength="3"type="text" placeholder="&#9679;&#9679;&#9679;" class="form-control" id="inpCVV" name="inpCVV" value="<?=$userdata['cardcvv'] ?>">
                </div>

                
                <div class="col-12">
                   <button class="btn btn-primary addtocart" name="updButton" type="submit" style="font-size:1.2rem;width:100%"> Update</button></div> 
                  
                  </div>
              </form>
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
</html>