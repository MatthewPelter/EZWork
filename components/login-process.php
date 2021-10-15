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
			$db_handle = new DBController();
			
			$email = securityscan($_POST['email']);
			$password = securityscan($_POST['password']);
			
			$sql = "SELECT * FROM client WHERE email='$email' LIMIT 1";
			$result = $db_handle->runQuery($sql);

				if (password_verify($password, $result['password'])) {
					$_SESSION['userid'] = $result['username'];	
					header("Location: ../ClientProfile/index.php");
				} else {
					header("Location: ../login/index.php?error=1");
				}
		} else {
			echo "Please fill in the data";
		}
        
    }
?>