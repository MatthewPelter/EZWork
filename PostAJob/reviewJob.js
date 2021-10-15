const currentTitle = localStorage.getItem("Job_Title");

const reviewJobTitle = (document.getElementById("currentTitleSpan").innerText =
  currentTitle);

const confirmTitle = document.getElementById("confirmTitle");
confirmTitle.addEventListener("click", () => {
  var ctSpan = document.getElementById("currentTitleSpan");
  //console.log(ctSpan.innerText);
  localStorage.setItem("Job_Title", ctSpan.innerText);
});

const currentCategory = localStorage.getItem("category");
const selectedCategory = (document.getElementById(
  "selectedCategory"
).innerText = currentCategory);

const currentScopeSize = localStorage.getItem("projectSize");
const currentScopeTime = localStorage.getItem("TimeScope");
const currentScopeExperience = localStorage.getItem("Experience");

const selectedScope = (document.getElementById("selectedScope").innerText =
  currentScopeSize
    .concat(" Size , ")
    .concat(currentScopeTime)
    .concat(", & ")
    .concat(currentScopeExperience)
    .concat(" experience."));

const currentBudget = localStorage.getItem("budget");
const selectedBudget = document.getElementById("selectedBudget");

selectedBudget.innerText = "$".concat(JSON.parse(currentBudget));

const currentLocation = localStorage.getItem("locations");
const selectedLocation = document.getElementById("selectedLocation");
selectedLocation.innerText = JSON.parse(currentLocation);

const currentSkills = localStorage.getItem("skills");
const selectedSkills = document.getElementById("selectedSkills");
selectedSkills.innerText = JSON.parse(currentSkills);

// Button cards
const backBtn = document.getElementById("back");
backBtn.addEventListener("click", () => {
  // Go to back a page
  window.location.href = "./PostBudget.html";
});
const cancelBtn = document.getElementById("cancel");
cancelBtn.addEventListener("click", () => {
  // Cancel the job
  window.location.href = "../ClientProfile/index.html";
});

//Require a job description
const jobDescription = document.getElementById("jobDescription");

const descriptionError = document.getElementById("descriptionError");

function countWords(str) {
  return str.trim().split(/\s+/).length;
}

const postJob = document.getElementById("postJob");
const wordCountDescription = document.getElementById("wordCount");
jobDescription.addEventListener("input", () => {
  var jobDescriptionLength = countWords(jobDescription.value);
  wordCountDescription.innerHTML = jobDescriptionLength;
  postJob.style.background = "#054e97";
  postJob.style.color = "white";
  postJob.style.cursor = "pointer";
  postJob.style.pointerEvents = "visible";

  if (jobDescriptionLength < 15) {
    descriptionError.style.display = "block";
  } else if (jobDescriptionLength > 5000) {
    descriptionError.innerHTML =
      `<i class="fa fa-exclamation-circle" aria-hidden="true"></i>`.concat(
        "The maximum word count is 5000."
      );
  } else {
    descriptionError.style.display = "none";
  }
});

postJob.addEventListener("click", () => {
  var jobDescriptionLength = countWords(jobDescription.value);
  if (jobDescriptionLength < 15) {
    descriptionError.style.display = "block";
  } else if (jobDescriptionLength > 5000) {
    descriptionError.innerHTML =
      `<i class="fa fa-exclamation-circle" aria-hidden="true"></i>`.concat(
        "The maximum word count is 5000."
      );
  } else {
    localStorage.setItem("jobDescription", jobDescription.value);
    window.location.href = "../ClientProfile/index.html";
  }
});
