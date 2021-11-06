var jobGodMode = document.querySelectorAll("#jobGodMode");

const jobEdit = document.querySelector(".jobEdit");
jobGodMode.addEventListener("click", () => {
  jobEdit.style.display = "block";
});

const exitJobEdit = document.getElementById("exitJobEdit");
exitJobEdit.addEventListener("click", () => {
  jobEdit.style.display = "none";
});

const deleteJob = document.getElementById("deleteJob");
deleteJob.addEventListener("click", () => {
  jobEdit.style.display = "none";
  postedJob.style.display = "none";
});
