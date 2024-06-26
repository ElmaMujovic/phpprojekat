const name = document.getElementById('name');
const nameError = document.getElementById('nameError');

const lastname = document.getElementById('lastname');
const lastnameError = document.getElementById('lastnameError');

const male = document.getElementById('male');
const female = document.getElementById('female');

const genderError = document.getElementById('genderError');

const admin = document.getElementById('admin');
const teacher = document.getElementById('teacher');
const student = document.getElementById('student');

const roleError = document.getElementById('roleError');

const birthDate = document.getElementById('birthDate');
const birthDateError = document.getElementById('birthDateError');

const birthPlace = document.getElementById('birthPlace');
const birthPlaceError = document.getElementById('birthPlaceError');

const birthCountry = document.getElementById('birthCountry');
const birthCountryError = document.getElementById('birthCountryError');

const profilePicture = document.getElementById('profilePicture');
const profilePictureError = document.getElementById('profilePictureError');

const jmbg = document.getElementById('jmbg');
const jmbgError = document.getElementById('jmbgError');

const contact = document.getElementById('contact');
const contactError = document.getElementById('contactError');

const email = document.getElementById('email');
const emailError = document.getElementById('emailError');

const password = document.getElementById('password');
const passwordError = document.getElementById('passwordError');

const confirmPassword = document.getElementById('password-confirm');
const confirmPasswordError = document.getElementById('confirmPasswordError');

// Basic info div
const basicInfo = document.getElementById('basicInfo');


// Validation
const namePattern = /^[a-zA-Z]{3,16}$/;
const lastnamePattern = /^[a-zA-Z]{3,24}$/;
const datePattern = /^[0-9]{2}-[0-9]{2}-[0-9]{4}$/;
const jmbgPattern = /^[0-9]{13}$/;
const usernamePattern = /^(?=[a-zA-Z0-9._]{3,20}$)(?!.*[_.]{2})[^_.].*[^_.]$/;
const emailPattern = /^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/;
const placePattern = /^[a-zA-Z]{3,36}$/;
const countryPattern = /^[a-zA-Z]{3,36}$/;
const contactPattern=/^(\+)(3816)([0-9]){6,9}$/;

const handleSubmit = e => {
    let valid = true;

    if(birthDate.value) {
        if (moment().diff(birthDate.value, 'years') >= 18) {
            birthDateError.hidden = true;
        } else {
            birthDateError.hidden = false;
            birthDateError.innerHTML = 'Morate biti stariji od 18 godina.';
            valid = false;
        }
    } else {
        birthDateError.hidden = false;
        valid = false;
    }

    if(namePattern.test(name.value)) {
        nameError.hidden = true;        
    } else {
        nameError.hidden = false;
        valid = false;
    }

    if(lastnamePattern.test(lastname.value)) {
        lastnameError.hidden = true;
    } else {
        lastnameError.hidden = false;
        valid = false;
    }

    if(placePattern.test(birthPlace.value)) {
        birthPlaceError.hidden = true;
    } else {
        birthPlaceError.hidden = false;
        valid = false;
    }
    if(countryPattern.test(birthCountry.value)) {
        birthCountryError.hidden = true;
    } else {
        birthCountryError.hidden = false;
        valid = false;
    }

    if(male.checked === true || female.checked === true) {
        genderError.hidden = true;
    } else {
        genderError.hidden = false;
        valid = false;
    }

    if(jmbgPattern.test(jmbg.value)) {
        jmbgError.hidden = true;
    } else {
        jmbgError.hidden = false;
        valid = false;
    }

    if (profilePicture.files.length > 0) {
        profilePictureError.hidden = true
    } else {
        profilePictureError.hidden = false;
        valid = false;
    }

    if(contactPattern.test(contact.value)) {
        contactError.hidden = true;
    } else {
        contactError.hidden = false;
        valid = false;
    }
    if(emailPattern.test(email.value)) {
        emailError.hidden = true;
    } else {
        emailError.hidden = false;
        valid = false;
    }

    if((password.value.length >= 8) || (password.value !== "")) {
        passwordError.hidden = true;
    } else {
        passwordError.hidden = false;
        valid = false;
    }

    if((password.value === confirmPassword.value)) {
        confirmPasswordError.hidden = true;
    } else {
        confirmPasswordError.hidden = false;
        valid = false;
    }

    if(teacher.checked === true || admin.checked === true || student.checked === true) {
        roleError.hidden = true;
    } else {
        roleError.hidden = false;
        valid = false;
    }

    if(!valid) {
        e.preventDefault();
    }
}