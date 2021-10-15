//Show Password functionality
const showPswrd = document.getElementById("show");

showPswrd.addEventListener("click", showPassword);

function showPassword() {
  var x = document.getElementById("password");
  if (x.value === "") {
  } else if (x.type === "password") {
    x.type = "text";
    show.innerText = "Hide Password";
  } else {
    x.type = "password";

    show.innerText = "Show Password";
  }
}
const submit = document.getElementById("submit");
submit.addEventListener("click", () => {});

var Email = localStorage.getItem("Email");
var Password = localStorage.getItem("Password");

const email = document.getElementById("email");
const password = document.getElementById("password");

const submitBtn = document.getElementById("submit");
const emailError = document.getElementById("emailError");
const passwordError = document.getElementById("passwordError");

email.addEventListener("click", () => {
  emailError.innerHTML = "";
});
password.addEventListener("click", () => {
  passwordError.innerHTML = "";
});
submitBtn.addEventListener("click", () => {
  if (email.value == "" || password.value == "") {
    emailError.innerHTML =
      `<i class="fa fa-exclamation-circle" aria-hidden="true"></i>`.concat(
        "Please enter your email."
      );
    passwordError.innerHTML =
      `<i class="fa fa-exclamation-circle" aria-hidden="true"></i>`.concat(
        "Please enter your password."
      );
  } else if (
    email.value.localeCompare(Email) !== 0 &&
    password.value.localeCompare(Password) !== 0
  ) {
    emailError.innerHTML =
      `<i class="fa fa-exclamation-circle" aria-hidden="true"></i>`.concat(
        "Email not found."
      );
    passwordError.innerHTML =
      `<i class="fa fa-exclamation-circle" aria-hidden="true"></i>`.concat(
        "Incorrect Password"
      );
  } else if (email.value.localeCompare(Email) !== 0) {
    emailError.innerHTML =
      `<i class="fa fa-exclamation-circle" aria-hidden="true"></i>`.concat(
        "Email not found."
      );
  } else if (password.value.localeCompare(Password) !== 0) {
    passwordError.innerHTML =
      `<i class="fa fa-exclamation-circle" aria-hidden="true"></i>`.concat(
        "Incorrect Password"
      );
  } else if (
    email.value.localeCompare(Email) === 0 &&
    password.value.localeCompare(Password) === 0
  ) {
    window.location.href = "../ClientProfile/index.html";
  }
});
