<!DOCTYPE html>
<html >
  <head>
    <meta charset="utf-8" />
    <title>Fiberspark | About Us</title>
    <meta name="description" content="Fiberspark: A better kind of Internet.">
    <meta name="keywords" content="Fiberspark, fiberoptic cables, Ithaca, NY">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <link href='http://fonts.googleapis.com/css?family=Lato:300,400,700,900' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
    
    <link href="css/main.css" rel="stylesheet" />
    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="http://code.jquery.com/jquery-latest.min.js"></script>
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

  <script>
  $(document).ready(function(){
    $(".menu_icon").click(function(){
      $(".nav_links .m").slideToggle(200);
    });
  });
  </script>

    <?php require ("inc/navbar.html");?>
    <div class="main">

      
       <!-- ABOUT SECTION -->
      <div class="section"></a>
        <div class="s_width">
          <br>
          <div class="image_wrap"><img src="img/flat200.png"></div>
          <h1>About Us</h1>
          <p>Fiberspark is an Internet service provider that offers the fastest and most reliable broadband Internet in Ithaca. Fiberspark’s fiber optic Internet allows you to seamlessly experience web browsing, HD video streaming, and online gaming without worrying about your connection slowing down, even in the evenings when everyone is online.</p>

          <p>The Internet access industry in the United States has been increasingly consolidating as DSL internet has failed to keep up, leaving the cable monopoly as the only option for high speed internet for the majority of Americans. The proposed merger announced in February 2014 between Time Warner Cable and Comcast has highlighted this threat and renewed calls for more competition among Internet service providers to curb ever rising prices promote network upgrades for better service. These cable giants often provide slower speeds than what you actually pay for, can’t be bothered to offer decent customer service, and abuse their position as gatekeepers between you and online content to degrade services like Netflix that compete with their cable TV business.</p>

        </div>
      </div>


      <div class="section g"></a>
        <div class="s_width">
          <h1>Pricing</h1>
          <p></p>
            <br>
        </div>
      </div>

      <div class="section"></a>
        <div class="s_width">
          <h1>Zones</h1>
          <p>Based on our network design, we have created different zones throughout Collegetown. Before we begin construction we need to first measure demand for Fiberspark’s service. If you live in Collegetown your address is part of a zone which you will see when you sign up at the link below. Once each zone has reached a critical mass of supporters we will build our infrastructure to you. You can also keep track of your zone’s progress and compare it to other zones over the next few weeks. </p>
        </div>
      </div>

      <div class="section g" id="start"><a class="anchor" name="start_anchor"></a>
        <div class="s_width">
          <h1>Get Started Now</h1>
          <br>
          <div class="c_width">
            <a href="#" class="bigbutton">Sign Up</a>
            <div class="sub"><a href="index.php">Back to home page</a></div>
            <br><br>
          </div>
        </div>
      </div>
    </div>

  </div>
    </div>
  </body>
  <?php include 'inc/footer.html' ?>
</html>
