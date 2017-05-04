<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Contact</title>

    <link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Ubuntu:300,400,500,700' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Playfair+Display:400,700,400italic,700italic' rel='stylesheet' type='text/css'>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/index.css">

    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
    
  </head>
  <body id="body">
    <?php include 'includes/nav.php' ?>

    <?php
      // Email settings
      $email_to = "inyoung_hong@yahoo.com";

      // Preset to empty string
      $name = "";
      $email = "";
      $message = "";
      $topic = "";
      $subscribe = "";
      $header_message = "";
      $name_error = "";
      $email_error = "";
      $message_error = "";
      $topic_error = "";
      
      // If the form is submitted
      if (isset($_POST['submit']))
      {
        $name = htmlspecialchars($_POST['name']);
        $email = htmlspecialchars($_POST['email']);
        $message = htmlspecialchars($_POST['message']);
        $topic = $_POST['topic'];
        $subscribe = subscriptionStatus();

        // Name validation
        ifEmptyError($name, 'Please enter a name.');
        if(preg_match("/^[a-zA-Z .'-]+$/", $name) == False)
        {
          $name_error = "Please enter a valid name.";
        }
        // Email validation
        if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)){
          $email_error = "Please enter a valid email address.";
        }
        // Message validation
        ifEmptyError($name, 'Please enter a message.');
        if (isset($message) && (strlen($message) < 10)){
          $message_error ="Your message must be at least ten characters long.";
        }
        if (isset($message) && (strlen($message) > 400)){
          $message_error ="Message is over maximum length.";
        }
        // Topic validation
        if ($topic == 'sub'){
          $topic_error = "Please select the topic of your message.";
        }
        // If all inputs are validated: 
        if (empty($name_error) && empty($email_error) && empty($message_error) && empty($topic_error))
        {
          $email_message = $name . " at " . $email . " has sent the following message: \r\n" . $message. "\n\n Subscription? " . $subscribe;
          mail($email_to,$topic,$email_message);
          $header_message = "Your message has been successfully sent! <br>"; 
          $name = '';
          $email = '';
          $message = '';
          $topic = '';
          $subscribe = '';
        }
      }

      /** 
      * Returns 'Yes' if the user checks to subscribe, otherwise returns 'No' 
      */
      function subscriptionStatus(){
        if (isset($_POST['subscribe'])){
          return 'Yes';
        }
        else{
          return 'No';
        }
      }

      /** 
      * Sets the error message for an input if it is empty when the user submits form
      */
      function ifEmptyError($input, $error_message){
        if (empty($input)){
          $input_error = $error_message;
        }
      }

    ?>
    
    <div class="container">
      <!-- Side -->
      <div class="side">
        <div class="title green">
          <h1>Contact</h1>
        </div>
      </div>
      <!-- Start main content -->
      <div class="content">
        <h2>Contact</h2>
        <p>Shoot me an email:</p>
        <!-- Start Form -->
        <form method="POST" action="contact.php" class="contact_form">
          <?php echo $header_message ?>
          
          <?php echo $name_error ?>
          <input type="text" name="name" placeholder="Name" value="<?php echo $name; ?>" required>
    
          <?php echo $email_error ?>
          <input type="email" name="email" placeholder="Email" value="<?php echo $email; ?>" required>
          
          <?php echo $topic_error ?>
          <select name="topic">
            <option value="sub"<?php if($topic=='sub') echo 'selected'; ?>>Message Topic</option>
            <option value="projects" <?php if($topic=='projects') echo 'selected'; ?>>Projects</option>
            <option value="artwork" <?php if($topic=='artwork') echo 'selected'; ?>>Artwork</option>
            <option value="other" <?php if($topic=='other') echo 'selected'; ?>>Other</option>
          </select>
          
          <?php echo $message_error ?>
          <textarea name="message" placeholder="Message" required><?php echo $message ?></textarea>
          
          <label><input type="checkbox" name="subscribe" value="yes" <?php if($subscribe=='Yes') echo 'checked'; ?>>I would like to subscribe to news and updates.</label><br>
          
          <input type="submit" name="submit" value="Submit" class="submit_button">
        </form>
        <!-- End Form -->
      </div>
    </div>
    <!-- End Main content -->
    <script type="text/javascript" src="js/nav.js"></script>
  </body>
</html>