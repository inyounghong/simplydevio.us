<!doctype html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="description" content="SRI: The System of Rice Intensification">
    <meta name="keywords" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="./images/icon.png" sizes="128x128">

    <title>The System of Rice Intensification</title>

    <!-- Stylesheets -->
    <link rel="stylesheet" type="text/css" href="./css/bootstrap.css" media="screen">
    <link rel="stylesheet" type="text/css" href="./css/unslider.css" media="screen">
    <link rel="stylesheet" type="text/css" href="./css/styles2.css" media="screen">

    <!-- No background for nav bar on front page -->
    <style>
    	.nav-background{
    		display: none;
    	}
    </style>
    
    <!-- Javascript -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script type="text/javascript" src="./js/bootstrap.min.js"></script>
    <script type="text/javascript" src="./js/scroll.js"></script>
	<script src="./js/unslider.min.js"></script>
    
</head>
<body>


	<?php include './includes/navigation.html' ?>

	<!-- Slider -->

	<div class="banner">
    <ul>
        <li>
        	<img src="img/rice.jpg">
        	<div class="caption">This is a slide.</div>
        </li>
        <li>
        	<img src="img/rice2.jpg">
        	<div class="caption">This is a slide.</div>
        </li>
    </ul>

    <!-- The HTML -->
	<a href="#" class="unslider-arrow prev">Previous slide</a>
	<a href="#" class="unslider-arrow next">Next slide</a>

	<script>
	    var unslider = $('.banner').unslider({
			speed: 500,               //  The speed to animate each slide (in milliseconds)
			delay: 3000,              //  The delay between slide animations (in milliseconds)
			keys: true,               //  Enable keyboard (left, right) arrow shortcuts
			dots: true,               //  Display dot navigation
			fluid: false              //  Support responsive design. May break non-responsive designs
		});
	    
	    $('.unslider-arrow').click(function() {
	        var fn = this.className.split(' ')[1];
	        
	        //  Either do unslider.data('unslider').next() or .prev() depending on the className
	        unslider.data('unslider')[fn]();
	    });
	</script>
</div>
	
	<div class="container">
		<br>
		<h1>What is SRI?</h1>
		<p class="big">The <b>System of Rice Intensification (SRI)</b> is a methodology that allows farmers to grow more more rice by using smarter management of plants, water, soil, and nutrients. Through small modifications to the traditional methodology of growing rice, farmers can significantly increase their production, alleviating hunger while also reducing costs, decreasing water usage, and being friendlier to the environment.</p>

		<div class="c">
		<img src="img/illustration_normal.png" width="150" style="display: inline-block;margin-right: 100px">

			<img src="img/illustration_sri.png" width="150">
		</div>
			
	

	</div>

	<div class="colored black" id="sri-plants">
		<Br><br>
		<p class="c">
			<img src="img/illustration_normal_w.png" width="150" style="margin-right: 100px">
			<img src="img/illustration_sri_w.png" width="150">
			<Br><br><Br>
		</p>
	</div>

	<div class="text-banner">
		<div class="container">
			<div class="banner-main">"Growing more with less – for many, this sounds unreal, but SRI applications from more and more places are showing that this is indeed possible."</div>

			<div class="banner-small">World Bank Institute, Washington, DC</div>
		</div>
	</div>


	<div class="container">
		<h4>Global Impact</h4>
		<br>

		<div class="row" id="impact">
			<div class="col-sm-4 c">
				<img src="img/icons/bowl.png" class="sm-icon">
				<h3>Fights Hunger</h3>
				<p>SRI rice fights hunger by increasing farmer's crop yields. Because SRI rice grow to be sturdier, they have a higher resistance to wind, drought, pests, and disease. SRI produces increases in grain yields 50-100% or more than traditional rice growing methods.</p>
			</div>

			<div class="col-sm-4 c">
				<img src="img/icons/money.png" class="sm-icon">
				<h3>Benefits Poor Farmers</h3>
				<p>The SRI methodology reduces costs by reducing the requirements for seeds, water, chemical fertilizer, pesticides, and often labor. SRI reduces seed use by 80-95% and water by 30-50%. SRI reduces cost up to 20% less per hectare than traditional rice growing methods. </p>
			</div>

			<div class="col-sm-4 c">
				<img src="img/icons/environment1.png" class="sm-icon">
				<h3>Helps the Environment</h3>
				<p>Growing rice with SRI is better for the environment. Up to 100% reduction in agrochemical use. Decreases emissions of greenhouse gases.
				</p>
			</div>
		</div>
		<br>
	</div>

	<div class="colored black" id="field">
		<div class="container">
			<p class="big">Since 1997, SRI has spread to over 55 countries.</p>

			<div class="c">
				<img src="img/backgrounds/world-map.png" width="700">
			</div>
		</div>
	</div>

	<div class="container">
		<h1>About Us</h1>
		<p class="big">Our mission is to reduce hunger and extreme poverty by improving productivity of rice and other crops based on environment-friendly agricultural practices that preserve and improve the natural resource base and help to better withstand changing climate conditions. </p>

		<div class="row">
			<div class="col-sm-3">
				<div class="people_wrap">
					<div class="people_img"><img src="./img/people_erika.png"></div>
					<div class="people_name">Erika Styger</div>
					<div class="people_job">Director of Programs</div>
					<div class="people_description">She has a PhD in Crop and Soil Sciences from Cornell University and has over 20 years experience with research and development programs in Africa. </div>
				</div>
			</div>

			<div class="col-sm-3">
				<div class="people_wrap">
					<div class="people_img"><img src="./img/people_lucy.png"></div>
					<div class="people_name">Lucy Fisher</div>
					<div class="people_job">Director of Communications</div>
					<div class="people_description">Oversees knowledge management initiatives and liaison with SRI networks around the world. She developed and maintains the SRI websiteand social networking sites.</div>
				</div>
			</div>

			

			<div class="col-sm-3">
				<div class="people_wrap">
					<div class="people_img"><img src="./img/people_devon.png"></div>
					<div class="people_name">Devon Jenkins</div>
					<div class="people_job">Technical Specialist</div>
					<div class="people_description">assigned to the World Bank-sponsored project on "Improving and Scaling Up SRI in West Africa</div>
				</div>
			</div>

			<div class="col-sm-3">
				<div class="people_wrap">
					<div class="people_img"><img src="./img/people_norman.png"></div>
					<div class="people_name">Norman Uphoff </div>
					<div class="people_job">Senior Advisor</div>
					<div class="people_description">He is carrying on the networking, research and writing that he has been doing on behalf of SRI since 2000...</div>
				</div>
			</div>
		</div>
		<br>
		<div class="button-wrap">
			<a href="./aboutus.php" class="button">More</a>
		</div>

		<br><br>
	</div>

	<div class="g">
		<div class="container">
			<h1>Projects</h1>
			<p class="big">Cornell's SRI-Rice Center has a broad impact across the world.</p>

			<div class="row">
				<div class="col-sm-4 c">
					<img src="img/icons/research.png" class="s-icon">
					<h3>Research &amp; Resources</h3>
					<p>
					</p>
				</div>

				<div class="col-sm-4 c">
					<img src="img/icons/earth.png" class="s-icon">
					<h3>Regional Initiatives</h3>
					<p>
					</p>
				</div>

				<div class="col-sm-4 c">
					<img src="img/icons/research.png" class="s-icon">
					<h3>Resources</h3>
					<p>
					</p>
				</div>
			</div>
			<br><br>
		</div>
	</div>

	<div class="container">
		<h1>Testimonials</h1>

		<div class="row">
			<div class="col-sm-4">
				<blockquote>"In rice, they're using a system called the System of Rice Intensification, which allows them to use less water, less fertilizer, more safe inputs. And they're seeing a big increase, doubling or tripling of yields, and a 75 percent increase in farm incomes because of that program, which has now reached almost 10,000 farm households, and we believe will reach 125,000 over time."</blockquote>

				<div class="quote-author">Neal Conan, NPR</div>
				<div class="quote-details">Interview on Jan. 17, 2012</div>
			</div>
			<div class="col-sm-4">
				<blockquote>"On Thursday, September 15, I had the opportunity to meet Emyl Mil, a rice farmer in Haiti…he was excited about the use of a new, innovative approach called System of Rice Intensification. This new technique has significantly increased rice yields using fewer seeds and less water and fertilizer. Mr. Mil has even shared the technique with fellow farmers, who are seeing the same results."</blockquote>

				<div class="quote-author">Dr. Rajiv Shah, former Administrator of USAID</div>
				<div class="quote-details">Posted on USAID Impact Blog, Sept. 19, 2011</div>
			</div>
			<div class="col-sm-4">
				<blockquote>"Growing more with less – for many, this sounds unreal, but SRI applications from more and more places are showing that this is indeed possible."</blockquote>

				<div class="quote-author">World Bank Institute, Washington, DC</div>
				<div class="quote-details">From a training module on SRI produced by the WBI: <br><u>SRI: Achieving More with Less – a New Way of Rice Cultivation</u></div>
			</div>
		</div>
		
	</div>

	<?php include './includes/footer.html' ?>

</body>
</html>