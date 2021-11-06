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
  postedJob.style.display = "none";
  result.style.display = "flex";
});
