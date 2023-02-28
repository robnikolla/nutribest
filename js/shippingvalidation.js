// Function that checks if input is empty
function isEmpty(str) {
    //trim() removes spaces before and after string
    return !str.trim().length;
}
function validateShippingInfo(event) {
    event.preventDefault()
    // Input Values
    let fname = document.forms["shippingform"]["inpName"].value
    let lname = document.forms["shippingform"]["inpSurname"].value
    let address = document.forms["shippingform"]["inpAddress"].value
    let address2 = document.forms["shippingform"]["inpAddress2"].value
    let city = document.forms["shippingform"]["inpCity"].value
    let state = document.forms["shippingform"]["inpState"].value
    let zip = document.forms["shippingform"]["inpZip"].value
    let email = document.forms["shippingform"]["inpEmail"].value
    let phone = document.forms["shippingform"]["inpPhone"].value
    let terms = document.forms["shippingform"]["inpTerms"]
    
    // Error Messages 
    let errfname = document.querySelector("#errorName")
    let errlname = document.querySelector("#errorSurname")
    let erraddress = document.querySelector("#errorAddress")
    let erraddress2 = document.querySelector("#errorAddress2")
    let errcity = document.querySelector("#errorCity")
    let errstate = document.querySelector("#errorState")
    let errzip = document.querySelector("#errorZip")
    let erremail = document.querySelector("#errorEmail")
    let errphone = document.querySelector("#errorPhone")
    let errterms = document.querySelector("#errorTerms")

    // RegEx formats for email and phone   
    const emailFormat = /^[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?$/ 
    const phoneFormat = /^\(?([0-9]{3})\)?[-. ]?([0-9]{3})[-. ]?([0-9]{4})$/;
    
    // Boolean variable which decides if the form gets stored into cookies
    let valid = true;
 
    // First Name Input Validation 
    if (isEmpty(fname)) {
        errfname.innerHTML = "Please write a name"
        valid = false

    }else{
        errfname.innerHTML ='';
    }
    // Last Name Input Validation 
    if (isEmpty(lname)) {
        errlname.innerHTML = "Please write a surname"
        valid = false

    }else{
        errlname.innerHTML ='';
    }
    // Address Input Validation 
    if (isEmpty(address)) {
        erraddress.innerHTML = "Please write an address"
        valid = false
    
    }else{
        erraddress.innerHTML ='';
    }
    // Second Address Input Validation 
    if (isEmpty(address2)) {
        erraddress2.innerHTML = "Please write a second address "
        valid = false
    
    }else{
        erraddress2.innerHTML ='';
    }
    // City Input Validation 
    if (isEmpty(city)) {
        errcity.innerHTML = "Please write a city"
        valid = false
      
    }else{
        errcity.innerHTML ='';
    }
    // City Input Validation 
    if (isEmpty(state)) {
        errstate.innerHTML = "Please select a state"
        valid = false
      
    }else{
        errstate.innerHTML ='';
    }
    // ZIP Input Validation 
    if (isEmpty(zip)) {
        errzip.innerHTML = "Please write a zip code"
        valid = false
      
    }else{
        errzip.innerHTML ='';
    }
    // Email Input Validation 
    if (isEmpty(email)) {
        erremail.innerHTML = "Please write an email"
        valid = false
    }else{
        if(!emailFormat.test(email)){
            // Checks if email input value matches the regex
            erremail.innerHTML = "Email is not valid"
            valid = false
        }else{
            erremail.innerHTML ='';
        }
    }
    // Phone Input Validation
    if (isEmpty(phone)) {
        errphone.innerHTML = "Please write a phone number"
        valid = false
    }else{
        if(!phoneFormat.test(phone)){
            // Checks if phone matches the regex 
            errphone.innerHTML = "Phone number is not valid"
            valid = false
        }else{
            errphone.innerHTML ='';

        }
    }
    // Terms and Conditions Validation
    if (!terms.checked) {
        errterms.innerHTML = "Please accept the agreement to proceed"
        valid = false
      
    }else{
        errterms.innerHTML ='';
    }
}