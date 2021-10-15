<?php
$myslqi = new mysqli("localhost", "root","", "ezwork");
if($myslqi->connection_error){
    exit('Could not connect');
}

$sql = "SELECT ClientID, FirstName, LastName, Email, Password, BirthDate, ProfileImage FROM client";

$stmt = $myslqi->prepare($sql);
$stmt->bind_param("s", $_GET['q']);
$stmt->execute();
$stmt->store_result();
$stmt->bind_result($cid, $cfirstname, $lastname, $email, $password, $birthdate, $ProfileImage);
$stmt->fetch();
$stmt->close();

echo "<p>" . $cid . "</p>";
echo "<p>" . $cfirstname . "</p>";
echo "<p>" . $lastname . "</p>";
echo "<p>" . $email . "</p>";
echo "<p>" . $password . "</p>";
echo "<p>" . $birthdate . "</p>";
echo "<p>" . $ProfileImage . "</p>";
?>