//SKills Directory Functionality Getting Elements
const topSkillBtn = document.getElementById("topSkill");
const trendingSkillBtn = document.getElementById("trendingSkills");
const UsTopSkillBtn = document.getElementById("topSkillsUs");
const projectsBtn = document.getElementById("projects");

const topListDiv1 = document.querySelector(".skills-list-1");
const topListDiv2 = document.querySelector(".skills-list-2");
const trendingListDiv1 = document.querySelector(".TrendingSkills-list-1");
const trendingListDiv2 = document.querySelector(".TrendingSkills-list-2");
const UsTopListDiv1 = document.querySelector(".UsTop-list-1");
const UsTopListDiv2 = document.querySelector(".UsTop-list-2");
const projectsListDiv1 = document.querySelector(".projects-list-1");
const projectsListDiv2 = document.querySelector(".projects-list-2");

// Top Skills
topSkillBtn.addEventListener("click", () => {
  //Changes button
  topSkillBtn.classList.add("current");
  trendingSkillBtn.classList.remove("current");
  UsTopSkillBtn.classList.remove("current");
  projectsBtn.classList.remove("current");

  trendingListDiv1.classList.add("hide");
  trendingListDiv2.classList.add("hide");
  UsTopListDiv1.classList.add("hide");
  UsTopListDiv2.classList.add("hide");
  projectsListDiv1.classList.add("hide");
  projectsListDiv2.classList.add("hide");

  //TOggle classes
  topListDiv1.classList.remove("hide");
  topListDiv2.classList.remove("hide");
  topListDiv1.classList.add("show");
  topListDiv2.classList.add("show");
});

//Trending Button
trendingSkillBtn.addEventListener("click", async () => {
  trendingSkillBtn.classList.add("current");
  topSkillBtn.classList.remove("current");
  UsTopSkillBtn.classList.remove("current");
  projectsBtn.classList.remove("current");

  UsTopListDiv1.classList.add("hide");
  UsTopListDiv2.classList.add("hide");
  projectsListDiv1.classList.add("hide");
  projectsListDiv2.classList.add("hide");
  topListDiv1.classList.add("hide");
  topListDiv2.classList.add("hide");

  trendingListDiv1.classList.remove("hide");
  trendingListDiv2.classList.remove("hide");
  trendingListDiv1.classList.add("show");
  trendingListDiv2.classList.add("show");
});

//Top Skills US Button
UsTopSkillBtn.addEventListener("click", () => {
  UsTopSkillBtn.classList.add("current");
  topSkillBtn.classList.remove("current");
  trendingSkillBtn.classList.remove("current");
  projectsBtn.classList.remove("current");

  trendingListDiv1.classList.add("hide");
  trendingListDiv2.classList.add("hide");
  projectsListDiv1.classList.add("hide");
  projectsListDiv2.classList.add("hide");
  topListDiv1.classList.add("hide");
  topListDiv2.classList.add("hide");

  UsTopListDiv1.classList.remove("hide");
  UsTopListDiv2.classList.remove("hide");
  UsTopListDiv1.classList.add("show");
  UsTopListDiv2.classList.add("show");
});

//Projects
projectsBtn.addEventListener("click", () => {
  projectsBtn.classList.add("current");
  topSkillBtn.classList.remove("current");
  UsTopSkillBtn.classList.remove("current");
  trendingSkillBtn.classList.remove("current");

  trendingListDiv1.classList.add("hide");
  trendingListDiv2.classList.add("hide");
  UsTopListDiv1.classList.add("hide");
  UsTopListDiv2.classList.add("hide");
  topListDiv1.classList.add("hide");
  topListDiv2.classList.add("hide");

  projectsListDiv1.classList.remove("hide");
  projectsListDiv2.classList.remove("hide");
  projectsListDiv1.classList.add("show");
  projectsListDiv2.classList.add("show");
});
// Skills Directory Tree ends here

// Header arrows Functionality
const ArrowDown1 = document.getElementById("clients");
const ArrowDown2 = document.getElementById("worker");
const ArrowDown3 = document.getElementById("why");

const arrow1 = document.getElementById("arrow1");
const arrow2 = document.getElementById("arrow2");
const arrow3 = document.getElementById("arrow3");

const arrow1UP = document.getElementById("arrow1UP");
const arrow2UP = document.getElementById("arrow2UP");
const arrow3UP = document.getElementById("arrow3UP");

const clientPulldown = document.querySelector(".client-pulldown");
const freelancePulldown = document.querySelector(".freelance-pulldown");
const ezworkPulldown = document.querySelector(".ezwork-pulldown");

const categories = document.getElementById("categories");

ArrowDown1.addEventListener("click", () => {
  categories.style.display = "none";

  clientPulldown.style.display = "block";
  ezworkPulldown.style.display = "none";
  freelancePulldown.style.display = "none";

  arrow2.classList.remove("hide");
  arrow2UP.classList.add("hide");
  arrow3.classList.remove("hide");
  arrow3UP.classList.add("hide");

  arrow1.classList.add("hide");
  arrow1UP.classList.remove("hide");
});
clientPulldown.addEventListener("mouseleave", () => {
  categories.style.display = "block";

  clientPulldown.style.display = "none";
  freelancePulldown.style.display = "none";
  ezworkPulldown.style.display = "none";

  arrow1UP.classList.add("hide");
  arrow2UP.classList.add("hide");
  arrow3UP.classList.add("hide");

  arrow1.classList.remove("hide");
  arrow2.classList.remove("hide");
  arrow3.classList.remove("hide");
});

ArrowDown2.addEventListener("click", () => {
  categories.style.display = "none";

  freelancePulldown.style.display = "inline-block";
  clientPulldown.style.display = "none";
  ezworkPulldown.style.display = "none";

  arrow1.classList.remove("hide");
  arrow1UP.classList.add("hide");
  arrow3.classList.remove("hide");
  arrow3UP.classList.add("hide");

  arrow2.classList.add("hide");
  arrow2UP.classList.remove("hide");
});
freelancePulldown.addEventListener("mouseleave", () => {
  categories.style.display = "block";

  clientPulldown.style.display = "none";
  freelancePulldown.style.display = "none";
  ezworkPulldown.style.display = "none";

  arrow1UP.classList.add("hide");
  arrow2UP.classList.add("hide");
  arrow3UP.classList.add("hide");

  arrow1.classList.remove("hide");
  arrow2.classList.remove("hide");
  arrow3.classList.remove("hide");
});

ArrowDown3.addEventListener("click", () => {
  categories.style.display = "none";

  ezworkPulldown.style.display = "block";
  clientPulldown.style.display = "none";
  freelancePulldown.style.display = "none";

  arrow1.classList.remove("hide");
  arrow1UP.classList.add("hide");
  arrow2.classList.remove("hide");
  arrow2UP.classList.add("hide");

  arrow3.classList.add("hide");
  arrow3UP.classList.remove("hide");
});
ezworkPulldown.addEventListener("mouseleave", () => {
  categories.style.display = "block";

  clientPulldown.style.display = "none";
  freelancePulldown.style.display = "none";
  ezworkPulldown.style.display = "none";

  arrow1UP.classList.add("hide");
  arrow2UP.classList.add("hide");
  arrow3UP.classList.add("hide");

  arrow1.classList.remove("hide");
  arrow2.classList.remove("hide");
  arrow3.classList.remove("hide");
});
// Header arrows Functionality Ends Here

//Client Pulldown section//
//Links
const link1 = document.getElementById("client-pulldown-link1");
const link2 = document.getElementById("client-pulldown-link2");
const link3 = document.getElementById("client-pulldown-link3");

//Results
const job_result = document.querySelector(".job-result");
const projects_result = document.querySelector(".projects-result");
const categories_result = document.querySelector(".categories-result");

//First link
link1.addEventListener("click", () => {
  job_result.style.display = "block";
  projects_result.style.display = "none";
  categories_result.style.display = "none";
});

//second link
link2.addEventListener("click", () => {
  projects_result.style.display = "block";
  job_result.style.display = "none";
  categories_result.style.display = "none";
});

//third link
link3.addEventListener("click", () => {
  categories_result.style.display = "block";
  job_result.style.display = "none";
  projects_result.style.display = "none";
});

// Skills section
// Buttons
const developement_IT = document.getElementById("developement_IT");
const design_creative = document.getElementById("design_creative ");
const sales_marketing = document.getElementById("sales_marketing");
const writing_translation = document.getElementById("writing_translation");
const admin_customer = document.getElementById("admin_customer");
const finance_accounting = document.getElementById("finance_accounting");
const see_all_skills = document.getElementById("see_all_skills");

//Image
const image1 = document.getElementById("image1");
const image2 = document.getElementById("image2");
const image3 = document.getElementById("image3");
const image4 = document.getElementById("image4");
const image5 = document.getElementById("image5");
const image6 = document.getElementById("image6");

//Divs
const results1 = document.querySelector(".results1");
const results2 = document.querySelector(".results2");
const results3 = document.querySelector(".results3");
const results4 = document.querySelector(".results4");
const results5 = document.querySelector(".results5");
const results6 = document.querySelector(".results6");

// Button1
developement_IT.addEventListener("click", () => {
  developement_IT.classList.add("current");
  design_creative.classList.remove("current");
  sales_marketing.classList.remove("current");
  writing_translation.classList.remove("current");
  admin_customer.classList.remove("current");
  finance_accounting.classList.remove("current");
  see_all_skills.classList.remove("current");

  //Toggle the images
  image1.style.display = "block";
  image2.style.display = "none";
  image3.style.display = "none";
  image4.style.display = "none";
  image5.style.display = "none";
  image6.style.display = "none";

  //Toggle the div
  results1.classList.remove("hide");
  results1.classList.add("show2");
  results2.classList.add("hide");
  results3.classList.add("hide");
  results4.classList.add("hide");
  results5.classList.add("hide");
  results6.classList.add("hide");
});

//Button2
design_creative.addEventListener("click", () => {
  design_creative.classList.add("current");
  developement_IT.classList.remove("current");
  sales_marketing.classList.remove("current");
  writing_translation.classList.remove("current");
  admin_customer.classList.remove("current");
  finance_accounting.classList.remove("current");
  see_all_skills.classList.remove("current");

  image1.style.display = "none";
  image2.style.display = "block";
  image3.style.display = "none";
  image4.style.display = "none";
  image5.style.display = "none";
  image6.style.display = "none";

  results2.classList.remove("hide");
  results2.classList.add("show2");
  results1.classList.add("hide");
  results3.classList.add("hide");
  results4.classList.add("hide");
  results5.classList.add("hide");
  results6.classList.add("hide");
});

//Button3
sales_marketing.addEventListener("click", () => {
  sales_marketing.classList.add("current");
  developement_IT.classList.remove("current");
  design_creative.classList.remove("current");
  writing_translation.classList.remove("current");
  admin_customer.classList.remove("current");
  finance_accounting.classList.remove("current");
  see_all_skills.classList.remove("current");

  image1.style.display = "none";
  image2.style.display = "none";
  image3.style.display = "block";
  image4.style.display = "none";
  image5.style.display = "none";
  image6.style.display = "none";

  results3.classList.remove("hide");
  results3.classList.add("show2");
  results1.classList.add("hide");
  results2.classList.add("hide");
  results4.classList.add("hide");
  results5.classList.add("hide");
  results6.classList.add("hide");
});

//Button4
writing_translation.addEventListener("click", () => {
  writing_translation.classList.add("current");
  sales_marketing.classList.remove("current");
  developement_IT.classList.remove("current");
  design_creative.classList.remove("current");
  admin_customer.classList.remove("current");
  finance_accounting.classList.remove("current");
  see_all_skills.classList.remove("current");

  image1.style.display = "none";
  image2.style.display = "none";
  image3.style.display = "none";
  image4.style.display = "block";
  image5.style.display = "none";
  image6.style.display = "none";

  results4.classList.remove("hide");
  results4.classList.add("show2");
  results1.classList.add("hide");
  results2.classList.add("hide");
  results3.classList.add("hide");
  results5.classList.add("hide");
  results6.classList.add("hide");
});

//Button5
admin_customer.addEventListener("click", () => {
  admin_customer.classList.add("current");
  writing_translation.classList.remove("current");
  sales_marketing.classList.remove("current");
  developement_IT.classList.remove("current");
  design_creative.classList.remove("current");
  finance_accounting.classList.remove("current");
  see_all_skills.classList.remove("current");

  image1.style.display = "none";
  image2.style.display = "none";
  image3.style.display = "none";
  image4.style.display = "none";
  image5.style.display = "block";
  image6.style.display = "none";

  results5.classList.remove("hide");
  results5.classList.add("show2");
  results1.classList.add("hide");
  results2.classList.add("hide");
  results3.classList.add("hide");
  results4.classList.add("hide");
  results6.classList.add("hide");
});

// Button6
finance_accounting.addEventListener("click", () => {
  finance_accounting.classList.add("current");
  admin_customer.classList.remove("current");
  writing_translation.classList.remove("current");
  sales_marketing.classList.remove("current");
  developement_IT.classList.remove("current");
  design_creative.classList.remove("current");
  see_all_skills.classList.remove("current");

  image1.style.display = "none";
  image2.style.display = "none";
  image3.style.display = "none";
  image4.style.display = "none";
  image5.style.display = "none";
  image6.style.display = "block";

  results6.classList.remove("hide");
  results6.classList.add("show2");
  results1.classList.add("hide");
  results2.classList.add("hide");
  results3.classList.add("hide");
  results4.classList.add("hide");
  results5.classList.add("hide");
});

//Button7
see_all_skills.addEventListener("click", () => {
  see_all_skills.classList.add("current");
  finance_accounting.classList.remove("current");
  admin_customer.classList.remove("current");
  writing_translation.classList.remove("current");
  sales_marketing.classList.remove("current");
  developement_IT.classList.remove("current");
  design_creative.classList.remove("current");

  image1.style.display = "none";
  image2.style.display = "none";
  image3.style.display = "none";
  image4.style.display = "none";
  image5.style.display = "none";
  image6.style.display = "none";

  results1.classList.add("hide");
  results2.classList.add("hide");
  results3.classList.add("hide");
  results4.classList.add("hide");
  results5.classList.add("hide");
  results6.classList.add("hide");
});

// Media Query
const skillsDirectoryLeft = document.getElementById("skills-directory-left");
const skillsDirectoryRight = document.getElementById("skills-directory-right");

skillsDirectoryLeft.addEventListener("click", () => {
  skillsDirectoryRight.style.display = "inline-block";

  topSkillBtn.style.display = "inline-block";
  trendingSkillBtn.style.display = "inline-block";

  UsTopSkillBtn.style.display = "none";
  projectsBtn.style.display = "none";

  skillsDirectoryLeft.style.display = "none";
});
skillsDirectoryRight.addEventListener("click", () => {
  skillsDirectoryRight.style.display = "none";

  topSkillBtn.style.display = "none";
  trendingSkillBtn.style.display = "none";

  UsTopSkillBtn.style.display = "inline-block";
  projectsBtn.style.display = "inline-block";

  skillsDirectoryLeft.style.display = "inline-block";
});

//Mobile footer JS
const mobileFooterDown1 = document.getElementById("mobile-footer-down1");
const mobileFooterDown2 = document.getElementById("mobile-footer-down2");
const mobileFooterDown3 = document.getElementById("mobile-footer-down3");
const mobileFooterDown4 = document.getElementById("mobile-footer-down4");

//Up arrows
const mobileFooterArrowUp1 = document.getElementById("mobile-footer-up1");
const mobileFooterArrowUp2 = document.getElementById("mobile-footer-up2");
const mobileFooterArrowUp3 = document.getElementById("mobile-footer-up3");
const mobileFooterArrowUp4 = document.getElementById("mobile-footer-up4");

// The pulldown content
const UserFooter = document.querySelector(".mobile-user-footer");
const TalentFooter = document.querySelector(".mobile-talent-footer");
const ResourceFooter = document.querySelector(".mobile-resource-footer");
const AboutFooter = document.querySelector(".mobile-about-footer");

mobileFooterDown1.addEventListener("click", () => {
  UserFooter.style.display = "inline-block";

  //Hide Down arrow
  mobileFooterDown1.style.display = "none";

  //Show UP Arrow
  mobileFooterArrowUp1.style.display = "inline-block";
});

//Pull user section back up
mobileFooterArrowUp1.addEventListener("click", () => {
  //Hide user content
  UserFooter.style.display = "none";

  //Hide up Arrow
  mobileFooterArrowUp1.style.display = "none";

  //Show down arrow
  mobileFooterDown1.style.display = "inline-block";
});

//Mobile Talent footer puldown
mobileFooterDown2.addEventListener("click", () => {
  TalentFooter.style.display = "inline-block";

  //Hide Down arrow
  mobileFooterDown2.style.display = "none";

  //Show UP Arrow
  mobileFooterArrowUp2.style.display = "inline-block";
});
mobileFooterArrowUp2.addEventListener("click", () => {
  //Hide user content
  TalentFooter.style.display = "none";

  //Hide up Arrow
  mobileFooterArrowUp2.style.display = "none";

  //Show down arrow
  mobileFooterDown2.style.display = "inline-block";
});

//Resource Section
mobileFooterDown3.addEventListener("click", () => {
  ResourceFooter.style.display = "inline-block";

  //Hide Down arrow
  mobileFooterDown3.style.display = "none";

  //Show UP Arrow
  mobileFooterArrowUp3.style.display = "inline-block";
});
mobileFooterArrowUp3.addEventListener("click", () => {
  //Hide user content
  ResourceFooter.style.display = "none";

  //Hide up Arrow
  mobileFooterArrowUp3.style.display = "none";

  //Show down arrow
  mobileFooterDown3.style.display = "inline-block";
});

//About Section
mobileFooterDown4.addEventListener("click", () => {
  AboutFooter.style.display = "inline-block";

  //Hide Down arrow
  mobileFooterDown4.style.display = "none";

  //Show UP Arrow
  mobileFooterArrowUp4.style.display = "inline-block";
});
mobileFooterArrowUp4.addEventListener("click", () => {
  //Hide user content
  AboutFooter.style.display = "none";

  //Hide up Arrow
  mobileFooterArrowUp4.style.display = "none";

  //Show down arrow
  mobileFooterDown4.style.display = "inline-block";
});

// Javascrtipt for mobile nav section
// Down Arrows //
const MobileNavDownArrow1 = document.getElementById("mobile-nav-down1");
const MobileNavDownArrow2 = document.getElementById("mobile-nav-down2");
const MobileNavDownArrow3 = document.getElementById("mobile-nav-down3");
// Up Arrows //
const MobileNavUpArrow1 = document.getElementById("mobile-nav-up1");
const MobileNavUpArrow2 = document.getElementById("mobile-nav-up2");
const MobileNavUpArrow3 = document.getElementById("mobile-nav-up3");

// Get Nav Sections
const MobileNavTalent = document.querySelector(".mobile-talent");
const MobileNavWork = document.querySelector(".mobile-work");
const MobileNavEzwork = document.querySelector(".mobile-ezwork");

// Card ID
const MobileNavTalentCard = document.getElementById("MobileNav-Talent");
const MobileNavWorkCard = document.getElementById("MobileNav-Work");
const MobileNavEzworkCard = document.getElementById("MobileNav-Ezwork");

// Add events
MobileNavDownArrow1.addEventListener("click", () => {
  //Replace arrow
  MobileNavDownArrow1.style.display = "none";
  MobileNavUpArrow1.style.display = "inline-block";

  //Add grey background
  MobileNavTalentCard.style.background = "whitesmoke";

  //Display content
  MobileNavTalent.style.display = "inline-block";

  //Reset other parts
  MobileNavWork.style.display = "none";
  MobileNavWorkCard.style.background = "transparent";
  MobileNavUpArrow2.style.display = "none";
  MobileNavDownArrow2.style.display = "inline-block";

  MobileNavEzworkCard.style.background = "transparent";
  MobileNavUpArrow3.style.display = "none";
  MobileNavDownArrow3.style.display = "inline-block";
  MobileNavEzwork.style.display = "none";
});
MobileNavUpArrow1.addEventListener("click", () => {
  //Replace arrow
  MobileNavUpArrow1.style.display = "none";
  MobileNavDownArrow1.style.display = "inline-block";

  //Remove grey background
  MobileNavTalentCard.style.background = "transparent";

  //Display content
  MobileNavTalent.style.display = "none";
});

// Find Work section
MobileNavDownArrow2.addEventListener("click", () => {
  //Replace arrow
  MobileNavDownArrow2.style.display = "none";
  MobileNavUpArrow2.style.display = "inline-block";

  //Add grey background
  MobileNavWorkCard.style.background = "whitesmoke";

  //Display content
  MobileNavWork.style.display = "inline-block";

  //Reset other parts
  MobileNavTalent.style.display = "none";
  MobileNavTalentCard.style.background = "transparent";
  MobileNavUpArrow1.style.display = "none";
  MobileNavDownArrow1.style.display = "inline-block";

  MobileNavEzworkCard.style.background = "transparent";
  MobileNavUpArrow3.style.display = "none";
  MobileNavDownArrow3.style.display = "inline-block";
  MobileNavEzwork.style.display = "none";
});
MobileNavUpArrow2.addEventListener("click", () => {
  //Replace arrow
  MobileNavUpArrow2.style.display = "none";
  MobileNavDownArrow2.style.display = "inline-block";

  //Reomve grey background
  MobileNavWorkCard.style.background = "transparent";

  //Display content
  MobileNavWork.style.display = "none";
});

//Ezwork section
MobileNavDownArrow3.addEventListener("click", () => {
  //Replace arrow
  MobileNavDownArrow3.style.display = "none";
  MobileNavUpArrow3.style.display = "inline-block";

  //Add grey background
  MobileNavEzworkCard.style.background = "whitesmoke";

  //Display content
  MobileNavEzwork.style.display = "inline-block";

  //Reset other parts
  MobileNavTalent.style.display = "none";
  MobileNavTalentCard.style.background = "transparent";
  MobileNavUpArrow1.style.display = "none";
  MobileNavDownArrow1.style.display = "inline-block";

  MobileNavWork.style.display = "none";
  MobileNavWorkCard.style.background = "transparent";
  MobileNavUpArrow2.style.display = "none";
  MobileNavDownArrow2.style.display = "inline-block";
});
MobileNavUpArrow3.addEventListener("click", () => {
  //Replace arrow
  MobileNavUpArrow3.style.display = "none";
  MobileNavDownArrow3.style.display = "inline-block";

  //Remove grey background
  MobileNavEzworkCard.style.background = "transparent";

  //Display content
  MobileNavEzwork.style.display = "none";
});

// Javascript for Mobile Nav Talent Section
// Card
const card1 = document.getElementById("card1");
const card2 = document.getElementById("card2");
const card3 = document.getElementById("card3");

//Get content
const MobileFindFreelancer = document.querySelector(".MobileFindFreelancer");
const MobileProject = document.querySelector(".MobileProject");
const MobileSkills = document.querySelector(".MobileSkills");

//Get arrows in the content
const MobileFreelancerLeftArrow = document.getElementById(
  "MobileFreelancerLeftArrow"
);
const MobileFreelancerLeftArrow2 = document.getElementById(
  "MobileFreelancerLeftArrow2"
);
const MobileFreelancerLeftArrow3 = document.getElementById(
  "MobileFreelancerLeftArrow3"
);

//Add events for back arrow
MobileFreelancerLeftArrow.addEventListener("click", () => {
  MobileFindFreelancer.style.display = "none";
});
MobileFreelancerLeftArrow2.addEventListener("click", () => {
  MobileProject.style.display = "none";
});
MobileFreelancerLeftArrow3.addEventListener("click", () => {
  MobileSkills.style.display = "none";
});

//Add Event to open content
card1.addEventListener("click", () => {
  // Show Content
  MobileFindFreelancer.style.display = "inline-block";
});
card2.addEventListener("click", () => {
  //Show Content
  MobileProject.style.display = "inline-block";
});
card3.addEventListener("click", () => {
  //Show Content
  MobileSkills.style.display = "inline-block";
});

//Login
const loginBtn = document.querySelector(".login-btn");
