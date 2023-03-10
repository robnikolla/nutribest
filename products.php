<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
    <!-- Bootstrap CDN import-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <!-- Custom CSS Import-->
    <link rel="stylesheet" href="./style/landing.css">
    <link rel="stylesheet" href="./style/products.css">
    <!-- Roboto Font-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet"> 
    <!-- Cart icon (Imported from Google icons)-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <!-- Heart icon -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,500,1,0" />
</head>
<body>
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
                <a class="nav-link active" href="./products.html">Products</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Contact</a>
              </li>
            </ul>
          </div>
          <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
            <ul class="navbar-nav  mb-1 mb-lg-0">
             
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" data-bs-toggle="dropdown" aria-expanded="false"> 
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

<h2 class="text-center my-4">OUR PRODUCTS</h2>
        <div class="d-flex justify-content-start flex-row flex-wrap " style="padding:0 10vh">
                


        <?php 
        include_once("./dbCon.php");

        $sql = "SELECT * FROM product";
        $stm = $databaseconn->connDB()->prepare($sql);
        $stm->execute();
        $products = $stm->fetchAll();


        foreach($products as $product){
        ?>
        <!--  Product Card -->
        <div class="prodcard m-3  d-flex justify-content-center rounded" >
            <div class="card" style="width: 17rem;height:auto ;margin:0">
                <img src="./bottles/pbottle1.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                  <code ><?= $product['brand']?></code>
                    <h5 class="sd-5 fw-bold text-"><?= $product['name']?></h5>
                  <p style="color:#5c5c5c" class="card-text"><?= $product['description']?></p>
                    
                  <div class="d-flex justify-content-between" > 
                    <div>
                    <p class="fw-bold fs-6 " style="color:#012169;margin-bottom:-8px" >$<?= $product['price']?></p>
                    <code style="color:#5c5c5c">FREE shipping</code>
                    </div>
                    
                   <button class="btn addtocart"> Add to cart</button>
                  </div> 
                </div>
              </div>
        </div>
          <?php } ?>
        
        
      </div>

      <footer class="container py-5 mt-5">
        <div class="row">
          <div class="col-12 col-md">
            <img style="width:60px;height:auto;font-weight:600;margin-right:20px;"src="./img/logo.png">
            <small class="d-block mb-3 text-muted">?? 2017-2023</small>
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