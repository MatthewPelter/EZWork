<?php
    session_start();
	function securityscan($data) {
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	  }

    if(isset($_POST['submit'])){
		if (!empty($_POST['email']) && !empty($_POST['password'])) {
			require_once("../classes/DB.php");
			
			$email = securityscan($_POST['email']);
			$password = securityscan($_POST['password']);
			
			$sql = "SELECT * FROM clients WHERE email='$email' LIMIT 1";
			$result = mysqli_query($conn, $sql);
			$data = mysqli_fetch_assoc($result);
				if (password_verify($password, $data['password'])) {
					$_SESSION['userid'] = $data['username'];	
					header("Location: ../ClientProfile/index.php");
				} else {
					header("Location: ../login/index.php?error=1");
				}
		} else {
			echo "Please fill in the data";
		}
        
    }
?>