// Post Scope Start
const EditFreelanceExperience = document.getElementById(
  "freelance-experience-edit"
);

const CurrentExperienceCard = document.querySelector(".freelance-experience");

const ExperienceCard = document.querySelector(".freelance-experience-options");

EditFreelanceExperience.addEventListener("click", () => {
  ExperienceCard.style.display = "inline-block";
  CurrentExperienceCard.style.display = "none";
});
const entryOption = document.querySelector(".entry-option");

const intermediateOption = document.querySelector(".intermediate-option");

const expertOption = document.querySelector(".expert-option");

const entryBtn = document.getElementById("entry-button");
const intermediateBtn = document.getElementById("intermediate-button");
const expertBtn = document.getElementById("expert-button");

const CurrentExperienceChoice = document.getElementById(
  "currentExperienceChoice"
);

// Holds the user choice
var experience = "Entry Level";

entryOption.addEventListener("click", () => {
  entryBtn.style.color = "#054e97";
  intermediateBtn.style.color = "transparent";
  expertBtn.style.color = "transparent";

  experience = "Entry Level";

  CurrentExperienceChoice.innerText = experience;

  ExperienceCard.style.display = "none";
  CurrentExperienceCard.style.display = "flex";
});
intermediateOption.addEventListener("click", () => {
  entryBtn.style.color = "transparent";
  intermediateBtn.style.color = "#054e97";
  expertBtn.style.color = "transparent";

  experience = "Intermediate Level";

  CurrentExperienceChoice.innerText = experience;

  ExperienceCard.style.display = "none";
  CurrentExperienceCard.style.display = "flex";
});
expertOption.addEventListener("click", () => {
  entryBtn.style.color = "transparent";
  intermediateBtn.style.color = "transparent";
  expertBtn.style.color = "#054e97";

  experience = "Expert Level";

  CurrentExperienceChoice.innerText = experience;

  ExperienceCard.style.display = "none";
  CurrentExperienceCard.style.display = "flex";
});

// Scope Experience JS Ends

//Scope Time Start
const EditProjectTime = document.getElementById("project-time-edit");

const CurrentTimeCard = document.querySelector(".project-time");

const TimeCard = document.querySelector(".project-time-options");

EditProjectTime.addEventListener("click", () => {
  TimeCard.style.display = "inline-block";
  CurrentTimeCard.style.display = "none";
});

const threeToSixMonthsOption = document.querySelector(".threeToSixMonths");

const oneToThreeMonthsOption = document.querySelector(".oneToThreeMonths");

const lessThanOneMonthOption = document.querySelector(".lessThanOneMonth");

const threeToSixMonthsBtn = document.getElementById("threeToSixMonths-button");
const oneToThreeMonthsBtn = document.getElementById("oneToThreeMonths-button");
const lessThanOneMonthBtn = document.getElementById("lessThanOneMonth-button");

// Holds the user time choice
var timeChoice = "Less than 1 month";
const CurrentTimeChoice = document.getElementById("currentTimeChoice");

threeToSixMonthsOption.addEventListener("click", () => {
  threeToSixMonthsBtn.style.color = "#054e97";
  oneToThreeMonthsBtn.style.color = "transparent";
  lessThanOneMonthBtn.style.color = "transparent";

  timeChoice = "3 to 6 months";

  CurrentTimeChoice.innerText = timeChoice;

  TimeCard.style.display = "none";
  CurrentTimeCard.style.display = "flex";
});

oneToThreeMonthsOption.addEventListener("click", () => {
  threeToSixMonthsBtn.style.color = "transparent";
  oneToThreeMonthsBtn.style.color = "#054e97";
  lessThanOneMonthBtn.style.color = "transparent";

  timeChoice = "1 to 3 months";

  CurrentTimeChoice.innerText = timeChoice;

  TimeCard.style.display = "none";
  CurrentTimeCard.style.display = "flex";
});

lessThanOneMonthOption.addEventListener("click", () => {
  threeToSixMonthsBtn.style.color = "transparent";
  oneToThreeMonthsBtn.style.color = "transparent";
  lessThanOneMonthBtn.style.color = "#054e97";

  timeChoice = "Less than 1 month";

  CurrentTimeChoice.innerText = timeChoice;

  TimeCard.style.display = "none";
  CurrentTimeCard.style.display = "flex";
});

// Project Size JS
const EditProjectSize = document.getElementById("project-size-edit");

const CurrentSizeCard = document.querySelector(".project-size-container");

const SizeCard = document.querySelector(".project-size-options");

EditProjectSize.addEventListener("click", () => {
  SizeCard.style.display = "inline-block";
  CurrentSizeCard.style.display = "none";
});

const largeSizeOption = document.querySelector(".large-option");

const mediumSizeOption = document.querySelector(".medium-option");

const smallSizeOption = document.querySelector(".small-option");

const largeSizeBtn = document.getElementById("largeSize-button");
const mediumSizeBtn = document.getElementById("mediumSize-button");
const smallSizeBtn = document.getElementById("smallSize-button");

// Holds the user time choice
var sizeChoice = "Small";
const currentSizeChoice = document.getElementById("currentSizeChoice");
const SizeDescription = document.getElementById("SizeDescription");

largeSizeOption.addEventListener("click", () => {
  largeSizeBtn.style.color = "#054e97";
  mediumSizeBtn.style.color = "transparent";
  smallSizeBtn.style.color = "transparent";

  sizeChoice = "Large";

  currentSizeChoice.innerText = sizeChoice;

  SizeDescription.innerText =
    "Longer term or complex initiatives (ex. design and build a full website)";

  SizeCard.style.display = "none";
  CurrentSizeCard.style.display = "flex";
});

mediumSizeOption.addEventListener("click", () => {
  largeSizeBtn.style.color = "transparent";
  mediumSizeBtn.style.color = "#054e97";
  smallSizeBtn.style.color = "transparent";

  sizeChoice = "Medium";

  currentSizeChoice.innerText = sizeChoice;

  SizeDescription.innerText = "Well-defined projects (ex. a landing page)";

  SizeCard.style.display = "none";
  CurrentSizeCard.style.display = "flex";
});

smallSizeOption.addEventListener("click", () => {
  largeSizeBtn.style.color = "transparent";
  mediumSizeBtn.style.color = "transparent";
  smallSizeBtn.style.color = "#054e97";

  sizeChoice = "Small";

  currentSizeChoice.innerText = sizeChoice;

  SizeDescription.innerText =
    "Quick and straightforward tasks (ex. update text and images on a webpage)";

  SizeCard.style.display = "none";
  CurrentSizeCard.style.display = "flex";
});

// Project size JS ends

// JS fpr next page button
const nextLocationBtn = document.getElementById("nextLocation");
nextLocationBtn.addEventListener("click", () => {
  //console.log(sizeChoice);
  //console.log(timeChoice);
  //console.log(experience);
  localStorage.setItem("projectSize", sizeChoice);
  localStorage.setItem("TimeScope", timeChoice);
  localStorage.setItem("Experience", experience);

  // Go to next page
  window.location.href = "./postLocation.html";
});
