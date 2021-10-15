<?php
    session_start();

	function securityscan($data) {
	  $data = trim($data);
	  $data = stripslashes($data);
	  $data = htmlspecialchars($data);
	  return $data;
	}
	
    if(isset($_POST['submit'])){
        require_once("../classes/DB.php");

        $firstname = securityscan($_POST['firstName']);
        $lastname = securityscan($_POST['lastName']);
        $birthday = securityscan($_POST['birthday']);
        $phone = securityscan($_POST['phone']);
        $email = securityscan($_POST['email']);
        $password = securityscan($_POST['password']);
        $password2 = securityscan($_POST['password2']);

        if ($password != $password2) {
            echo "error passwords do not match!";
            die;
        }

        $password_hash = password_hash($password, PASSWORD_BCRYPT);
        $sql="INSERT INTO clients(username,firstname,lastname,email,password,phone) VALUES('$firstname', '$firstname', '$lastname', '$email', '$password_hash', '$phone')";
        
        $result = mysqli_query($conn, $sql) or die(mysqli_errno());

        if ($result) {
            $username = $firstname . "" . $lastname;
            $_SESSION['userid'] = $username;
            header("Location: ../ClientProfile/index.php");
        } else {
            echo "not working";
        }
        

    }
?>