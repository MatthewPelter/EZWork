<?php
session_start();
include '../components/session-checker.php';
require_once("../classes/DB.php");


// Converting the username to a userid from the user that is logged in
$username = $_SESSION['userid'];
//$getUserID = "SELECT id FROM clients WHERE username = '$username'";
//$getResult = mysqli_query($conn, $getUserID);
//$row = mysqli_fetch_assoc($getResult);
$userID = $_SESSION['user_id'];

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

    <div class="registerFreelancer">
        <div class="registerFreelancer-nav">
            <ul>
                <li  id="linkeninNav"><div class="tab"></div><a href="#/"><i class="fab fa-linkedin"></i>Getting Started</a></li>
                <li  id="expertiseNav"><a href="#/"><i class="fas fa-user-clock"></i>Expertise</a></li>
                <li  id="educationNav"><a href="#/"><i class="fas fa-graduation-cap"></i>Education</a></li>
                <li  id="employmentNav"><a href="#/"><i class="fas fa-briefcase"></i>Employment</a></li>
                <li  id="payRateNav"><a href="#/"><i class="fas fa-dollar-sign"></i>Hourly Rate</a></li>
                <li  id="titleNav"><a href="#/"><i class="fa fa-user-tie"></i>Biography</a></li>
                <li  id="profilePicNav"><a href="#/"><i class="fas fa-camera-retro"></i>Profile Photo</a></li>
                <li  id="locationNav"><a href="#/"><i class="fas fa-map-marker-alt"></i>Location</a></li>
            </ul>
        </div>

        <!--Form Start-->
        <form id="registerForm">
            <div class="start">
                <div class="start-container">
                    <div class="start-container-title">
                        <h2 id="start-title">Getting Started</h2>
                    </div>
                    <div class="start-card">
                        <h3>Upload your LinkedIn Profile</h3>
                        <input type="url" name="" id="" placeholder="Enter your LinkenIn Account">
                        <a href="https://www.linkedin.com/home"  target="_blank" rel="noopener noreferrer"><i class="fab fa-linkedin"></i>LinkedIn</a>
                        <p>If you do not have a LinkedIn Account, you may skip this step.</p>

                        <div class="stepButtons">
                            <span id="skipStep">Skip Step</span>
                            <span id="nextStep">Next Step</span>
                        </div>
        
                    </div>
                </div>
            </div>
            
            <!--Expertise Start-->
            <div class="expertise">
                <div class="expertise-container">
                    <div class="expertise-container-title">
                        <h2 id="expertise-title">Expertise</h2>
                    </div>
                    <div class="expertise-card">
                        <h3>What is your Expertise?</h3>
                        <input type="text" name="" id="" placeholder="Software Engineer">

                        <h3 style="margin-top: 1rem;">What is your Experience Level?</h3>
                        <select name="experience">
                            <option value="">----Select----</options>
                            <option value="entry" value="">Entry </options>
                            <option value="intermediate" value="">Intermediate </options>
                            <option value="expert" value="">Expert</options>
                        </select>  

                        <div class="noExperience">
                            <input type="checkbox" name="" id="">
                            <p>No formal experience.</p>
                        </div>                 
                        <div class="stepButtons">
                            <span id="backToLinkedIn">Back</span>
                            <span id="nextStepEducation">Next Step</span>
                        </div>
        
                    </div>
                </div>
            </div>
            <!--Expertise End-->

            <!--Education Start-->
            <div class="education">
                <div class="education-container">
                    <div class="education-container-title">
                        <h2 id="education-title">Education</h2>
                    </div>
                    <div class="education-card">
                        <h3>School</h3>
                        <input type="text" name="" id="" placeholder="School Name">
                        <h3>Degree</h3>
                        <select>
                            <option value="">----Select----</options>
                            <option value="GED">GED</option>
                            <option value="Associate's Degree">Associate's Degree</option>
                            <option value="Bachelor's degree">Bachelor's degree</option>
                            <option value="Master's degree">Master's degree</option>
                            <option value="Doctorate or higher">Doctorate or higher</option>
                        </select>
                        <h3>Field of Study</h3>
                        <input type="text" name="" id="" placeholder="Aviation">
                        <h3>Dates Attended</h3>
                        <div class="dateCard">

                            <input type="number" min="1900" max="2099" step="1" placeholder="2017" value="2017" />
                            
                            <input type="number" min="1900" max="2099" step="1" placeholder="2021" value="2021" />
                        </div>

                        <div class="noEducation">
                            <input type="checkbox" name="" id="">
                            <p>No formal education completed.</p>
                        </div>
                        <div class="stepButtons">
                            <span id="backToExpertise">Back</span>
                            <span id="nextStepEmployment">Next Step</span>
                        </div>
        
                    </div>
                </div>
            </div>
            <!--Education End-->

            
            <!--Employment Start-->
            <div class="employment">
                <div class="employment-container">
                    <div class="employment-container-title">
                        <h2 id="employment-title">Employment History</h2>
                    </div>
                    <div class="employment-card">
                        <h3>Job Title</h3>
                        <input type="text" name="" id="jobTitle" placeholder="Senior Software Engineer">
                        <h3>Company</h3>
                        <input type="text" name="" id="" placeholder="Microsoft">
                        <h3>Location</h3>
                        <input type="text" name="" id="" placeholder="Redmong, Washington, U.S.">

                        
                        <div class="currentJob">
                            <input type="checkbox" name="" id="">
                            <p>I am currently still working this role.</p>
                        </div>

                        <div class="dateCard">
                            <div class="from">
                                <h3>Start Date</h3>
                                <input type="date" name="" id="">
                            </div>
                            <div class="to">
                                <h3>End Date</h3>
                                <input type="date" name="" id="">
                            </div>

                        </div>

                        <div class="noEmployment">
                            <input type="checkbox" name="" id="">
                            <p>No Employment history.</p>
                        </div>
                        
                        <div class="stepButtons">
                            <span id="backToEducation">Back</span>
                            <span id="nextStepPayRate">Next Step</span>
                        </div>
        
                    </div>
                </div>
            </div>
            <!--Employment End-->

            <!--Hourly Rate Start-->
            <div class="hourlyRate">
                <div class="hourlyRate-container">
                    <div class="hourlyRate-container-title">
                        <h2 id="hourlyRate-title">Hourly Pay Rate</h2>
                    </div>
                    <div class="hourlyRate-card">
                        <h3>Now, let’s set your hourly rate.</h3>
                        <p>Clients will see this rate on your profile.</p>
                        
                        <div class="setPay">
                            <h3>Hourly Rate</h3>
                            <p>$ <input type="number" name="" id="payRate" min="0" placeholder="$0.00" style="padding-left: .5rem;"> / hr</p>
                        </div>

                        <div class="ourFee">
                            <h3>EZWork Service Fee</h3>
                            <p>The Upwork Service Fee is 10%.</p>
                        </div>

                        <div class="totalPay">
                            <h3>You'll Recieve</h3>
                            <p>$<span id="totalPay"></span> / hr</p>
                        </div>

                        <div class="stepButtons">
                            <span id="backToEmployment">Back</span>
                            <span id="nextStepTitle">Next Step</span>
                        </div>
        
                    </div>
                </div>
            </div>
            <!--Hourly Rate End-->

            <!--Biography Start-->
            <div class="titleDescription">
                <div class="titleDescription-container">
                    <div class="titleDescription-container-title">
                        <h2 id="titleDescription-title">Description</h2>
                    </div>
                    <div class="titleDescription-card">
                        <h3>Write a bio to tell the world about yourself.</h3>
                        <p>Help our clients get to know you at a glance. What work are you best at? Tell them clearly.</p>

                        <input type="text" name="" id="" placeholder="Biography...">
                        <div class="stepButtons">
                            <span id="backToHourlyRate">Back</span>
                            <span id="nextStepProfilePhoto">Next Step</span>
                        </div>
        
                    </div>
                </div>
            </div>
            <!--Title&Description End-->

            <!--Profile Photo Start-->
            <div class="profilePhoto">
                <div class="profilePhoto-container">
                    <div class="profilePhoto-container-title">
                        <h2 id="profilePhoto-title">Profile Picture</h2>
                    </div>
                    <div class="profilePhoto-card">
                        <div class="profilePic">
                            <img src="../Users/user.svg" alt="">
                            <span>Click to Edit</span>
                            <input type="file" name="" id="" placeholder="Click to Edit">
                        </div>

                        <div class="tips">
                            <h3>Your photo should:</h3>
                            <ul>
                                <li>Be a close-up of your face</li>
                                <li>Show your face clearly</li>
                                <li>Be clear and crisp</li>
                            </ul>
                        </div>

                        <div class="stepButtons">
                            <span id="backToTitleDescription">Back</span>
                            <span id="nextStepLocation">Next Step</span>
                        </div>
        
                    </div>
                </div>
            </div>
            <!--Profile Photo End-->

            <!--Location Start-->
            <div class="locationCard">
                <div class="location-container">
                    <div class="location-container-title">
                        <h2 id="location-title">Location</h2>
                    </div>
                    <div class="location-card">
                        <div class="country">
                            <input type="text" autocomplete="off" id="countryID" list="Region&Countries" placeholder="Country">
                        </div>
                        <div class="street-apartment">
                            <input type="text" name="" id="" autocomplete="off" placeholder="Street Address">
                            <input type="text" name="" id="" class="apt" autocomplete="off" placeholder="APT">
                        </div>
                        <div class="city-state-zip">
                            <input type="text" name="" id="" autocomplete="off" placeholder="City">
                            <input type="text" name="" id="" class="state" autocomplete="off" list="States" placeholder="State">
                            <input type="text" name="" id="" class="zip" autocomplete="off" placeholder="Zip">
                        </div>

                        <div class="stepButtons">
                            <span id="backToProfilePhoto">Back</span>
                            <input type="submit" value="Become Freelancer">
                        </div>
        
                    </div>
                </div>
            </div>
            <!--Location End-->

            <!-- End-->
        </form>
            
    </div>
   
            <!-- Footer -->
            <?php include '../footer.php'; ?>
            <!-- Footer -->
   
    <!--DataList-->
                <datalist id="allskills"></datalist>
                
                <!--Datalist for States-->
                <datalist id="States">
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
<script src="../SkillsContainer/searchProfile.js"></script>
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
    function openCard() {
      document.getElementById("myOverlay").style.display = "block";
    }
    
    function closeCard() {
      document.getElementById("myOverlay").style.display = "none";
    }
</script>

<script src="./register.js"></script>

</html>