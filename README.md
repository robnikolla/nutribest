# Nutribest

Nutribest is a website that specializes in selling vitamin supplements online. It is an E-commerce website built using HTML, CSS (Bootstrap), JS (jQuery, AJAX), PHP, and MySQL. The website is designed to be user-friendly, with several pages that provide users with an interactive experience. Its responsive design ensures that users can access the website from anywhere and at any time, making it convenient for them to purchase their favorite supplements.

The homepage is the first page a user sees when they visit Nutribest. It is designed to be informative and attractive, with eye-catching images of the products and a brief overview of what the website is about.

The products page is where users can view and purchase the supplements available on Nutribest.Each product has a description and an image, along with its price and a button to add it to the user's cart.

## Homepage

![Homepage screenshot](/screenshots/homepage.png?raw=true "Homepage")

## Products

![Products screenshot](/screenshots/products.png?raw=true "Products")

## Shipping Details Form

All inputs have individual error messages that are checked everytime the submit button is clicked.
E-mail and Phone number inputs are validated using RegEx formats.
If there are no errors, all the input values are stored into sessionStorage and the checkout form will open.
![Shipping Form](/screenshots/shippingdetails.png?raw=true "Shipping Details")

## Checkout Form

In this page the Expiration Date, CVV and Card Number Inputs are validated using PHP.
After clicking the submit button the input values together with the values stored in sessionStorage from shipping details form will be sent to an external PHP script using AJAX which will validate checkout inputs and return the input values in json format as requested. It will also initialize a connection with the SQL database using PDO and upload the data to a table which will store them.
![checkout](/screenshots/checkout.png?raw=true "Shipping Details")
![jsondata](/screenshots/json.png?raw=true "JSON Data")
![phpmyadmin](/screenshots/phpmyadmin.png?raw=true "JSON Data")

## Order Confirmation Page

This is the last page the user visits when ordering.
The customers name is retrieved from a sessionStorage variable.
![thankypu](/screenshots/thankyou.png?raw=true "Thank You")
