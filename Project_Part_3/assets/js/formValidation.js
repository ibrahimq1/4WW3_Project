// username should not be blank, must contain an alphanumeric character,
// and cannot have any contained whitespace
function validateUsername(username) {
  document.getElementById("nameerror").innerHTML = "";
  if (username === "") {
    //window.alert("No username entered!");
    document.getElementById("nameerror").innerHTML += '<p style="color:red";>No username entered!</p>';
    return false;
  }
  if (!/[A-z]/.test(username)) {
    //window.alert("Username must contain an alphanumeric character!");
    document.getElementById("nameerror").innerHTML += '<p style="color:red";>Username must contain an alphanumeric character!</p>';
    return false;
  }
  let trimmedValue = username.trim();
  let whitespaceRemovedValue = trimmedValue.replace(/\s/g, "");
  if (whitespaceRemovedValue !== trimmedValue || trimmedValue !== username) {
    //window.alert("Username cannot have whitespace within the string!");
    document.getElementById("nameerror").innerHTML += '<p style="color:red";>Username cannot have whitespace within the string!</p>';
    return false;
  }
}

// password should be at least 6 characters, contain a number, and contain a capital letter
function validatePassword(password) {
  document.getElementById("passerror").innerHTML = ""; 
  if (password.length < 6) {
    //window.alert("password must contain at least 6 characters");
    document.getElementById("passerror").innerHTML += '<p style="color:red";>Password must contain at least 6 characters</p>';
  }
  if (!/[A-Z]/.test(password)) {
    //window.alert("password must contain a capital letter!");
    document.getElementById("passerror").innerHTML += '<p style="color:red";>Password must contain a capital letter!</p>';
  }
  if (!/[0-9]/.test(password)) {
    //window.alert("password must contain a number!");
    document.getElementById("passerror").innerHTML += '<p style="color:red";>Password must contain a number!</p>';
  }
}

// use regex to test for valid email
function validateEmail(email) {
  document.getElementById("emailerror").innerHTML = "";
  if (!/^[^@]+@[^@]+\.[a-zA-Z]{2,}$/.test(email)) {
    //window.alert("Must provide a valid email!");
    document.getElementById("emailerror").innerHTML += '<p style="color:red";>Must provide a valid email!</p>';
  }
}

function validateForm(form) {
  let usernameIsValid = validateUsername(form.userName.value);
  let passwordIsValid = validatePassword(form.password.value);
  let emailIsValid = validateEmail(form.email.value);

  if (!usernameIsValid || !passwordIsValid || !emailIsValid) {
    return false;
  }
  document.getElementById("passerror").innerHTML = "";
}
