<?php session_start(); 

$message = "";
// If already logged in
if (!empty($_SESSION['logged_user_by_sql'])){
  $olduser = $_SESSION['logged_user_by_sql'];
  unset($_SESSION['logged_user_by_sql']);
  $message = "You've logged out!";
}

$olduser = false;
?>
<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Login</title>
    <link rel="stylesheet" href="css/style.css">
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
    <link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Ubuntu:300,400,500,700' rel='stylesheet' type='text/css'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  </head>
  <body>
    <div class="header">
      <?php include 'includes/nav.php' ?>
    </div>
    <div class="container lg">
      <h1>Login</h1>
    </div>
    <div class="container lg g">
      <div class="container c">
        <?php echo $message; ?>

      <?php 
      $post_username = filter_input( INPUT_POST, 'username', FILTER_SANITIZE_STRING );
      $post_password = filter_input( INPUT_POST, 'password', FILTER_SANITIZE_STRING );

    // If not attempted to log in
      if ( empty( $post_username ) || empty( $post_password ) ) {
      ?>
      <form class="login" action="login.php" method="post">
        <h2>Login</h2>
        <input type="text" name="username" placeholder="Username" autocomplete="off" value="admin"> 
        <input type="password" name="password" placeholder="Password" autocomplete="off" value="pass"> 
        <input type="submit" value="Submit">
      </form>
      
      <?php

      } 
      else {
        // Set up mysql
        require_once 'includes/config.php';
        $mysqli = new mysqli( DB_HOST, DB_USER, DB_PASSWORD, DB_NAME );

        //hash the entered password for comparison with the db
        $hashed_password = hash("sha256",$post_password . 'xkej');
        //echo "<p>Hashed password: $hashed_password</p>";
        
        //Check for a record that matches the POSTed credentials
        $query = "SELECT * 
              FROM Users
              WHERE
                username = '$post_username'
                AND password = '$hashed_password'";
        $result = $mysqli->query($query);

        // If there is a matching user, welcome
        if ( $result && $result->num_rows == 1) {
          $row = $result->fetch_assoc();
          $db_username = $row['username'];
          $_SESSION['logged_user_by_sql'] = $db_username;
          redirect('index.php');
        } 
        else {
          echo '<p>' . $mysqli->error . '</p>';
          ?>
          <p>You did not login successfully.</p>
          <p>Please <a href="login.php">login</a> again.</p>
          <?php
          }
          $mysqli->close();
        }

        function redirect($url)
        {
            $string = '<script type="text/javascript">';
            $string .= 'window.location = "' . $url . '"';
            $string .= '</script>';

            echo $string;
        }
        
      ?>
      </div>
    </div>
  </body>
</html>