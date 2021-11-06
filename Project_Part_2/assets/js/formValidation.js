// username should not be blank, must contain an alphanumeric character,
// and cannot have any contained whitespace
function validateUsername(username) {
  if (username === "") {
    window.alert("No username entered!");
    return false;
  }
  if (!/[A-z]/.test(username)) {
    window.alert("Username must contain an alphanumeric character!");
    return false;
  }
  let trimmedValue = username.trim();
  let whitespaceRemovedValue = trimmedValue.replace(/\s/g, "");
  if (whitespaceRemovedValue !== trimmedValue || trimmedValue !== username) {
    window.alert("Username cannot have whitespace within the string!");
    return false;
  }
}

// password should be at least 6 characters, contain a number, and contain a capital letter
function validatePassword(password) {
  if (password.length < 6) {
    window.alert("password must contain at least 6 characters");
  }
  if (!/[A-Z]/.test(password)) {
    window.alert("password must contain a capital letter!");
  }
  if (!/[0-9]/.test(password)) {
    window.alert("password must contain a number!");
  }
}

// use regex to test for valid email
function validateEmail(email) {
  if (!/^[^@]+@[^@]+\.[a-zA-Z]{2,}$/.test(email)) {
    window.alert("Must provide a valid email!");
  }
}

function validateForm(form) {
  let usernameIsValid = validateUsername(form.userName.value);
  let passwordIsValid = validatePassword(form.password.value);
  let emailIsValid = validateEmail(form.email.value);

  if (!usernameIsValid || !passwordIsValid || !emailIsValid) {
    return false;
  }
}
