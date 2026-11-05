function validateFirstName() {

    let firstName = document.getElementById("firstName").value;

    if (firstName.trim() == "") {
        alert("Please enter your first name.");
        return false;
    }

    if (!/^[a-zA-Z]+$/.test(firstName)) {
        alert("First name should contain only letters.");
        return false;
    }

    return true;
}



function validateLastName() {

    let lastName = document.getElementById("lastName").value;

    if (lastName.trim() == "") {
        alert("Please enter your last name.");
        return false;
    }

    if (!/^[a-zA-Z]+$/.test(lastName)) {
        alert("Last name should contain only letters.");
        return false;
    }

    return true;
}


function validateEmail() {

    let email = document.getElementById("email").value;

    let emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

    if (!emailPattern.test(email)) {
        alert("Please enter a valid email address.");
        return false;
    }

    return true;
}



function validatePhone() {

    let phone = document.getElementById("phone").value;

    let phonePattern = /^\d{10}$/;

    if (!phonePattern.test(phone)) {
        alert("Please enter a valid 10-digit phone number.");
        return false;
    }

    return true;
}



function validateForm() {

    if (!validateFirstName()) {
        return false;
    }

    if (!validateLastName()) {
        return false;
    }

    if (!validateEmail()) {
        return false;
    }

    if (!validatePhone()) {
        return false;
    }

    alert("Form submitted successfully!");

    return true;
}