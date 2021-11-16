"use strict";

//Settings Nav
var myInfo = document.getElementById("myInfo");
var passwordSecurity = document.getElementById("passwordSecurity");
var billingMethods = document.getElementById("billingMethods");
var settingsTitle = document.getElementById("settings-title"); //All cards

var accountInfo = document.querySelector(".settings-container");
var passwordCard = document.querySelector(".settings-password");
var billingCard = document.querySelector(".settings-billing");
myInfo.addEventListener("click", function () {
  myInfo.style.background = "lightgrey";
  passwordSecurity.style.background = "transparent";
  billingMethods.style.background = "transparent"; // Hide other cards
  //accountInfo.style.display = "none";

  passwordCard.style.display = "none";
  billingCard.style.display = "none"; //Display Card

  accountInfo.style.display = "inline-block";
});
passwordSecurity.addEventListener("click", function () {
  myInfo.style.background = "transparent";
  passwordSecurity.style.background = "lightgrey";
  billingMethods.style.background = "transparent"; // Hide other cards

  accountInfo.style.display = "none"; //passwordCard.style.display = "none";

  billingCard.style.display = "none"; //Display Card

  passwordCard.style.display = "inline-block";
});
billingMethods.addEventListener("click", function () {
  myInfo.style.background = "transparent";
  passwordSecurity.style.background = "transparent";
  billingMethods.style.background = "lightgrey"; // Hide other cards

  accountInfo.style.display = "none";
  passwordCard.style.display = "none"; //billingCard.style.display = "none";
  //Display Card

  billingCard.style.display = "inline-block";
}); //Edit account

var editAccountIcon = document.getElementById("editAccountIcon"); //Blocks Pay Now BUtton from being pressed

var balance = document.getElementById("balance");
var payBalance = document.getElementById("payBalance");

if (balance.innerText === "0.00") {
  payBalance.style.cursor = "not-allowed";
  payBalance.style.background = "lightgrey";
  payBalance.style.pointerEvents = "none";
} else {
  payBalance.style.cursor = "pointer";
}