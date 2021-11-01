<?php
require_once("../classes/DB.php");


if(!empty($_POST["username"])) {
  $query = "SELECT * FROM clients WHERE username='" . $_POST["username"] . "'";
  $result = mysqli_query($conn, $sql);

  $user_count = mysqli_num_rows($result);
  if($user_count>0) {
      echo "<span class='status-not-available'> Username Not Available.</span>";
  }else{
      echo "<span class='status-available'> Username Available.</span>";
  }
}
