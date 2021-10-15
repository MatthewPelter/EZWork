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

const error = document.getElementById("error");
function matchPassword() {
  var x = document.getElementById("password");
  var y = document.getElementById("password2");

  if (!(x.value === y.value)) {
    error.innerText = "Password does not match.";
  } else if (x.value === y.value) {
    error.innerText = "";
  }
}

const matchPsw = document.getElementById("password2");
matchPsw.addEventListener("focusout", matchPassword);

const continueBtn = document.getElementById("continue");
continueBtn.addEventListener("click", () => {
  var fname = document.getElementById("FirstName").value;
  var lname = document.getElementById("LastName").value;
  var bday = document.getElementById("BirthDate").value;
  var phone = document.getElementById("Phone").value;
  var email = document.getElementById("Email").value;
  var password = document.getElementById("password").value;

  localStorage.setItem("FirstName", fname);
  localStorage.setItem("LastName", lname);
  localStorage.setItem("BirthDate", bday);
  localStorage.setItem("Phone", phone);
  localStorage.setItem("Email", email);
  localStorage.setItem("Password", password);

  window.location.href = "../ClientProfile/index.html";
});
