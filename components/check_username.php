<?php
require_once("../classes/DB.php");


if (!empty($_POST['username'])) {
  $username = $_POST['username'];
  $query = "SELECT * FROM clients WHERE username='$username'";
  $result = mysqli_query($conn, $query);

  $user_count = mysqli_num_rows($result);
  if ($user_count > 0) {
    echo "<span class='status-not-available'> Username Not Available.</span>";
  } else {
    echo "<span class='status-available'> Username Available.</span>";
  }
}
