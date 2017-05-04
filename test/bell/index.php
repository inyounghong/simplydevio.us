<!DOCTYPE html>
<!-- jQuery for navigation bar modified from: http://jsfiddle.net/tcloninger/e5qaD/ -->
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>BelleApps</title>
    <meta name="description" content="BelleApps: ">
    <meta name="keywords" content="">
    <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style1.css" rel="stylesheet" />
    
    <script src="https://code.jquery.com/jquery.js"></script>
    <script src="js/nav.js"></script>
    <script src="js/canvas807.js"></script>
    <script src="js/icons.js"></script>
  </head>
  <body style="background-color:black" >
    <!-- Smooth Scrolling: http://css-tricks.com/snippets/jquery/smooth-scrolling/ -->
    <script>
      $(function() {
        $('a[href*=#]:not([href=#])').click(function() {
          if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
            var target = $(this.hash);
            target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
            if (target.length) {
              $('html,body').animate({
                scrollTop: target.offset().top
              }, 700);
              return false;
            }
          }
        });
      });
    </script>

    <script>
      $(document).ready(function(){
        $("#menu_icon").click(function(){
          $(".link").slideToggle(200);
        });
        document.getElementById("menu_icon").innerHTML = '<img src="images/menu.png">';
      });


  </script>

  

  <!-- Nav bar -->
  <?php include ('includes/nav.html'); ?>


    <div class="fixed">
      <div class="header_image">
        <div id="app_button">
          <a href="#" id="ios"><img src="images/app_store_big.png" alt="App Store"></a>
          <a href="#" id="android"><img src="images/android_big.png" alt="Android Store" width="190"></a>
        </div>
        <div class="blurb">
          <p>Peer-to-peer delivery<br> for everyday shoppers</p>
        </div>
        <div class="arrow"><a href="#value"><img src="images/arrow_small.png"></a></div>
      </div>
      
    </div>

    <script>
      var isMobile = {
          Android: function() {
              return navigator.userAgent.match(/Android/i);
          },
          BlackBerry: function() {
              return navigator.userAgent.match(/BlackBerry/i);
          },
          iOS: function() {
              return navigator.userAgent.match(/iPhone|iPad|iPod/i);
          },
          Opera: function() {
              return navigator.userAgent.match(/Opera Mini/i);
          },
          Windows: function() {
              return navigator.userAgent.match(/IEMobile/i);
          },
          any: function() {
              return (isMobile.Android() || isMobile.BlackBerry() || isMobile.iOS() || isMobile.Opera() || isMobile.Windows());
          }

      };
      if ( isMobile.Android() ) {
        document.getElementById("ios").style.display = "none";
      }
      else if(isMobile.iOS())
      {
        document.getElementById("android").style.display = "none";
      }



    </script>

    
    <!-- Page scrolling up -->
    <div class="cover">

      <!-- Value Propositions -->
      <span id="how_anchor"></span>
      <div class="section" id="value"> 
        <div class="container">
          <div class="col-md-4"><b><h2>YOUR LIST GUARANTEED</h1></b> Our deliverers are required to get you every item in order to make money. Pick the exact brand or go for the cheapest option. Compare delivery requests based on location and store. Be in touch with your deliverer for special request via the in-app text. </div>
          <div class="col-md-4"><b><h2>NO EXTRA FEES</h1></b> No membership fees or price markup on your purchases. You only pay a small delivery fee from $3 - $10 relative to order size. Save on gas and reduce your environmental impact by cutting down on the number of cars on the road.</div>
          <div class="col-md-4"><b><h2>MAKE CASH</h1></b>As a deliverer, you make extra cash for helping out a friend or neighbor. Get paid for your normal routine as you go to your local grocery store or favorite take out restaurant. Option to donate the delivery fee to your favorite charity.</div>
        </div>
        
      </div>
      <!-- End Value props -->

      <!-- How This Works -->    
      <div id="works" class="section">
        <br><br> 
        <h1 class="white">How it works</h1>
        <h1 style="color:white;font-size: 30px;">&#9660;</h1>
        
      </div>
      <!-- End How This Works -->

      

      
      <div class="section y" id="diagram">
        <br><br>
      <canvas id="map">
      </canvas>
        
        <div class="wrap ab">
          <div class="icon_wrap">
            
            <div class="icon_image" id="studying"><img src="icons/icon_studying.png" alt="studying"></div>
            <div class="icon_image" id="shopping"><img src="icons/icon_shopping.png" alt="shopping"></div>
            <div class="icon_image faders" id="faded"><h2 style="font-size: 64px;">Belle</h2></div>
            <div class="icon_image" id="list"><img src="icons/icon_list.png" alt="list"></div>
            <div class="icon_image" id="earn"><img src="icons/icon_earn.png" alt="earn"></div>
            <div class="icon_image" id="food"><img src="icons/icon_food.png" alt="food" width="240" height="240"></div>
            <div class="icon_image" id="miles"><img src="icons/icon_miles.png" alt="miles"></div>
            <div class="icon_image" id="money"><img src="icons/icon_money.png" alt="money" width="240" height="240"></div>
            <div class="icon_image" id="receipt"><img src="icons/icon_receipt.png" alt="receipt" width="160" height="160"></div>
            <div class="icon_image" id="route"><img src="icons/icon_route.png" alt="route"></div>
            <div class="icon_image" id="circle"><img src="icons/icon_circle.png" alt="circle" width="160" height="160"></div>
            <div class="icon_image" id="confirm"><h2 style="color:#0a192c; font-size: 30px;">Confirm <br />the bill</h2></div>
            <div class="icon_image" id="logo"><img src="icons/logo.png" alt="Belle Apps Logo" width="400" height="400"></div>
            </div>
        </div>

      </div>

      <!-- This part is hidden on desktop and shown on 700px width -->
      <!-- Mobile version of the HOW THIS WORKS -->
      <div class="mobile_wrap">
         <div class="section y" id="mobile_diagram">
            
            <div class="order">
              <img src="icons/icon_studying.png">
              <div class="label o">You're hungry</div>
            </div>
            <div class="shopper">
              <img src="icons/icon_shopping.png" >
              <div class="label b">You're shopping</div>
            </div>

            <div class="clear"></div>

            <div class="order">
              <img src="icons/icon_list.png">
              <div class="label o">Place a request</div>
            </div>
            <div class="shopper">
              <img src="icons/icon_earn.png">
            <div class="label b">Find a request</div>
            </div>
            <div class="clear"></div>

            <div class="order">
              <img src="icons/icon_miles.png">
              <div class="label o">See your deliverer</div>
            </div>
            <div class="shopper">
              <img src="icons/icon_route.png">
              <div class="label b">Accept delivery</div>
            </div>

            <div class="clear"></div>

            <div class="shopper">
            <img src="icons/icon_receipt.png">
            <div class="circle">Confirm your bill</div>
            </div><br>
            
            <div class="order">
              <img src="icons/icon_food.png">
              <div class="label o">You're happy</div>
            </div>
            <div class="shopper">
              <img src="icons/icon_money.png"><br>
              <div class="label b">You're happy</div>
            </div>
            <div class="clear"></div>
          </div>
        </div>

      <!-- ABOUT US + DONATION SECTIONS -->
      <span id="about_anchor"></span>
      <div class="section b" id="about">
        <div class="container">
          <div class="col-sm-6">
            <h1>About Us</h1>
            
            <p><strong>Belle Apps</strong> is a peer-to-peer food delivery service where app users can customize their orders and receive deliveries to their dorm rooms. Using our automated matching algorithm based on user preferences - location, time of delivery, size of order - users requesting an order (requesters) will be matched with app users who are already en route to a store or who are currently shopping there (deliverers). With the automated pairing system, both the user requesting the order and user purchasing the order can make the most out of their time.</p>
            <br>

            <b>Co-Founders: </b>

            <br> <br> 
            <b> Aditya Agashe </b> <br>
            Student at Cornell College of Engineering, Class of 2017
            <br>
            <br>
            <b>Michelle Jang</b>
            <br>
            Student at Cornell College of Industrial and Labor Relations, Class of 2017
            <br>
            <br>
          </div>
          <div class="col-sm-6">
            <h1>Donate To...</h1>
            As a deliverer, you may choose to donate the service fee to one of the following organizations.
            <br><br>
            <div class="donate_images">
              <a href="http://www.crcfl.net/">
                <img src="images/cancer_resource_center1.png" alt="crc" class="image">
              </a>
              <a href="http://www.cayugamed.org/">
                <img src="images/cayuga_med_center1.png" alt="cmc" class="image">
              </a> 
              <a href="http://www.spcaonline.com/">
                <img src="images/spca1.png" alt="spca" class="image">
              </a> 
              <a href="http://www.plannedparenthood.org/">
                <img src="images/planned_parenthood1.png" alt="planned_parenthood" class="image">
              </a> 
              <a href="http://tcpl.org/">
                <img src="images/library1.png" alt="library" class="image">
              </a> 
              <a href="http://www.stjude.org/stjude/v/index.jsp?vgnextoid=7b22b46b476a7410VgnVCM100000290115acRCRD">
                <img src="images/st_jude1.png" alt="Saint Jude's Children Hospital" class="image">
              </a> 
            </div>
          </div>
        </div>
      </div>

      <?php

      $email_to = "ava9@cornell.edu";
      $email_subject = "BelleApps Inquiry";

      $name = "";
      $email = "";
      $message = "";
      $header_message = "";
      $tel = "";

      $name_error = "";
      $email_error = "";
      $message_error = "";
      $tel_error = "";

      if (isset($_POST['submit']))
      {
        $name = htmlspecialchars($_POST['name']);
        $email = htmlspecialchars($_POST['email']);
        $message = htmlspecialchars($_POST['message']);
        $tel = htmlspecialchars($_POST['tel']);


        if (empty($name)){
          $name_error = "<div class='error'>Please enter your name.</div>";
        }
        else if(preg_match("/^[a-zA-Z .'-]+$/", $name) == False)
        {
          $name_error = "<div class='error'>Please enter a valid name.</div>";
        }

        #$emailmatch = "/[A-z0-9]+@[A-z]+\.[A-z]$/";
        # || !preg_match($emailmatch, $email)
        
        if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)){
          $email_error = "<div class='error'>Please enter a valid email address.</div>";
        }
            
        if (empty($tel) || !(ctype_digit ($tel)) || !(strlen($tel) == 10)){
            $tel_error = "<div class='error'>Using only numbers, please enter a valid ten-digit telephone number.</div>";
            }
        
        if (empty($message)){
          $message_error = "<div class='error'>Please enter a message.</div>";
        }
        
        if (isset($message) && (strlen($message) > 400)){
          $message_error ="<div class='error'>Message is over maximum length.</div>";
        }
        
        if (isset($message) && (strlen($message) < 10)){
          $message_error ="<div class='error'>Message must be at least ten characters long.</div>";
        }

         
        if (empty($name_error) && empty($email_error) && empty($message_error) && empty($tel_error))
        {
          $email_message = $name . " has sent the following message: \r\n" . $message;
          mail($email_to,$email_subject,$email_message);
          $header_message = "<div class='error'> Thank you for contacting us. We will be in touch with your very soon. </div> <br>"; 
          $name = '';
          $email = '';
          $message = '';
          $tel = '';
        }
      
      else
      {
        
      }
  }


      ?>
      <!-- Start footer -->
      <span id="contact_anchor"></span>
      <div class="section" id="contact">

        <div class="container">

          <!-- Left Side of Footer -->
          <div class="col-sm-6 index_footer">
            <h3>Contact Us</h3>
            <p>Aditya Agashe</p>
            <p>(518) 894-9898</p>
            <p><a href="mailto:info@belleapps.me">ava9@cornell.edu</a></p>
            <br>
            <p>&copy;2014 Belle Applications</p>
            
            <div class="social">
              <a href=""><img src="images/facebook.png" width="35" alt="fb"></a>
              <a href=""><img src="images/twitter.png" width="35" alt="twitter"></a>
            </div>
            <div class="footer_links">
              <a href="index.php#about_anchor">About Us</a> | 
              <a href="faq.php">FAQ</a> |
              <a href="jobs.php">Jobs</a>
            </div>
          </div>

          <!-- Right side of footer -->
          <div class="col-sm-6">
            <form class="form" action="index.php#contact" method="POST">
              <?php echo $header_message ?>
              
              <input name="name" id="name" type="text" required placeholder="Name" value="<?php echo $name ?>"><?php echo $name_error ?><br>
              <input name="email" id="email" type="email" required placeholder="Email" value="<?php echo $email ?>"><?php echo $email_error ?><br>
              <input name="tel" id="tel" placeholder="Telephone" required value="<?php echo $tel ?>" ><?php echo $tel_error?><br>
              <textarea name="message" id="message" required placeholder="Message"><?php echo $message ?></textarea>
              
              <?php echo $message_error ?><br>
              <button class="submit" name="submit" type="submit" value="submit">Send</button>
            </form>
          </div>
      </div>
      <!-- End Footer -->
    </div>

    
  <script src="canvas807.js"></script>
  <script src="icons.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  </body>
</html>