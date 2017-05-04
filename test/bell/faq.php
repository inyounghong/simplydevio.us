<!DOCTYPE html>
  <head>
    <meta charset="utf-8" />
    <title>BelleApps | FAQ</title>
    <meta name="description" content="BelleApps: ">
    <meta name="keywords" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>

    <link href="css/style2.css" rel="stylesheet" />
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/nav.css" rel="stylesheet" />
    <link href="css/style1.css" rel="stylesheet" />
    <script src="https://code.jquery.com/jquery.js"></script>
    <script src="js/bootstrap.js"></script>
     
  </head>
  <body>
    <script>
      $(function() {
        $('a[href*=#]:not([href=#])').click(function() {
          if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
            var target = $(this.hash);
            target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
            if (target.length) {
              $('html,body').animate({
                scrollTop: target.offset().top
              }, 500);
              return false;
            }
          }
        });
      });
    </script>
    <?php include ("includes/nav.html");?>
    
    <div class="section" id="FAQ">
      <div>
         
        <div class="container">
          <div class="row">
            <div class="col-sm-4 col-xs-12 sidebar">
              <h4><a href="#popular">Popular Questions</a></h4>
              <p><a href="#popular1">What is Belle Apps?</a></p>
              <p><a href="#popular2">What stores are supported?</a></p>
              <p><a href="#popular3">Do you serve my area?</a></p>
              <h4><a href="#about">About Belle Apps</a></h4>
              <p><a href="#about1">How fast do you deliver?</a></p>
              <p><a href="#about2">How much does delivery cost?</a></p>
              <p><a href="#about3">What are your hours?</a></p>
              <p><a href="#about4">What food can Belle deliver?</a></p>
              <p><a href="#about5">What is Belle Premium?</a></p>
              <h4><a href="#prices">Inventory and Prices</a></h4>
              <p><a href="#prices1">What happens when something is out of stock?</a></p>
              <p><a href="#prices2">Are your prices different from the stores?</a></p>
              <p><a href="#prices3">Can I have alcohol and drugs delivered?</a></p>
              <p><a href="#prices4">Do you honor in-store sales or coupons?</a></p>
              <h4><a href="#order">About my Order</a></h4>
              <p><a href="#order1">How do I check on the status of my order?</a></p>
              <p><a href="#order2">How do I make a change to my order?</a></p>
              <p><a href="#order3">What is your cancellation policy?</a></p>
              <p><a href="#order4">What if I have to reschedule or cancel my order after it's already on the way?</a></p>
              <p><a href="#order5">How do I report a problem with my order?</a></p>
              <h4><a href="#shoppers">Personal Shoppers</a></h4>
              <p><a href="#shoppers1">Who makes the deliveries?</a></p>
              <p><a href="#shoppers2">What if I need to contact my deliverer?</a></p>
              <p><a href="#shoppers3">Should I tip my deliverer?</a></p>
              <p><a href="#shoppers4">Can I be a deliverer?</a></p>
              <p><a href="#more">Further Questions</a></p>
            </div>
        
            <div class="col-sm-8 col-xs-12">
              <h1 class="text-center">FAQ</h1>
          
              <a class="anchor p" name="popular"></a>
              <h2>Popular Questions</h2> 

              <a class="anchor" name="popular1"></a>
              <h3>What is Belle Apps?</h3>
              <p>Belle Apps is an affordable peer-to-peer food delivery service that anybody can easily use. We match you with shoppers in your area to get you food from your favorite store or restaurant.</p>
              <hr>
              <a class="anchor" name="popular2"></a>
              <h3>What stores are supported?</h3>
              <p>We support any store near you! Your deliverer can shop from a store of your choice or any store near them. </p>
              <hr>
              <a class="anchor" name="popular3"></a>
              <h3>Do you serve my area?</h3>  
              <p>Our app is currently open to the Cornell community but we will expand our services to more areas in the future. We're expandng quickly, so follow us on Facebook and Twitter for updates!</p>
              <br>
              <hr>
              <a class="anchor" name="about"></a>
              <h2>About Belle Apps</h2>
              
              <a class="anchor" name="about1"></a>
              <h3>How fast do you deliver?</h3>
              <p>Fast! If you need your order to be delivered at a specific day or time, we can match deliverers to accommodate that.</p>
              <hr>  
              <a class="anchor" name="about2"></a>
              <h3>How much does delivery cost?</h3>
              <p> Our delivery fees range from $2.99 to $9.99 depending on the size of the order.</p>
              <hr>  
              <a class="anchor" name="about3"></a>
              <h3>What are your hours?</h3>
              <p> We operate 24/7! Hungry for a midnight snack? Just make a request our app, and someone from your area will deliver to you.</p>
              <hr>  
              <a class="anchor" name="about4"></a>
              <h3>What food can Belle deliver?</h3>
              <p> We can deliver any take-out orders or groceries of your choice. Just put a request through the app with order instructions. </p>
              <hr>  
              <a class="anchor" name="about5"></a>
              <h3> What is Belle Premium? </h3>
              <p>Coming soon!  Follow us on Facebook and Twitter for updates!</p>
              <br>
              <hr>
              <a class="anchor" name="prices"></a>
              <h2>Inventory and Prices</h2>
            
              <a class="anchor" name="prices1"></a>
              <h3>What happens when something is out of stock?</h3>
              <p>If something is out of stock, your deliverer can either text or call you using the app.</p>
              <hr>
              <a class="anchor" name="prices2"></a>
              <h3>Are your prices different from the stores?</h3>
              <p>No. We do not markup our prices, have minimum purchase, or annual membership fees!</p>
              <hr> 
              <a class="anchor" name="prices3"></a>
              <h3>Can I have alcohol and drugs delivered?</h3>
              <p> Belle Apps only delivers food items and take-out orders.</p>
              <hr>
              <a class="anchor" name="prices4"></a>
              <h3> Do you honor in-store sales or coupons?</h3>
              <p>We do honor in-store sales, but we are not able to accept coupons at the moment.</p>
              <br>
              <hr>  
              <a class="anchor" name="order"></a>
              <h2>About My Order</h2>
              
              <a class="anchor" name="order1"></a>
              <h3>How do I check on the status of my order?</h3>
              <p>You will be notified when your order is being fulfilled.</p>
              <hr>
              <a class="anchor" name="order2"></a>
              <h3>How do I make a change to my order?</h3>
              <p>Any changes can be made through in-app texting and calling to your deliverer.</p>
              <hr>
              <a class="anchor" name="order3"></a>
              <h3>What is your cancellation policy?</h3> 
              <p>You can cancel your delivery for a full refund up until we pair a shopper to you.</p>
              <hr> 
              <a class="anchor" name="order4"></a>
              <h3>What if I have to reschedule or cancel my order after it's already on the way? </h3>
              <p>If you must cancel your order after a shopper has accepted it, you will be charged a $10 fee and have to reimburse the shopper for any purchases.</p>
              <hr>  
              <a class="anchor" name="order5"></a>
              <h3> How do I report a problem with my order?</h3>
              <p> If you need to report a problem with your order, you can contact your deliverer with the in-app texting or calling.</p>
              <br>
              <hr>  
              <a class="anchor" name="shoppers"></a>
              <h2>Personal Shoppers</h2>
              
              <a class="anchor" name="shoppers1"></a>
              <h3>Who makes the deliveries?</h3>
              <p>Anybody can be a deliverer. Taking a stroll through Collegetown or driving off Campus? Pick a few things up for a friend and earn extra pocket money.</p> 
              <hr> 
              <a class="anchor" name="shoppers2"></a>
              <h3>What if I need to contact my deliverer?</h3>
              <p>You can always contact your deliverer through the in-app texting and calling options.</p>
              <hr>  
              <a class="anchor" name="shoppers3"></a>
              <h3>Should I tip my deliverer?</h3>
              <p>Always feel free to tip your deliverer for their awesome performance, but tip is not required or expected. </p>
              <hr>     
              <a class="anchor" name="shoppers4"></a>
              <h3> Can I be a deliverer?</h3>
              <p>Absolutely!  All you need to do is to download the app and accept a request.  We are always thrilled to have outgoing and friendly members join our team.</p>
              <br>
              <hr>
              <a class="anchor" name="more"></a>
              <h2>You did not answer all my questions! </h2>
              <p>If you have any further questions, please email us at <a href="mailto:ava9@cornell.edu">ava9@cornell.edu</a>.</p>
              <br><br>
              <h2>To see our job openings, <a href="jobs.php">click here</a>.</h2>
              <hr>
              <br><br><br><br>
            </div>
          </div>
        </div>
    
      </div>
    </div>

    <div class="section" id="contact">

      <?php include 'includes/footer.html' ?>
    </div>


    
  </body>
</html>