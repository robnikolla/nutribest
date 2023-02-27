function isEmpty(str) {
    return !str.trim().length;
}
function validateShippingInfo(event) {
    event.preventDefault()

    let fname = document.forms["shippingform"]["inpName"].value
    let lname = document.forms["shippingform"]["inpSurname"].value
    let address = document.forms["shippingform"]["inpAddress"].value
    let address2 = document.forms["shippingform"]["inpAddress2"].value
    let city = document.forms["shippingform"]["inpCity"].value
    let state = document.forms["shippingform"]["inpState"].value
    let zip = document.forms["shippingform"]["inpZip"].value
    let email = document.forms["shippingform"]["inpEmail"].value
    let phone = document.forms["shippingform"]["inpPhone"].value
    let terms = document.forms["shippingform"]["inpTerms"].value

    let errfname = document.querySelector("#errorName");
    let errlname = document.querySelector("#errorSurname");
    let erraddress = document.querySelector("#errorAddress");
    let erraddress2 = document.querySelector("#errorAddress2");
    let errcity = document.querySelector("#errorCity");
    let errstate = document.querySelector("#errorState");
    let erremail = document.querySelector("#errorEmail");
    let errphone = document.querySelector("#errorPhone");
    let errterms = document.querySelector("#errorAddress");

    const emailFormat = /^[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?$/;
    const phoneFormat = /^\(?([0-9]{3})\)?[-. ]?([0-9]{3})[-. ]?([0-9]{4})$/;

    if (isEmpty(fname)) {
        errfname.innerHTML = "Please write a name"
        return false
    }


}

function setCookie(cname, cvalue, exdays) {
    const d = new Date();
    d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
    let expires = "expires=" + d.toUTCString();
    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}