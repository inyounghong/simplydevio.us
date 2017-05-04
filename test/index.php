<!DOCTYPE html>
<html >
  <head>
    <meta charset="utf-8" />
    <title>Fiberspark | Home</title>
    <meta name="description" content="Fiberspark: A better kind of Internet.">
    <meta name="keywords" content="Fiberspark, fiberoptic cables, Ithaca, NY">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <link href='http://fonts.googleapis.com/css?family=Lato:300,400,700,900' rel='stylesheet' type='text/css'>
    <link href="css/uikit.min.css" rel="stylesheet" />
    <link href="css/main.css" rel="stylesheet" />
    <script src="https://code.jquery.com/jquery.js"></script>


  </head>

  <script>
  $(function() {
    $('a[href*=#]:not([href=#])').click(function() {
      if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
        var target = $(this.hash);
        target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
        if (target.length) {
          $('html,body').animate({
            scrollTop: target.offset().top
          }, 900);
          return false;
        }
      }
    });
  });
  </script>

    <?php require ("inc/navbar.html");?>
    <div class="main">

      <!-- MAIN HEADER IMAGE SECTION -->
      <div class="section header_image">
        <div class="width">
          <div class="overlay">
            <div class="large">A better kind of Internet.</div>
            <div class="small">
              Fast downloads, responsive customer service, and no hidden fees.
            </div>
            <a href="#about_anchor" class="button">Learn More ></a>
            <a href="#contact_anchor" class="button">Sign Up ></a>
          </div>
          <div class="arrow"></div>
          <!--<div class="button_wrap">
            <a href="" class="button">Learn More</a>
            <a href="" class="button">Sign Up</a>
          </div>-->
        </div>
      </div>
      
       <!-- ABOUT SECTION -->
      <div class="section" id="about"><a class="anchor" name="about_anchor"></a>
        <div class="s_width">
          <h1>About Us</h1>
          <p>Fiberspark's mission is to provide a better alternative than the cable monopoly for Internet service. We strive to provide connectivity that doesn't slow down or cut out. Our top priority is a reliable Internet connection that you can always depend on. If a customer has an issue of any kind, we guarantee immediate assistance from someone right here in Ithaca who can resolve the problem.</p>

          <p>Fiberspark means fast downloads and uploads which enables all sorts of useful applications like HD video streaming and cloud storage. We believe that it should be just as easy to create on the Internet as it is to consume. This is made possible by our use of fiber optics, the best technology available for delivering Internet access.</p>
        </div>
      </div>




      <!-- FORM/CONTACT US SECTION -->
      <div class="section" id="contact"><a class="anchor" name="contact_anchor"></a>
        <div class="s_width">

      <?php
      if (isset($_POST['inputEmail']) && strlen($_POST['inputEmail'])>2)
        {
        if(isset($_POST['inputName']) && isset($_POST['inputEmail']) && isset($_POST['inputPhone']) && isset($_POST['inputCompany'])
        && isset($_POST['inputProperties']) && isset($_POST['inputSource']) && isset($_POST['inputMessage'])){
          $name = $_POST['inputName'] ;
          $email = $_POST['inputEmail'] ;
          $phone = $_POST['inputPhone'] ;
          $company = $_POST['inputCompany'] ;
          $properties = $_POST['inputProperties'] ;
          $source = $_POST['inputSource'] ;
          $message = $_POST['inputMessage'] ;
          if (isset($_POST['toSelf']))  $self = $_POST['toSelf']; //value "true"
          else $self= "false";
        }
          $emailBody = "Fiberspark Get Started Inquiry. <br>
            Name: ".$name." <br>
            Email: ".$email." <br>
            Phone: ".$phone." <br>
            Company: ".$company." <br>
            Properties: ".$properties." <br>
            How user heard of Fiberspark: ".$source." <br>
            User message, inquiry: ".$message." <br>";
        $headers = "From: webform@fiberspark.com \n";
        // check if send copy to self is checked
        if ($self == "true") {
          $headers .= "CC: " . $email . " \n";
        }

        $headers .= "MIME-Version: 1.0\n";
        $headers .= "Content-Type: text/html; charset=ISO-8859-1 \n";
        mail("lilyc5459@gmail.com", "FiberSpark Get Started Inquiry", $emailBody, $headers);
        
        ?>
        
        <div class="container-fluid">
          <div class="col-md-8 col-md-offset-2" id="sentConfirm">
          <div class="alert alert-success">
            <p class="bio">Email sent!</p>
          </div>
          </div>

        </div>
        
        <?php
        }
      else
        {
        ?>
        <div class="container-fluid">

          <h1>Contact Us</h1>
          <h2>Collegetown Residents</h2>
          <p>Your landlord won't agree to have Fiberspark Internet unless they know that  you want it. Call them now, or fill out the form at <a href="https://fiberspark.typeform.com/to/Wh6HOD">this link</a> to show your demand.
          </p>

          <h2>Landlords</h2>
          <p>If you are a Collegetown landlord who wants to learn more about Fiberspark, please fill in the form below and we will be in touch in the next few days:</p>
          


        </div>

        <form action="start.php" id="toMail" class="uk-form uk-form-horizontal" method="post" name="toMail">


          <input type="text" id="form-to" placeholder="inquiry@fiberspark.com" disabled style="display:none;">
          <input type="text" id="inputName" name="inputName" placeholder="Full Name" required type="text">
          <input type="text" id="inputEmail" name="inputEmail" placeholder="Email Address" required type="email">
          <input type="text" id="inputPhone" name="inputPhone" placeholder="Phone Number (10 digits)" required type="tel" pattern="\(?([0-9]{3})\)?([ .-]?)([0-9]{3})\2([0-9]{4})">
          <input type="text" id="inputCompany" name="inputCompany" placeholder="Company Name" required type="text">
          <input type="text" id="inputProperties" name="inputProperties" placeholder="Number of properties in Collegetown" required type="number">

          <select id="inputSource" name="inputSource" required>
            <option selected disabled="disabled">How did you hear about us?</option>
            <option value="WordOfMouth">Word-of-Mouth</option>
            <option value="Advertisement">Advertisement</option>
            <option value="SocialMedia_Internet">Social Media/Internet</option>
            <option value="Other">Other</option>
          </select>

          <textarea id="inputMessage" name="inputMessage" cols="50" rows="7" placeholder="Enter message"></textarea>
          
          <input type="checkbox" id="toSelf" name="toSelf"> <label for="toSelf">Send copy to self (cc)</label><br>


          <button class="submit" name="submit" type="submit" value="submit">Send ></button>

        </form>
      </div>
        <?php  
        }
        ?>
      </div>
    </div>

  </div>
    </div>
  </body>
</html>
