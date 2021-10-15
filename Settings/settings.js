//Settings Nav
const myInfo = document.getElementById("myInfo");
const passwordSecurity = document.getElementById("passwordSecurity");
const billingMethods = document.getElementById("billingMethods");
const notification = document.getElementById("notification");
const connectedServices = document.getElementById("connectedServices");

const settingsTitle = document.getElementById("settings-title");

//All cards
const accountInfo = document.querySelector(".settings-container");
const passwordCard = document.querySelector(".settings-password");
const billingCard = document.querySelector(".settings-billing");
const notificationCard = document.querySelector(".notification");
const servicesCard = document.querySelector(".connectedServices");

myInfo.addEventListener("click", () => {
  myInfo.style.background = "lightgrey";
  passwordSecurity.style.background = "transparent";
  billingMethods.style.background = "transparent";
  notification.style.background = "transparent";
  connectedServices.style.background = "transparent";

  // Hide other cards
  //accountInfo.style.display = "none";
  passwordCard.style.display = "none";
  billingCard.style.display = "none";
  notificationCard.style.display = "none";
  servicesCard.style.display = "none";

  //Display Card
  accountInfo.style.display = "inline-block";
});

passwordSecurity.addEventListener("click", () => {
  myInfo.style.background = "transparent";
  passwordSecurity.style.background = "lightgrey";
  billingMethods.style.background = "transparent";
  notification.style.background = "transparent";
  connectedServices.style.background = "transparent";

  // Hide other cards
  accountInfo.style.display = "none";
  //passwordCard.style.display = "none";
  billingCard.style.display = "none";
  notificationCard.style.display = "none";
  servicesCard.style.display = "none";

  //Display Card
  passwordCard.style.display = "inline-block";
});

billingMethods.addEventListener("click", () => {
  myInfo.style.background = "transparent";
  passwordSecurity.style.background = "transparent";
  billingMethods.style.background = "lightgrey";
  notificationCard.style.background = "transparent";
  connectedServices.style.background = "transparent";

  // Hide other cards
  accountInfo.style.display = "none";
  passwordCard.style.display = "none";
  //billingCard.style.display = "none";
  notificationCard.style.display = "none";
  servicesCard.style.display = "none";

  //Display Card
  billingCard.style.display = "inline-block";
});

notification.addEventListener("click", () => {
  myInfo.style.background = "transparent";
  passwordSecurity.style.background = "transparent";
  billingMethods.style.background = "transparent";
  notification.style.background = "lightgrey";
  connectedServices.style.background = "transparent";

  // Hide other cards
  accountInfo.style.display = "none";
  passwordCard.style.display = "none";
  billingCard.style.display = "none";
  //notificationCard.style.display = "none";
  servicesCard.style.display = "none";

  //Display Card
  notificationCard.style.display = "inline-block";
});

connectedServices.addEventListener("click", () => {
  myInfo.style.background = "transparent";
  passwordSecurity.style.background = "transparent";
  billingMethods.style.background = "transparent";
  notification.style.background = "transparent";
  connectedServices.style.background = "lightgrey";

  // Hide other cards
  accountInfo.style.display = "none";
  passwordCard.style.display = "none";
  billingCard.style.display = "none";
  notificationCard.style.display = "none";
  //servicesCard.style.display = "none";

  //Display Card
  servicesCard.style.display = "inline-block";
});

//Edit account
const editAccountIcon = document.getElementById("editAccountIcon");

// Password section
const changePasswordIcon = document.getElementById("changePasswordIcon");

changePasswordIcon.addEventListener("click", () => {
  console.log("hello");
});

//Blocks Pay Now BUtton from being pressed
const balance = document.getElementById("balance");
const payBalance = document.getElementById("payBalance");

if (balance.innerText === "0.00") {
  payBalance.style.cursor = "not-allowed";
  payBalance.style.background = "lightgrey";
  payBalance.style.pointerEvents = "none";
} else {
  payBalance.style.cursor = "pointer";
}

const settingsName = document.getElementById("settingsName");
var firstName = localStorage.getItem("FirstName");
var lastName = localStorage.getItem("LastName");
settingsName.innerText = firstName.concat(" ").concat(lastName);

var email = localStorage.getItem("Email");
const settingsEmail = document.getElementById("settingsEmail");
settingsEmail.innerText = email;

var phone = localStorage.getItem("Phone");
const settingsPhone = document.getElementById("settingsPhone");
settingsPhone.innerText = phone;

var firstName = localStorage.getItem("FirstName");
var lastName = localStorage.getItem("LastName");

const user = document.getElementById("user");
user.innerText = firstName.concat(" ").concat(lastName);

const name = document.getElementById("name");
name.innerText = firstName.concat(" ").concat(lastName);
