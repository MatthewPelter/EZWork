"use strict";

var jobGodMode = document.getElementById("jobGodMode");
var jobEdit = document.querySelector(".jobEdit");
jobGodMode.addEventListener("click", function () {
  jobEdit.style.display = "flex";
});
var exitJobEdit = document.getElementById("exitJobEdit");
exitJobEdit.addEventListener("click", function () {
  jobEdit.style.display = "none";
});
var deleteJob = document.getElementById("deleteJob");
deleteJob.addEventListener("click", function () {
  jobEdit.style.display = "none";
  postedJob.style.display = "none";
  result.style.display = "flex";
});