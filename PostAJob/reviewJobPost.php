<?php
session_start();
include '../components/session-checker.php';
require_once("../classes/DB.php");

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="description" content="A platform for skilled workers or talented people to freelance, find projects to work on, extra ways to earn income.">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <script src="https://kit.fontawesome.com/e9089fea9d.js" crossorigin="anonymous"></script>
            <title>EZWork | Find Jobs or Freelancers</title>
            <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet"> 
            <link rel="preconnect" href="https://fonts.googleapis.com">
            <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
            <link href="https://fonts.googleapis.com/css2?family=Archivo+Black&display=swap" rel="stylesheet"> 
            <link rel="icon" href="../logo/logo.svg">
            <link rel="stylesheet" href="../Styles/style.css">
        </head>
    </head>
<body>

        <!-- NAV BAR -->
        <?php include '../navbar.php'; ?>
        <!-- END NAVBAR -->

    <form action="../components/postJob-process.php" method="post" name="postJob" class="form"></form>
    <div class="reviewJobPost-container">
        <div class="reviewJobPost_title">
            <h3>Now just finish and review your job post.</h3>
        </div>
        <div class="review_jobTitle">
            <h4>Title</h4>
            <div class="confirmTitle">
                <div class="title">
                    <span id="currentTitleSpan" contenteditable="true"></span>
                </div>
                <i class="fa fa-check" id="confirmTitle"></i>
            </div>
        </div>
        <div class="jobDescription">
            <h4>Job Description</h4>
            <span>This is how freelancers figures out what you need and why you’re great to work with!</span>
            <span>Include your expectations about the task or deliverable, what you’re looking for in a work relationship, and anything unique about your project.</span>
            <textarea required minlength="15" maxlength="5000" id="jobDescription" placeholder="Already have a job description? Paste it here!"></textarea>
            <p><span id="wordCount">0</span> total words.</p>
            <span id="descriptionError"><i class="fa fa-exclamation-circle "></i>Please enter at least 15 words.</span>
            <input type="file" id="file">
            <span>Max file size: 100MB</span>
        </div>
        <div class="reviewJobDetails">
            <h4>Category</h4>
            <div class="reviewCategory">
                <p id="selectedCategory"></p>
                <i class="fa fa-pencil" onclick="openCard()"></i>
            </div>
            
            <div id="settingsOverlay" class="settingsOverlay">
                <div class="editCategoryContainer">
                    <div class="editCategoryHeader">
                        <h3>Edit Category</h3>
                        <i class="fa fa-times" aria-hidden="true" onclick="closeCard()"></i>
                    </div>
                    <div class="editCategoryBody">
                        <h4>Category</h4>
                        <select name="category" id="categoryID">
                            <option selected value="AccountingConsulting">Accounting & Consulting</option>
                            <option value="AdminSupport">Admin Support</option>
                            <option value="CustomerService">Customer Service</option>
                            <option value="DataScienceAnalytics">Data Science & Analytics</option>
                            <option value="DesignCreative">Design & Creative</option>
                            <option value="EngineeringArchitecture">Engineering & Architecture</option>
                            <option value="ITNetworking">IT & Networking</option>
                            <option value="Legal">Legal</option>
                            <option value="SalesMarketing">Sales & Marketing</option>
                            <option value="Translation">Translation</option>
                            <option value="WebMobileSoftwareDev">Web, Mobile & Software Dev</option>
                            <option value="Writing">Writing</option>
                        </select>
                        <h4>Specialty</h4>
                        <div class="accoutingConsultingSpecialtyCard">
                            <select name="accoutingConsultingSpecialty" id="allAccoutingConsultingSpecialty">
                            </select>
                        </div>
                        <div class="adminSupportSpecialtyCard">
                            <select name="adminSupportSpecialty" id="allAdminSupportSpecialty">
                            </select>
                        </div>
                        <div class="customerServiceSpecialtyCard">
                            <select name="customerServiceSpecialty" id="allCustomerServiceSpecialty">
                            </select>
                        </div>
                        <div class="dataScienceAnalyticsSpecialtyCard">
                            <select name="dataScienceAnalyticsSpecialty" id="allDataScienceAnalyticsSpecialty">
                            </select>
                        </div>
                        <div class="designCreativeSpecialtyCard">
                            <select name="designCreativeSpecialty" id="allDesignCreativeSpecialty">
                            </select>
                        </div>
                        <div class="engineeringArchitectureSpecialtyCard">
                            <select name="engineeringArchitectureSpecialty" id="allEngineeringArchitectureSpecialty">
                            </select>
                        </div>
                        <div class="itNetworkSpecialtyCard">
                            <select name="itNetworkSpecialty" id="allItNetworkSpecialty">
                            </select>
                        </div>
                        <div class="legalSpecialtyCard">
                            <select name="legalSpecialty" id="allLegalSpecialty">
                            </select>
                        </div>
                        <div class="salesMarketingSpecialtyCard">
                            <select name="salesMarketingSpecialty" id="allSalesMarketingSpecialty">
                            </select>
                        </div>
                        <div class="translationSpecialtyCard">
                            <select name="translationSpecialty" id="allTranslationSpecialty">
                            </select>
                        </div>
                        <div class="webMobileDevSpecialtyCard">
                            <select name="webMobileDevSpecialty" id="allWebMobileDevSpecialty">
                            </select>
                        </div>
                        <div class="writingSpecialtyCard">
                            <select name="writingSpecialty" id="allWritingSpecialty">
                            </select>
                        </div>
                        <p>Category: <span id="currentCategory"></span></p>
                    </div>

                    <div class="editCategorySubmit">
                        <button id="cancelEdit" onclick="closeCard()">Cancel</button>
                        <button id="applyEdit">Apply</button>
                    </div>
                </div>
            </div>

            <h4>Skills</h4>
            <div class="reviewSkill">
                <p id="selectedSkills"></p>
                <i class="fa fa-pencil" id="skillsBTN" onclick="openSkills()"></i>
            </div>

            <div id="skillsOverlay" class="skillsOverlay">
                <div class="editSkillsContainer">
                    <div class="editSkillsHeader">
                        <h3>Edit Skills</h3>
                        <i class="fa fa-times" aria-hidden="true" onclick="closeSkills()"></i>
                    </div>
                    <div class="editSkillsBody">
                        <div class="detail-input-section">
                            <div class="CategorySpecialtyContainer"></div>
                            <h3>Search Skills or Add your Own</h3>
                            <div class="skillSearch">
                                <input type="text" name="skills" id="skills" list="allskills"  autocomplete="off" placeholder="Search Skills or Add Your Own">                  
                                <button id="enterSkill">Add</button>
                            </div>
                            <span id="emptyError" style="color: red;font-size: 0.8rem;"></span>
                            <p id="SelectedSkillTitle" style="margin-top: 0.5rem;margin-left: 0.5rem;width: 100%;">Selected Skill <span id="alertMsg" style="font-size: 0.8rem;"></span></p>
                            <form id="selectedSkillsForm" onsubmit="return false">
                            </form>
    
                            <span id="EmptyArrayError" style="color: red;font-size: 1rem;padding: 0.5rem;"></span>
                        </div>
                    </div>

                    <div class="editSkillsSubmit">
                        <button id="cancelEdit" onclick="closeSkills()">Cancel</button>
                        <button id="applySkillEdit">Apply</button>
                    </div>
                </div>
            </div>

            <h4>Scope</h4>
            <div class="reviewScope">
                <p id="selectedScope"></p>
                <i class="fa fa-pencil" onclick="openScope()"></i>
            </div>

            <div id="scopeOverlay" class="scopeOverlay">
                <div class="editScopeContainer">
                    <div class="editScopeHeader">
                        <h3>Edit Scope</h3>
                        <i class="fa fa-times" aria-hidden="true" onclick="closeScope()"></i>
                    </div>
                    <div class="editScopeBody">
                        <div class="detail-input-section">
                            <div class="project-size-container">
                                <div class="project-size-option">
                                    <div class="project-size-option-title">
                                        <h3 id="currentSizeChoice">Small</h3>
                                        <i class="fa fa-pencil" id="project-size-edit" title="Edit"></i>
                                    </div>
                                    <span id="SizeDescription">Quick and straightforward tasks (ex. update text and images on a webpage)</span>
                                </div>
                            </div>
                            <div class="project-size-options">
                                <div class="large-option">
                                    <div class="size-option-title">
                                        <i class="fa fa-circle" id="largeSize-button"></i>
                                        <h3>Large</h3>
                                    </div>
                                    <span>Longer term or complex initiatives (ex. design and build a full website)</span>
                                </div>
                                <div class="medium-option">
                                    <div class="size-option-title">
                                        <i class="fa fa-circle" id="mediumSize-button"></i>
                                        <h3>Medium</h3>
                                    </div>
                                    <span>Well-defined projects (ex. a landing page)</span>
                                </div>
                                <div class="small-option">
                                    <div class="size-option-title">
                                        <i class="fa fa-circle" id="smallSize-button"></i>
                                        <h3>Small</h3>
                                    </div>
                                    <span>Quick and straightforward tasks (ex. update text and images on a webpage)</span>
                                </div>
                            </div>
        
                            <div class="project-time">
                                <h3 id="currentTimeChoice">Less than 1 month</h3>
                                <i class="fa fa-pencil" id="project-time-edit" title="Edit"></i>
                            </div>
                            <div class="project-time-options">
                                <h3>How long will your work take?</h3>
                                <div class="threeToSixMonths">
                                    <div class="time-title">
                                        <i class="fa fa-circle" id="threeToSixMonths-button"></i>
                                        <h3>3 to 6 months</h3>
                                    </div>
                                </div>
                                <div class="oneToThreeMonths">
                                    <div class="time-title">
                                        <i class="fa fa-circle" id="oneToThreeMonths-button"></i>
                                        <h3>1 to 3 months</h3>
                                    </div>
                                </div>
                                <div class="lessThanOneMonth">
                                    <div class="time-title">
                                        <i class="fa fa-circle" id="lessThanOneMonth-button"></i>
                                        <h3>Less than 1 month</h3>
                                    </div>
                                </div>
                            </div>
        
                            <div class="freelance-experience">
                                <h3 id="currentExperienceChoice">Entry Level</h3>
                                <i class="fa fa-pencil" id="freelance-experience-edit" title="Edit"></i>
                            </div>
                            <div class="freelance-experience-options">
                                <h3>What level of experience will you need?</h3>
                                <span>This helps us match expertise to your needs.</span>
                                <div class="entry-option">
                                    <div class="option-title">
                                        <i class="fa fa-circle" id="entry-button"></i>
                                        <h3>Entry</h3>
                                    </div>
                                    <span>Looking for somone relatively, new to thsi field.</span>
                                </div>
                                <div class="intermediate-option">
                                    <div class="option-title">
                                        <i class="fa fa-circle" id="intermediate-button"></i>
                                        <h3>Intermediate</h3>
                                    </div>
                                    <span>Looking for substantial experience in this field.</span>
                                </div>
                                <div class="expert-option">
                                    <div class="option-title">
                                        <i class="fa fa-circle" id="expert-button"></i>
                                        <h3>Expert</h3>
                                    </div>
                                    <span>Looking for comprehensive and deep expertise in this field.</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="editScopeSubmit">
                        <button id="cancelEdit" onclick="closeScope()">Cancel</button>
                        <button id="applyScopeEdit">Apply</button>
                    </div>
                </div>
            </div>

            <h4>Location</h4>
            <div class="reviewLocation">
                <p id="selectedLocation"></p>
                <i class="fa fa-pencil" onclick="openLocation()"></i>
            </div>

            <div id="locationOverlay" class="locationOverlay">
                <div class="editLocationContainer">
                    <div class="editLocationHeader">
                        <h3>Edit Location</h3>
                        <i class="fa fa-times" aria-hidden="true" onclick="closeLocation()"></i>
                    </div>
                    <div class="editLocationBody">
                        <div class="detail-input-section">
                            <div class="locationOptions">
                                <div class="optionCard" id="usOnly">
                                    <div class="choosen">
                                        <i class="fa fa-circle" aria-hidden="true" id="usOnly-button"></i>
                                    </div>
                                    <div class="usOnly">
                                        <i class="fa fa-map-marker" aria-hidden="true"></i>
                                        <h4>U.S. only</h4>
                                        <p>Only talent in the United States can submit proposals</p>
                                    </div>
                                </div>
                                <div class="optionCard" id="worldwide">
                                    <div class="choosen">
                                        <i class="fa fa-circle" aria-hidden="true" id="worlwide-button"></i>
                                    </div>
                                    <div class="worldwide">
                                        <i class="fa fa-globe" aria-hidden="true"></i>
                                        <h4>Worldwide</h4>
                                        <p>Freelancers in any location can submit proposals</p>
                                    </div>
                                </div>
                            </div>
                            <div class="locationsCards">
                                <div class="usOnlyCard">
                                    <h4>States or time zone preferences <span>(optional)</span></h4>
                                    <div class="statesPulldown">
                                        <input type="text" list="Timezones&States" id="TimeZones&StatesID" autocomplete="off" placeholder="Add states or timezones">                  
                                        <button id="add1">Add</button>
                                    </div>
                                    <span>These location preferences will be displayed to freelancers, but anyone can submit proposals.</span>
                                </div>
                                <div class="worldwideCard">
                                    <h4>Region or country preferences <span>(optional)</span></h4>
                                    <div class="worldwidePulldown">
                                        <input type="text" autocomplete="off" id="States&RegionsID" list="Region&Countries" placeholder="Add Region or States">                  
                                        <button id="add2">Add</button>
                                    </div>
                                    <span>These location preferences will be displayed to all candidates, but anyone can submit proposals.</span>
                                </div>
                            </div>
                            <span style="color: red;font-size: 0.9rem;margin-left: 1rem;" id="emptyError"></span>
                            <div class="selectedLocationsUSCard">
                                <h5>Selected Locations</h5>
                                <span style="font-size: 0.7rem;color: red;padding: 1rem 0rem;">(Press on button to remove)</span>
                                <div class="selectedLocationsUS">
                                </div>
                            </div>
                            <div class="selectedLocationsWorldwideCard">
                                <h5>Selected Locations</h5>
                                <span style="font-size: 0.7rem;color:#0a345e;">(Press on button to remove)</span>
                                <div class="selectedLocationsWorldwide">
                                </div>
                            </div>
                            <span style="color: red;font-size: 0.9rem;margin-left: 1rem;" id="emptyArray"></span>
                        </div>
                    </div>

                    <div class="editLocationSubmit">
                        <button id="cancelEdit" onclick="closeLocation()">Cancel</button>
                        <button id="applyLocationEdit">Apply</button>
                    </div>
                </div>
            </div>

            <h4>Budget</h4>
            <div class="reviewBudget">
                <p id="selectedBudget"></p>
                <i class="fa fa-pencil" onclick="openBudget()"></i>
            </div>

            <div id="budgetOverlay" class="budgetOverlay">
                <div class="editBudgetContainer">
                    <div class="editBudgetHeader">
                        <h3>Edit Budget</h3>
                        <i class="fa fa-times" aria-hidden="true" onclick="closeBudget()"></i>
                    </div>
                    <div class="editBudgetBody">
                        <div class="detail-input-section">
                            <div class="budgetOptions">
                                <div class="optionCard" id="hourlyCard">
                                    <div class="choosen">
                                        <i class="fa fa-circle" aria-hidden="true" id="hourlyCard-button"></i>
                                    </div>
                                    <div class="hourly">
                                        <i class="fa fa-clock-o" aria-hidden="true"></i>
                                        <h4>Hourly Rate</h4>
                                    </div>
                                </div>
                                <div class="optionCard" id="priceCard">
                                    <div class="choosen">
                                        <i class="fa fa-circle" aria-hidden="true" id="priceCard-button"></i>
                                    </div>
                                    <div class="budget">
                                        <svg width="24" height="24" xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd" clip-rule="evenodd"><path d="M12.628 21.412l5.969-5.97 1.458 3.71-12.34 4.848-4.808-12.238 9.721 9.65zm-1.276-21.412h-9.352v9.453l10.625 10.547 9.375-9.375-10.648-10.625zm4.025 9.476c-.415-.415-.865-.617-1.378-.617-.578 0-1.227.241-2.171.804-.682.41-1.118.584-1.456.584-.361 0-1.083-.408-.961-1.218.052-.345.25-.697.572-1.02.652-.651 1.544-.848 2.276-.106l.744-.744c-.476-.476-1.096-.792-1.761-.792-.566 0-1.125.227-1.663.677l-.626-.627-.698.699.653.652c-.569.826-.842 2.021.076 2.938 1.011 1.011 2.188.541 3.413-.232.6-.379 1.083-.563 1.475-.563.589 0 1.18.498 1.078 1.258-.052.386-.26.763-.621 1.122-.451.451-.904.679-1.347.679-.418 0-.747-.192-1.049-.462l-.739.739c.463.458 1.082.753 1.735.753.544 0 1.087-.201 1.612-.597l.54.538.697-.697-.52-.521c.743-.896 1.157-2.209.119-3.247zm-9.678-7.476c.938 0 1.699.761 1.699 1.699 0 .938-.761 1.699-1.699 1.699-.938 0-1.699-.761-1.699-1.699 0-.938.761-1.699 1.699-1.699z"/></svg>
                                        <h4>Project Budget</h4>
                                    </div>
                                </div>
                            </div>
                            <div class="hourlyContainer">
                                <div class="setHourlyRate">
                                    <div class="minimum">
                                        <p>From</p>
                                        <div class="addMinHourly">
                                            <div class="inputContainer">
                                                <span>$</span>
                                                <input type="text"  onfocus="this.value=''" id="setMinHourly" required placeholder="0">
                                                <button id="addMinHourly">Add</button>
        
                                            </div>
                                            <span>/ hour</span>
                                        </div>
                                        <span id="alertMinHourly"></span>
                                    </div>
                                    <div class="maximum">
                                        <p>To</p>
                                        <div class="addMaxHourly">
                                            <div class="inputContainer">
                                                <span>$</span>
                                                <input type="text"  onfocus="this.value=''" id="setMaxHourly" required placeholder="0">
                                                <button id="addMaxHourly">Add</button>
                                            </div>
                                            <span>/ hour</span>
                                        </div>
                                        <span id="MaxError"></span>
                                    </div>
                                </div>
                                <p id="OfficialRate">Hourly Rate: $<span id="officialMinRate">0</span>&nbsp; To &nbsp; $<span id="officialMaxRate">0</span>&nbsp; /hour</p>
                            </div>
                            <div class="budgetContainer">
                                <h4>Maximum project budget (USD)</h4>
                                <div class="addBudget">
                                    <span>$</span>
                                    <input  type="text" id="setMaxBudget" required placeholder="0">
                                    <button id="addMaxBudget">Add</button>
                                </div>
                                <span id="alertBudget"></span>
                                <p id="OfficalBudget">Max Budget: $ <span id="userBudget"></span></p>
                            </div>

                        </div>
                    </div>

                    <div class="editBudgetSubmit">
                        <button id="cancelEdit" onclick="closeBudget()">Cancel</button>
                        <button id="applyBudgetEdit">Apply</button>
                    </div>
                </div>
            </div>

        </div>
        <div class="buttonCard">
            <div class="back">
                <button id="back">Back</button>
            </div>
            <div class="continue">
                <button id="cancel">Cancel</button>
                <input type="submit" value="Post Job" name="submit" id="postJob"></input>
            </div>
            
        </div>
    </div>
</form>
    <div class="profileFooter">
        <div class="profile-links">
            <div class="links">
                <ul>
                    <a href="./PostAJob.html">Post a Job</a>
                    <a href="#/">Find Talent</a>
                    <a href="#/">Browse Projects</a>
                </ul>
            </div>
            <div class="links">
                <ul>
                    <a href="#/">About Us</a>
                    <a href="#/">Developers</a>
                    <a href="#/">Contact Us</a>
                </ul>
            </div>
            <div class="links">
                <ul>
                    <a href="#/">Help & Support</a>
                    <a href="#/">EZWork Reviews</a>
                    <a href="#/">Trust & Security</a>
                </ul>
            </div>
            <div class="links">
                <ul>
                    <a href="#/">Terms of Service</a>
                    <a href="#/">Privacy Policy</a>
                    <a href="#/">Accessibility</a>
                </ul>
            </div>
        </div>
        <div class="profile-social-links">
            <p>Follow Us</p>
            <a href="https://github.com/leobarrientos02/" target="_blank" rel="noopener noreferrer"><i class="fa fa-github" aria-hidden="true"></i></a>
            <a href="https://twitter.com/L3O_BARRI3nT0S" target="_blank" rel="noopener noreferrer"><i class="fa fa-twitter" aria-hidden="true"></i></a>
            <a href="https://www.linkedin.com/in/leonel-barrientos-519b5a152/" target="_blank" rel="noopener noreferrer"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
            <a href="https://www.youtube.com/channel/UCnLwo3-caCdv6eOjGzJ0eEg" target="_blank" rel="noopener noreferrer"><i class="fa fa-youtube-play" aria-hidden="true"></i></a>
            <a href="https://www.instagram.com/leo_barrientos182/" target="_blank" rel="noopener noreferrer"><i class="fa fa-instagram" aria-hidden="true"></i></a>
        </div>
        <div class="copyright">
            <p>
                &copy Copyright. 2021-
                <script>document.write(new Date().getFullYear())</script>
                EzWork&trade; Global Inc.
            </p>
        </div>
    </div>
                <!--DataList-->
                <datalist id="allskills">
                </datalist>

                <!--Datalist for Categories-->
                <datalist id="allWritingSpecialty">            
                </datalist>

                                <!--Datalist for Timezones and States-->
                <datalist id="Timezones&States">
                    <optgroup id="timezones">
                        <option value="(GMT-5:00) Eastern Time Zone">(GMT-5:00) Eastern Time Zone</option>
                        <option value="(GMT-6:00) Central Time Zone">(GMT-6:00) Central Time Zone</option>
                        <option value="(GMT-7:00) Mountain Time Zone">(GMT-7:00) Mountain Time Zone</option>
                        <option value="(GMT-8:00) Pacific Time Zone">(GMT-8:00) Pacific Time Zone</option>
                        <option value="(GMT-9:00) Alaska Time Zone">(GMT-9:00) Alaska Time Zone</option>
                        <option value="(GMT-10:00) Hawaii Time Zone">(GMT-10:00) Hawaii Time Zone</option>
                    </optgroup>
                    <optgroup id="states">
                        <option value="Alabama">Alabama</option>
                        <option value="Alaska">Alaska</option>
                        <option value="American Samoa">American Samoa</option>
                        <option value="Arizona">Arizona</option>
                        <option value="Arkansas">Arkansas</option>
                        <option value="California">California</option>
                        <option value="Colorado">Colorado</option>
                        <option value="Connecticut">Connecticut</option>
                        <option value="Delaware">Delaware</option>
                        <option value="District Of Columbia">District Of Columbia</option>
                        <option value="Federated States Of Micronesia">Federated States Of Micronesia</option>
                        <option value="Florida">Florida</option>
                        <option value="Georgia">Georgia</option>
                        <option value="Guam">Guam</option>
                        <option value="Hawaii">Hawaii</option>
                        <option value="Idaho">Idaho</option>
                        <option value="Illinois">Illinois</option>
                        <option value="Indiana">Indiana</option>
                        <option value="Iowa">Iowa</option>
                        <option value="Kansas">Kansas</option>
                        <option value="Kentucky">Kentucky</option>
                        <option value="Louisiana">Louisiana</option>
                        <option value="Maine">Maine</option>
                        <option value="Marshall Islands">Marshall Islands</option>
                        <option value="Maryland">Maryland</option>
                        <option value="Massachusetts">Massachusetts</option>
                        <option value="Michigan">Michigan</option>
                        <option value="Minnesota">Minnesota</option>
                        <option value="Mississippi">Mississippi</option>
                        <option value="Missouri">Missouri</option>
                        <option value="Montana">Montana</option>
                        <option value="Nebraska">Nebraska</option>
                        <option value="Nevada">Nevada</option>
                        <option value="New Hampshire">New Hampshire</option>
                        <option value="New Jersey">New Jersey</option>
                        <option value="New Mexico">New Mexico</option>
                        <option value="New York">New York</option>
                        <option value="North Carolina">North Carolina</option>
                        <option value="North Dakota">North Dakota</option>
                        <option value="Northern Mariana Islands">Northern Mariana Islands</option>
                        <option value="Ohio">Ohio</option>
                        <option value="Oklahoma">Oklahoma</option>
                        <option value="Oregon">Oregon</option>
                        <option value="Palau">Palau</option>
                        <option value="Pennsylvania">Pennsylvania</option>
                        <option value="Puerto Rico">Puerto Rico</option>
                        <option value="Rhode Island">Rhode Island</option>
                        <option value="South Carolina">South Carolina</option>
                        <option value="South Dakota">South Dakota</option>
                        <option value="Tennessee">Tennessee</option>
                        <option value="Texas">Texas</option>
                        <option value="Utah">Utah</option>
                        <option value="Vermont">Vermont</option>
                        <option value="Virgin Islands">Virgin Islands</option>
                        <option value="Virginia">Virginia</option>
                        <option value="Washington">Washington</option>
                        <option value="West Virginia">West Virginia</option>
                        <option value="Wisconsin">Wisconsin</option>
                        <option value="Wyoming">Wyoming</option>
                    </optgroup>
                </datalist>

                <!--Data list for Region and Countries-->
                <datalist id="Region&Countries">
                    <optgroup id="regions">
                        <option value="Africa">Africa</option>
                        <option value="Americas">Americas</option>
                        <option value="Antarctica">Antartica</option>
                        <option value="Asia">Asia</option>
                        <option value="Europe">Europe</option>
                        <option value="Oceania">Oceania</option>
                    </optgroup>
                    <optgroup id="countries">
                        <option value="Afganistan">Afghanistan</option>
                        <option value="Albania">Albania</option>
                        <option value="Algeria">Algeria</option>
                        <option value="American Samoa">American Samoa</option>
                        <option value="Andorra">Andorra</option>
                        <option value="Angola">Angola</option>
                        <option value="Anguilla">Anguilla</option>
                        <option value="Antigua & Barbuda">Antigua & Barbuda</option>
                        <option value="Argentina">Argentina</option>
                        <option value="Armenia">Armenia</option>
                        <option value="Aruba">Aruba</option>
                        <option value="Australia">Australia</option>
                        <option value="Austria">Austria</option>
                        <option value="Azerbaijan">Azerbaijan</option>
                        <option value="Bahamas">Bahamas</option>
                        <option value="Bahrain">Bahrain</option>
                        <option value="Bangladesh">Bangladesh</option>
                        <option value="Barbados">Barbados</option>
                        <option value="Belarus">Belarus</option>
                        <option value="Belgium">Belgium</option>
                        <option value="Belize">Belize</option>
                        <option value="Benin">Benin</option>
                        <option value="Bermuda">Bermuda</option>
                        <option value="Bhutan">Bhutan</option>
                        <option value="Bolivia">Bolivia</option>
                        <option value="Bonaire">Bonaire</option>
                        <option value="Bosnia & Herzegovina">Bosnia & Herzegovina</option>
                        <option value="Botswana">Botswana</option>
                        <option value="Brazil">Brazil</option>
                        <option value="British Indian Ocean Ter">British Indian Ocean Ter</option>
                        <option value="Brunei">Brunei</option>
                        <option value="Bulgaria">Bulgaria</option>
                        <option value="Burkina Faso">Burkina Faso</option>
                        <option value="Burundi">Burundi</option>
                        <option value="Cambodia">Cambodia</option>
                        <option value="Cameroon">Cameroon</option>
                        <option value="Canada">Canada</option>
                        <option value="Canary Islands">Canary Islands</option>
                        <option value="Cape Verde">Cape Verde</option>
                        <option value="Cayman Islands">Cayman Islands</option>
                        <option value="Central African Republic">Central African Republic</option>
                        <option value="Chad">Chad</option>
                        <option value="Channel Islands">Channel Islands</option>
                        <option value="Chile">Chile</option>
                        <option value="China">China</option>
                        <option value="Christmas Island">Christmas Island</option>
                        <option value="Cocos Island">Cocos Island</option>
                        <option value="Colombia">Colombia</option>
                        <option value="Comoros">Comoros</option>
                        <option value="Congo">Congo</option>
                        <option value="Cook Islands">Cook Islands</option>
                        <option value="Costa Rica">Costa Rica</option>
                        <option value="Cote DIvoire">Cote DIvoire</option>
                        <option value="Croatia">Croatia</option>
                        <option value="Cuba">Cuba</option>
                        <option value="Curaco">Curacao</option>
                        <option value="Cyprus">Cyprus</option>
                        <option value="Czech Republic">Czech Republic</option>
                        <option value="Denmark">Denmark</option>
                        <option value="Djibouti">Djibouti</option>
                        <option value="Dominica">Dominica</option>
                        <option value="Dominican Republic">Dominican Republic</option>
                        <option value="East Timor">East Timor</option>
                        <option value="Ecuador">Ecuador</option>
                        <option value="Egypt">Egypt</option>
                        <option value="El Salvador">El Salvador</option>
                        <option value="Equatorial Guinea">Equatorial Guinea</option>
                        <option value="Eritrea">Eritrea</option>
                        <option value="Estonia">Estonia</option>
                        <option value="Ethiopia">Ethiopia</option>
                        <option value="Falkland Islands">Falkland Islands</option>
                        <option value="Faroe Islands">Faroe Islands</option>
                        <option value="Fiji">Fiji</option>
                        <option value="Finland">Finland</option>
                        <option value="France">France</option>
                        <option value="French Guiana">French Guiana</option>
                        <option value="French Polynesia">French Polynesia</option>
                        <option value="French Southern Ter">French Southern Ter</option>
                        <option value="Gabon">Gabon</option>
                        <option value="Gambia">Gambia</option>
                        <option value="Georgia">Georgia</option>
                        <option value="Germany">Germany</option>
                        <option value="Ghana">Ghana</option>
                        <option value="Gibraltar">Gibraltar</option>
                        <option value="Great Britain">Great Britain</option>
                        <option value="Greece">Greece</option>
                        <option value="Greenland">Greenland</option>
                        <option value="Grenada">Grenada</option>
                        <option value="Guadeloupe">Guadeloupe</option>
                        <option value="Guam">Guam</option>
                        <option value="Guatemala">Guatemala</option>
                        <option value="Guinea">Guinea</option>
                        <option value="Guyana">Guyana</option>
                        <option value="Haiti">Haiti</option>
                        <option value="Hawaii">Hawaii</option>
                        <option value="Honduras">Honduras</option>
                        <option value="Hong Kong">Hong Kong</option>
                        <option value="Hungary">Hungary</option>
                        <option value="Iceland">Iceland</option>
                        <option value="Indonesia">Indonesia</option>
                        <option value="India">India</option>
                        <option value="Iran">Iran</option>
                        <option value="Iraq">Iraq</option>
                        <option value="Ireland">Ireland</option>
                        <option value="Isle of Man">Isle of Man</option>
                        <option value="Israel">Israel</option>
                        <option value="Italy">Italy</option>
                        <option value="Jamaica">Jamaica</option>
                        <option value="Japan">Japan</option>
                        <option value="Jordan">Jordan</option>
                        <option value="Kazakhstan">Kazakhstan</option>
                        <option value="Kenya">Kenya</option>
                        <option value="Kiribati">Kiribati</option>
                        <option value="Korea North">Korea North</option>
                        <option value="Korea Sout">Korea South</option>
                        <option value="Kuwait">Kuwait</option>
                        <option value="Kyrgyzstan">Kyrgyzstan</option>
                        <option value="Laos">Laos</option>
                        <option value="Latvia">Latvia</option>
                        <option value="Lebanon">Lebanon</option>
                        <option value="Lesotho">Lesotho</option>
                        <option value="Liberia">Liberia</option>
                        <option value="Libya">Libya</option>
                        <option value="Liechtenstein">Liechtenstein</option>
                        <option value="Lithuania">Lithuania</option>
                        <option value="Luxembourg">Luxembourg</option>
                        <option value="Macau">Macau</option>
                        <option value="Macedonia">Macedonia</option>
                        <option value="Madagascar">Madagascar</option>
                        <option value="Malaysia">Malaysia</option>
                        <option value="Malawi">Malawi</option>
                        <option value="Maldives">Maldives</option>
                        <option value="Mali">Mali</option>
                        <option value="Malta">Malta</option>
                        <option value="Marshall Islands">Marshall Islands</option>
                        <option value="Martinique">Martinique</option>
                        <option value="Mauritania">Mauritania</option>
                        <option value="Mauritius">Mauritius</option>
                        <option value="Mayotte">Mayotte</option>
                        <option value="Mexico">Mexico</option>
                        <option value="Midway Islands">Midway Islands</option>
                        <option value="Moldova">Moldova</option>
                        <option value="Monaco">Monaco</option>
                        <option value="Mongolia">Mongolia</option>
                        <option value="Montserrat">Montserrat</option>
                        <option value="Morocco">Morocco</option>
                        <option value="Mozambique">Mozambique</option>
                        <option value="Myanmar">Myanmar</option>
                        <option value="Nambia">Nambia</option>
                        <option value="Nauru">Nauru</option>
                        <option value="Nepal">Nepal</option>
                        <option value="Netherland Antilles">Netherland Antilles</option>
                        <option value="Netherlands">Netherlands (Holland, Europe)</option>
                        <option value="Nevis">Nevis</option>
                        <option value="New Caledonia">New Caledonia</option>
                        <option value="New Zealand">New Zealand</option>
                        <option value="Nicaragua">Nicaragua</option>
                        <option value="Niger">Niger</option>
                        <option value="Nigeria">Nigeria</option>
                        <option value="Niue">Niue</option>
                        <option value="Norfolk Island">Norfolk Island</option>
                        <option value="Norway">Norway</option>
                        <option value="Oman">Oman</option>
                        <option value="Pakistan">Pakistan</option>
                        <option value="Palau Island">Palau Island</option>
                        <option value="Palestine">Palestine</option>
                        <option value="Panama">Panama</option>
                        <option value="Papua New Guinea">Papua New Guinea</option>
                        <option value="Paraguay">Paraguay</option>
                        <option value="Peru">Peru</option>
                        <option value="Phillipines">Philippines</option>
                        <option value="Pitcairn Island">Pitcairn Island</option>
                        <option value="Poland">Poland</option>
                        <option value="Portugal">Portugal</option>
                        <option value="Puerto Rico">Puerto Rico</option>
                        <option value="Qatar">Qatar</option>
                        <option value="Republic of Montenegro">Republic of Montenegro</option>
                        <option value="Republic of Serbia">Republic of Serbia</option>
                        <option value="Reunion">Reunion</option>
                        <option value="Romania">Romania</option>
                        <option value="Russia">Russia</option>
                        <option value="Rwanda">Rwanda</option>
                        <option value="St Barthelemy">St Barthelemy</option>
                        <option value="St Eustatius">St Eustatius</option>
                        <option value="St Helena">St Helena</option>
                        <option value="St Kitts-Nevis">St Kitts-Nevis</option>
                        <option value="St Lucia">St Lucia</option>
                        <option value="St Maarten">St Maarten</option>
                        <option value="St Pierre & Miquelon">St Pierre & Miquelon</option>
                        <option value="St Vincent & Grenadines">St Vincent & Grenadines</option>
                        <option value="Saipan">Saipan</option>
                        <option value="Samoa">Samoa</option>
                        <option value="Samoa American">Samoa American</option>
                        <option value="San Marino">San Marino</option>
                        <option value="Sao Tome & Principe">Sao Tome & Principe</option>
                        <option value="Saudi Arabia">Saudi Arabia</option>
                        <option value="Senegal">Senegal</option>
                        <option value="Seychelles">Seychelles</option>
                        <option value="Sierra Leone">Sierra Leone</option>
                        <option value="Singapore">Singapore</option>
                        <option value="Slovakia">Slovakia</option>
                        <option value="Slovenia">Slovenia</option>
                        <option value="Solomon Islands">Solomon Islands</option>
                        <option value="Somalia">Somalia</option>
                        <option value="South Africa">South Africa</option>
                        <option value="Spain">Spain</option>
                        <option value="Sri Lanka">Sri Lanka</option>
                        <option value="Sudan">Sudan</option>
                        <option value="Suriname">Suriname</option>
                        <option value="Swaziland">Swaziland</option>
                        <option value="Sweden">Sweden</option>
                        <option value="Switzerland">Switzerland</option>
                        <option value="Syria">Syria</option>
                        <option value="Tahiti">Tahiti</option>
                        <option value="Taiwan">Taiwan</option>
                        <option value="Tajikistan">Tajikistan</option>
                        <option value="Tanzania">Tanzania</option>
                        <option value="Thailand">Thailand</option>
                        <option value="Togo">Togo</option>
                        <option value="Tokelau">Tokelau</option>
                        <option value="Tonga">Tonga</option>
                        <option value="Trinidad & Tobago">Trinidad & Tobago</option>
                        <option value="Tunisia">Tunisia</option>
                        <option value="Turkey">Turkey</option>
                        <option value="Turkmenistan">Turkmenistan</option>
                        <option value="Turks & Caicos Is">Turks & Caicos Is</option>
                        <option value="Tuvalu">Tuvalu</option>
                        <option value="Uganda">Uganda</option>
                        <option value="United Kingdom">United Kingdom</option>
                        <option value="Ukraine">Ukraine</option>
                        <option value="United Arab Erimates">United Arab Emirates</option>
                        <option value="United States of America">United States of America</option>
                        <option value="Uraguay">Uruguay</option>
                        <option value="Uzbekistan">Uzbekistan</option>
                        <option value="Vanuatu">Vanuatu</option>
                        <option value="Vatican City State">Vatican City State</option>
                        <option value="Venezuela">Venezuela</option>
                        <option value="Vietnam">Vietnam</option>
                        <option value="Virgin Islands (Brit)">Virgin Islands (Brit)</option>
                        <option value="Virgin Islands (USA)">Virgin Islands (USA)</option>
                        <option value="Wake Island">Wake Island</option>
                        <option value="Wallis & Futana Is">Wallis & Futana Is</option>
                        <option value="Yemen">Yemen</option>
                        <option value="Zaire">Zaire</option>
                        <option value="Zambia">Zambia</option>
                        <option value="Zimbabwe">Zimbabwe</option>
                    </optgroup>
                </datalist>
</body>
<!--Nav bar script-->
<script>
    var job = document.querySelector('.jobCard');
    var talent = document.querySelector('.talentCard');
    var project = document.querySelector('.projectCard');
    var help = document.querySelector('.helpCard');
    var session = document.querySelector('.sessionCard');
    function toggleJob(){
        var job = document.querySelector('.jobCard');
        if(job.style.display === 'none'){
            job.style.display = 'inline-block';
            talent.style.display = 'none';
            project.style.display = 'none';
            help.style.display = 'none';
            session.style.display = 'none';
        }
        else{
            job.style.display='none';
            
        }
    }
    function toggleTalent(){
        var talent = document.querySelector('.talentCard');
        if(talent.style.display==='none'){
            talent.style.display = 'inline-block';
            job.style.display = 'none';
            project.style.display = 'none';
            help.style.display = 'none';
            session.style.display = 'none';
        }
        else{
            talent.style.display = 'none';
        }
    }
    function toggleProject(){
        var project = document.querySelector('.projectCard');
        if(project.style.display==='none'){
            project.style.display = 'inline-block';
            talent.style.display = 'none';
            job.style.display = 'none';
            help.style.display = 'none';
            session.style.display = 'none';
        }
        else{
            project.style.display = 'none';
        }
    }
    function toggleHelp(){
        var help = document.querySelector('.helpCard');
        if(help.style.display==='none'){
            help.style.display = 'inline-block';
            talent.style.display = 'none';
            project.style.display = 'none';
            job.style.display = 'none';
            session.style.display = 'none';
        }
        else{
            help.style.display = 'none';
        }
    }
    function toggleSession(){
       
        if(session.style.display==='none'){
            session.style.display = 'inline-block';
            talent.style.display = 'none';
            project.style.display = 'none';
            help.style.display = 'none';
            job.style.display = 'none';
        }
        else{
            session.style.display = 'none';
        }
    }

</script>
<!--Toggle the nav burger button-->
<script>
    const navIcon = document.getElementById("nav-burger");
    const profileMobileNav = document.querySelector(".profile-mobile-nav");

    function myFunction(x) {
        x.classList.toggle("change");
        if(x.classList.contains('change')){
            profileMobileNav.style.display = "inline-block";
            searchIcon.style.opacity='0';
        }
        else{
            profileMobileNav.style.display='none';
            searchIcon.style.opacity='1';
        }
    }
</script>
<script>
const sortDownBtn = document.getElementById('jobArrow');
async function toggleJobCard(){
    var mobileJobCard = document.querySelector(".mobileJobCard"); 
    if (mobileJobCard.style.display === "none") {
        sortDownBtn.style.transform = "rotate(180deg)";
        mobileJobCard.style.display = "inline-block";
    } else {
        mobileJobCard.style.display = "none";
        sortDownBtn.style.transform = "rotate(360deg)";
    }
}
</script>
<!--THe edit pencil buttons, opens the edit container-->
<script>
    function openCard() {
      document.getElementById("settingsOverlay").style.display = "block";
    }
    
    function closeCard() {
      document.getElementById("settingsOverlay").style.display = "none";
    }
    
    function openSkills(){
        document.getElementById("skillsOverlay").style.display = "block";
    }
    function closeSkills(){
        document.getElementById("skillsOverlay").style.display = "none";
    }

    function openScope(){
        document.getElementById("scopeOverlay").style.display = "block";
    }
    function closeScope(){
        document.getElementById("scopeOverlay").style.display = "none";
    }

    function openLocation(){
        document.getElementById("locationOverlay").style.display = "block";
    }
    function closeLocation(){
        document.getElementById("locationOverlay").style.display = "none";
    }

    function openBudget(){
        document.getElementById("budgetOverlay").style.display = "block";
    }
    function closeBudget(){
        document.getElementById("budgetOverlay").style.display = "none";
    }
</script>

<script src="./reviewJob.js"></script>

</html>