const hourlyCard = document.getElementById("hourlyCard");
const hourlyCardBtn = document.getElementById("hourlyCard-button");

const priceCard = document.getElementById("priceCard");
const priceCardBtn = document.getElementById("priceCard-button");

const budgetContainer = document.querySelector(".budgetContainer");
const hourlyContainer = document.querySelector(".hourlyContainer");

//Array
const budget = [];

hourlyCard.addEventListener("click", () => {
  hourlyCard.style.border = "1.25px solid #054e97";
  hourlyCardBtn.style.color = "#054e97";
  hourlyCardBtn.style.border = "1.25px solid #054e97";

  //Ensure other card is default
  priceCard.style.border = "1.25px solid rgb(121, 121, 121)";
  priceCardBtn.style.border = "1.25px solid rgb(121, 121, 121)";
  priceCardBtn.style.color = " transparent";
  //show hourly Card
  hourlyContainer.style.display = "block";
  // Hide budget card
  budgetContainer.style.display = "none";
});

priceCard.addEventListener("click", () => {
  priceCard.style.border = "1.25px solid #054e97";
  priceCardBtn.style.color = "#054e97";
  priceCardBtn.style.border = "1.25px solid #054e97";

  //Ensure other card is default
  hourlyCard.style.border = " 1.25px solid rgb(121, 121, 121)";
  hourlyCardBtn.style.border = " 1.25px solid rgb(121, 121, 121)";
  hourlyCardBtn.style.color = " transparent";

  // Show budget card
  budgetContainer.style.display = "block";
  // Hide hourly card
  hourlyContainer.style.display = "none";
});

// Restricts input for the given textbox to the given inputFilter function.
function setInputFilter(textbox, inputFilter) {
  [
    "input",
    "keydown",
    "keyup",
    "mousedown",
    "mouseup",
    "select",
    "contextmenu",
    "drop",
  ].forEach(function (event) {
    textbox.addEventListener(event, function () {
      if (inputFilter(this.value)) {
        this.oldValue = this.value;
        this.oldSelectionStart = this.selectionStart;
        this.oldSelectionEnd = this.selectionEnd;
      } else if (this.hasOwnProperty("oldValue")) {
        this.value = this.oldValue;
        this.setSelectionRange(this.oldSelectionStart, this.oldSelectionEnd);
      } else {
        this.value = "";
      }
    });
  });
}
setInputFilter(document.getElementById("setMaxBudget"), function (value) {
  return /^\d*\.?\d*$/.test(value); // Allow digits and '.' only, using a RegExp
});
setInputFilter(document.getElementById("setMaxHourly"), function (value) {
  return /^\d*\.?\d*$/.test(value); // Allow digits and '.' only, using a RegExp
});
setInputFilter(document.getElementById("setMinHourly"), function (value) {
  return /^\d*\.?\d*$/.test(value); // Allow digits and '.' only, using a RegExp
});

const setMaxBudget = document.getElementById("setMaxBudget");
const addMaxBudget = document.getElementById("addMaxBudget");

const alertBudget = document.getElementById("alertBudget");

const userBudget = document.getElementById("userBudget");
const OfficalBudget = document.getElementById("OfficalBudget");

addMaxBudget.addEventListener("click", () => {
  if (setMaxBudget.value < 5) {
    alertBudget.innerHTML =
      `<i class="fa fa-exclamation-circle" aria-hidden="true"></i>`.concat(
        "Minimum budget is 5 US Dollars"
      );

    //block review button
    reviewJobPost.style.background = "lightgrey";
    reviewJobPost.style.color = "grey";
    reviewJobPost.style.cursor = "none";
    reviewJobPost.style.pointerEvents = "none";
  } else {
    alertBudget.innerHTML = "";
    userBudget.innerText = setMaxBudget.value;
    OfficalBudget.style.display = "flex";

    if (budget.length == 0) {
      budget.push(setMaxBudget.value);
    } else {
      budget.pop(setMinHourly.value);
      budget.pop(setMaxHourly.value);
    }

    //show review button
    reviewJobPost.style.background = "#054e97";
    reviewJobPost.style.color = "white";
    reviewJobPost.style.cursor = "pointer";
    reviewJobPost.style.pointerEvents = "visible";
  }
});

// HOURLY CONTAINER js
const addMinHourlyBtn = document.getElementById("addMinHourly");
const addMaxHourlyBtn = document.getElementById("addMaxHourly");

const setMinHourly = document.getElementById("setMinHourly");
const setMaxHourly = document.getElementById("setMaxHourly");

const alertMinHourly = document.getElementById("alertMinHourly");
const officialMinRate = document.getElementById("officialMinRate");

addMinHourlyBtn.addEventListener("click", () => {
  if (setMinHourly.value < 3) {
    alertMinHourly.innerHTML =
      `<i class="fa fa-exclamation-circle" aria-hidden="true"></i>`.concat(
        "The minimum hourly rate on EZwork is $3. Please update your range."
      );

    //block review button
    reviewJobPost.style.background = "lightgrey";
    reviewJobPost.style.color = "grey";
    reviewJobPost.style.cursor = "none";
    reviewJobPost.style.pointerEvents = "none";
  } else {
    if (budget.length == 0) {
      budget.push(setMinHourly.value);
    } else {
      budget.pop(setMaxBudget.value);
    }
    alertMinHourly.innerHTML = "";
    officialMinRate.innerText = setMinHourly.value;
  }
});

const officialMaxRate = document.getElementById("officialMaxRate");
const MaxError = document.getElementById("MaxError");

addMaxHourlyBtn.addEventListener("click", () => {
  if (setMaxHourly.value <= officialMinRate.innerText) {
    MaxError.innerHTML =
      `<i class="fa fa-exclamation-circle" aria-hidden="true"></i>`.concat(
        "Please enter a higher value than the minimum hourly rate."
      );

    //block review button
    reviewJobPost.style.background = "lightgrey";
    reviewJobPost.style.color = "grey";
    reviewJobPost.style.cursor = "none";
    reviewJobPost.style.pointerEvents = "none";
  } else {
    if (budget.length == 1) {
      budget.push(setMaxHourly.value);
    } else {
      budget.pop(setMaxBudget.value);
    }
    MaxError.innerHTML = "";
    officialMaxRate.innerText = setMaxHourly.value;

    reviewJobPost.style.background = "#054e97";
    reviewJobPost.style.color = "white";
    reviewJobPost.style.cursor = "pointer";
    reviewJobPost.style.pointerEvents = "visible";
  }
});

// Canceling Budget Pop up
const noBudgetBtn = document.getElementById("noBudget");

const noBudgetPopup = document.querySelector(".noBudgetPopup");
const closePopupX = document.getElementById("closePopupX");

// Open Popup
noBudgetBtn.addEventListener("click", () => {
  noBudgetPopup.style.display = "flex";
});

// Closes the popup
closePopupX.addEventListener("click", () => {
  noBudgetPopup.style.display = "none";
});

//Buttons on Popup
const addBudgetBtn = document.getElementById("addBudgetBtn");
const noBudgetBtn2 = document.getElementById("noBudgetBtn");

addBudgetBtn.addEventListener("click", () => {
  noBudgetPopup.style.display = "none";
});

// Continue BTN
const reviewJobPost = document.getElementById("reviewJobPost");

noBudgetBtn2.addEventListener("click", () => {
  noBudgetPopup.style.display = "none";

  reviewJobPost.style.background = "#054e97";
  reviewJobPost.style.color = "white";
  reviewJobPost.style.cursor = "pointer";
  reviewJobPost.style.pointerEvents = "visible";

  localStorage.setItem("budget", "no budget set");

  window.location.href = "./reviewJobPost.html";
});

reviewJobPost.addEventListener("click", () => {
  localStorage.setItem("budget", JSON.stringify(budget));
  window.location.href = "./reviewJobPost.html";
});
//window.location.href = "./reviewJobPost.html";
