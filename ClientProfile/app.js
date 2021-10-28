//Skills carousel
//Get Elements
const skillTitle = document.getElementById("skill");
const skillImage = document.querySelector(".profile-skills-images");

var slideIndex = [1, 1];
var slideId = ["profile-skills"];

showSlides(1, 0);

function plusSlides(n, no) {
  showSlides((slideIndex[no] += n), no);
}
function showSlides(n, no) {
  var i;
  var x = document.getElementsByClassName(slideId[no]);
  if (n > x.length) {
    slideIndex[no] = 1;
  }
  if (n < 1) {
    slideIndex[no] = x.length;
  }
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";
  }
  x[slideIndex[no] - 1].style.display = "block";
}

/*
const quickLinkJob = document.getElementById("quick-link-job");
const quickLinkJob2 = document.getElementById("quick-link-job2");
quickLinkJob.addEventListener("click", () => {
  localStorage.setItem("JobCount", 1);
});
quickLinkJob2.addEventListener("click", () => {
  localStorage.setItem("JobCount", 1);
});

const result = document.querySelector(".result");

const jobTitle = document.getElementById("jobTitle");
jobTitle.innerText = localStorage.getItem("Job_Title");

const dateSpan = document.getElementById("date");
var x = new Date();
dateSpan.innerText = x.toLocaleDateString();

const postedBy = document.getElementById("postedBy");
postedBy.innerText = localStorage
  .getItem("FirstName")
  .concat(" ")
  .concat(localStorage.getItem("LastName"));

const postedJob = document.querySelector(".postedJob");

if (localStorage.getItem("JobCount") == 0) {
  result.style.display = "flex";
} else {
  result.style.display = "none";
  postedJob.style.display = "inline-block";
}

const jobGodMode = document.getElementById("jobGodMode");
const jobEdit = document.querySelector(".jobEdit");
jobGodMode.addEventListener("click", () => {
  jobEdit.style.display = "flex";
});

const exitJobEdit = document.getElementById("exitJobEdit");
exitJobEdit.addEventListener("click", () => {
  jobEdit.style.display = "none";
});

const deleteJob = document.getElementById("deleteJob");
deleteJob.addEventListener("click", () => {
  jobEdit.style.display = "none";
  localStorage.setItem("JobCount", 0);
  postedJob.style.display = "none";
  result.style.display = "flex";
});
*/
