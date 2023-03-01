<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Bootstrap CDN import-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <!-- Custom CSS Import-->
    <link rel="stylesheet" href="./style/landing.css">
    <link rel="stylesheet" href="./style/products.css">
    <link rel="stylesheet" href="./style/order.css">
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
          <a class="navbar-brand" href="#"><img style="width:60px;height:auto;font-weight:600;margin-right:20px;"src="./img/logo.png">NutriBest</a>
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
    
     <div class="row flex-inline flex-wrap" style="padding-bottom:3rem;background-image:url('./img/pattern.png');background-size:30rem">
        <!-- Shipping Form-->
     <div class="col-md-6 container-sm "style="padding:3rem 5rem;margin-top:2rem;backdrop-filter: blur(50px);border-radius:15px;background-color:#e1e9f0; ">
            <h3 class="mb-3" style="font-weight:600">Checkout</h3>
            <p style="color:#5c5c5c">Please provide your payment information.</p>
            <form class="row g-3" name="checkoutform" method="POST">
                <div class="col-md-6">
                  <label for="inpCardName" class="form-label">First Name</label>
                  <input type="text" class="form-control" id="inpCardName">
                </div>
                <div class="col-md-6">
                  <label for="inpCardSurname" class="form-label">Last Name</label>
                  <input type="text" class="form-control" id="inpCardSurname">
                </div>
                <div class="col-12">
                    <label for="inpCardNumber" class="form-label">Credit Card Number</label>
                  <input type="text" class="form-control" id="inpCardNumber">
                </div>
                <div class="col-md-6">
                   <label for="inpCardExp" class="form-label" >Expiration Date</label>
                  <input pattern="([0-9]{2}[/][0-9]{2})"type="text" class="form-control" id="inpCardExp" placeholder="MM/YY" maxlength="5">
                </div>
                <div class="col-md-6">
                    <label for="inpCVV" class="form-label">CVV</label>
                    <input pattern="([0-9]{3})" maxlength="3"type="text" placeholder="&#9679;&#9679;&#9679;" class="form-control" id="inpCVV">
                </div>
                <br><br>
                <div class="col-12">
                   <button id="submitform" class="btn addtocart" style="font-size:1.2rem;width:100%">  Confirm Order</button></div> 
                  </div>
              </form>
      </div>
</div>






<footer class="container py-5">
  <div class="row">
    <div class="col-12 col-md">
      <img style="width:60px;height:auto;font-weight:600;margin-right:20px;"src="./img/logo.png">
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
        
        $("#submitform").click(function(event) {
        // Prevents default submit
        event.preventDefault();
        let cardfirstname = $("#inpCardName").val();
        let cardlastname = $("#inpCardSurname").val();
        let cardnum = $("#inpCardNumber").val();
        let cardexp = $("#inpCardExp").val();
        let cardcvv = $("#inpCVV").val();
        
        // Ajax initialization
        $.ajax({
        type: "POST",
        url: "./validate.php",
        data: {
          // POST Variables sent to PHP
            firstname:sessionStorage.getItem('fname'),
            lastname:sessionStorage.getItem('lname'),
            address:sessionStorage.getItem('address'),
            address2:sessionStorage.getItem('address2'),
            city:sessionStorage.getItem('city'),
            state:sessionStorage.getItem('state'),
            zip:sessionStorage.getItem('zip'),
            email:sessionStorage.getItem('email'),
            phone:sessionStorage.getItem('phone'),
            cardfirstname:cardfirstname,
            cardlastname:cardlastname,
            cardnum:cardnum,
            cardexp:cardexp,
            cardcvv:cardcvv,
        },
        cache:true,
        success: function(data) {
          alert(data);

          let jsondata = JSON.parse(data);
          if(jsondata.success == 1){
            window.location.href = "./complete.html"
          }
        },
        async:true,
        error: function(xhr, status, error) {
        console.error(xhr.response,status,error);
        }
        });
        
        });
        
        });
       </script>

    </body>
</html>