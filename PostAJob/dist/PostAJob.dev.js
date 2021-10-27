"use strict";

var option1 = document.getElementById("option1");
var option2 = document.getElementById("option2");
var option1Circle = document.getElementById("option1Circle");
var option2Circle = document.getElementById("option2Circle");
var continueBtn = document.getElementById("continue");
var choosen = 0;
option1.addEventListener("click", function () {
  option1.style.border = "1.5px solid #054e97";
  option2.style.border = "1.25px solid lightgrey";
  option1Circle.style.color = " #054e97";
  option1Circle.style.border = ".7px solid #054e97";
  option2Circle.style.color = "transparent";
  option2Circle.style.border = ".7px solid lightgrey";
  continueBtn.style.background = "#054e97";
  continueBtn.style.color = "white";
  continueBtn.style.cursor = "pointer";
  choosen = 1;
});
option2.addEventListener("click", function () {
  option1.style.border = "1.25px solid lightgrey";
  option2.style.border = "1.5px solid #054e97";
  option1Circle.style.color = "transparent";
  option1Circle.style.border = ".7px solid lightgrey";
  option2Circle.style.color = " #054e97";
  option2Circle.style.border = ".7px solid #054e97";
  continueBtn.style.background = "#054e97";
  continueBtn.style.color = "white";
  continueBtn.style.cursor = "pointer";
  choosen = 2;
});
continueBtn.addEventListener("click", function () {
  if (choosen === 1) {
    localStorage.setItem("TimePeriod", "Short Term");
    window.location.href = "./postTitle.html";
  } else if (choosen === 2) {
    localStorage.setItem("TimePeriod", "Long Term");
    window.location.href = "./postTitle.html";
  } else {
    localStorage.setItem("TimePeriod", null);
  }
});