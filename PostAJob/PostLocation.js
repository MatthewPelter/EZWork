const usOnlyCard = document.getElementById("usOnly");
const worldwideCard = document.getElementById("worldwide");

//Buttons for cards
const worldwideBtn = document.getElementById("worlwide-button");
const usOnlyBtn = document.getElementById("usOnly-button");

// Us locations And worldwide locations
const usOnlyLocations = document.querySelector(".usOnlyCard");
const worldwideLocations = document.querySelector(".worldwideCard");

const allLocations = [];
worldwideCard.addEventListener("click", () => {
  worldwideCard.style.border = "1.25px solid #054e97";
  worldwideBtn.style.color = "#054e97";
  worldwideBtn.style.border = "1.25px solid #054e97";

  usOnlyCard.style.border = "1.25px solid lightgrey";
  usOnlyBtn.style.color = "transparent";
  usOnlyBtn.style.border = "1.25px solid lightgrey";

  worldwideLocations.style.display = "inline-block";
  usOnlyLocations.style.display = "none";

  //Ensure the us data is clear
  //allLocations.splice(0, allLocations.length);
  selectedLocationsContainer.style.display = "none";
  selectedLocationsCard.style.display = "none";
});
usOnlyCard.addEventListener("click", () => {
  usOnlyCard.style.border = "1.25px solid #054e97";
  usOnlyBtn.style.color = "#054e97";
  usOnlyBtn.style.border = "1.25px solid #054e97";

  worldwideCard.style.border = "1.25px solid lightgrey";
  worldwideBtn.style.color = "transparent";
  worldwideBtn.style.border = "1.25px solid lightgrey";

  usOnlyLocations.style.display = "inline-block";
  worldwideLocations.style.display = "none";

  //Ensure the worldwide data is clear
  //allLocations.splice(0, allLocations.length);
  selectedLocationsContainer2.style.display = "none";
  selectedLocationsCard2.style.display = "none";
});

const e = document.getElementById("TimeZones&StatesID");
const a = document.getElementById("States&RegionsID");

const addBtn1 = document.getElementById("add1");
const addBtn2 = document.getElementById("add2");

const selectedLocationsCard = document.querySelector(
  ".selectedLocationsUSCard"
);
const selectedLocationsContainer = document.querySelector(
  ".selectedLocationsUS"
);

const selectedLocationsCard2 = document.querySelector(
  ".selectedLocationsWorldwideCard"
);
const selectedLocationsContainer2 = document.querySelector(
  ".selectedLocationsWorldwide"
);

const emptyError = document.getElementById("emptyError");

addBtn1.addEventListener("click", () => {
  if (e.value === "") {
    emptyError.innerText = "No input.";
  } else if (allLocations.includes(e.value) === true) {
    // Ensure duplicates are not entered
    emptyError.innerText = "Already added!";
    //console.log("leo");
  } else {
    selectedLocationsCard2.style.display = "none";
    selectedLocationsContainer2.style.display = "none";

    selectedLocationsContainer.style.display = "inline-block";
    //console.log(e.value);
    var locationPill = document.createElement("label");
    locationPill.innerHTML = e.value;

    allLocations.push(e.value);

    selectedLocationsCard.style.display = "inline-block";
    selectedLocationsContainer.style.display = "inline-block";
    selectedLocationsContainer.appendChild(locationPill);

    //console.log(allLocations);

    if (allLocations.length > 0) {
      locationPill.addEventListener("click", () => {
        selectedLocationsContainer.removeChild(locationPill);
        allLocations.pop(locationPill.innerHTML);
        //console.log(allLocations);
      });
      nextBudget.style.background = "#054e97";
      nextBudget.style.color = "white";
      nextBudget.style.cursor = "pointer";
      nextBudget.style.pointerEvents = "visible";
    } else if ((allLocations.length = 0)) {
      nextBudget.style.background = "lightgrey";
      nextBudget.style.color = "grey";
      nextBudget.style.pointerEvents = "none";
      nextBudget.style.cursor = "notallowed";
    }
  }
});

addBtn2.addEventListener("click", () => {
  if (a.value === "") {
    emptyError.innerText = "No input.";
  } else if (allLocations.includes(a.value) === true) {
    // Ensure duplicates are not entered
    emptyError.innerText = "Already added!";
    //console.log("leo");
  } else {
    selectedLocationsCard.style.display = "none";
    selectedLocationsContainer.style.display = "none";
    //console.log(a.value);
    var locationPill = document.createElement("label");
    locationPill.innerHTML = a.value;

    allLocations.push(a.value);

    selectedLocationsCard2.style.display = "inline-block";
    selectedLocationsContainer2.style.display = "inline-block";

    selectedLocationsContainer2.appendChild(locationPill);
    //console.log(allLocations);

    if (allLocations.length > 0) {
      locationPill.addEventListener("click", () => {
        selectedLocationsContainer2.removeChild(locationPill);
        allLocations.pop(locationPill.innerHTML);
        //console.log(allLocations);
      });
      nextBudget.style.background = "#054e97";
      nextBudget.style.color = "white";
      nextBudget.style.cursor = "pointer";
      nextBudget.style.pointerEvents = "visible";
    } else if ((allLocations.length = 0)) {
      nextBudget.style.background = "lightgrey";
      nextBudget.style.color = "grey";
      nextBudget.style.pointerEvents = "none";
      nextBudget.style.cursor = "notallowed";
    }
  }
});

const nextBudget = document.getElementById("nextBudget");
const EmptyArrayError = document.getElementById("emptyArray");
nextBudget.addEventListener("click", () => {
  if (allLocations.length > 0) {
    nextBudget.style.background = "#054e97";
    nextBudget.style.color = "white";
    nextBudget.style.cursor = "pointer";
    nextBudget.style.pointerEvents = "visible";

    localStorage.setItem("locations", JSON.stringify(allLocations));

    window.location.href = "./PostBudget.html";
  } else {
    nextBudget.style.background = "lightgrey";
    nextBudget.style.color = "grey";
    nextBudget.style.pointerEvents = "none";
    nextBudget.style.cursor = "notallowed";
    EmptyArrayError.innerText = "Please add a location.";
  }
});
