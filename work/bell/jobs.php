<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <title>BelleApps | Jobs Opportunities</title>
    <meta name="description" content="BelleApps: ">
    <meta name="keywords" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <link href="css/style.css" rel="stylesheet" />
    <link href="css/nav.css" rel="stylesheet" />
    <script src="https://code.jquery.com/jquery.js"></script>
     
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
    <script>
    $(document).ready(function(){
        $( ".job" ).click(function() {
          $( this ).children("div").slideToggle();
        });
    });
    </script>
    <?php include ("includes/nav.html");?>
    
    <div class="section" id="FAQ">
      <div class="wrap">
        <br><br>
       

        <!--
        <div id="logo">
            <img src="Images/JobDescription.jpg" alt="logo">
            
        </div>-->

        

         <h1>Job Opportunities</h1>
   
        <p>
            At Belle Apps, we are working to bring our community a little closer together one bag at a time. To get there, we need exceptionally talented and driven people. If you want to be a part of the movement you're in luck because Belle Apps is looking for
            new team members!
        </p>
        <p>
            To apply for a job, email us at <a href="mailto:ava9@cornell.edu">ava9@cornell.edu</a>.
        </p>
        <br>
            
        <div class="job">
            <h2>Business Development Intern</h2>
            <div class="job_info">
                <h3>What you'll do:</h3>
                <ol>
                    <li>Contribute to the development and refinement of Belle Apps' vision</li>
                    <li>Manage Belle Apps' social media accounts (e.g. Facebook, Twitter, Instagram, Hootsuite) and 
                        marketing channels like KickStarter to engage customers and increase online presence.</li>
                    <li>Conduct market analysis for all levels of competition and conduct early stage research for competitor analysis.</li>
                    <li>Locate potential business deals by contacting partners and explore opportunities </li>
                </ol>
                <br>
                <h3>What we're looking for:</h3>
                <ol>
                    <li>An interest in startups. Experience working in a startup is a plus</li>
                    <li>Strong social, marketing, leadership, and creative thinking skills (ideal)</li>
                    <li>Ability to work well in fast-paced environment</li>
                    <li>All majors are welcome </li>
                </ol>
            </div>
        </div>
        
        <div class="job">
            <h2>Marketing Intern</h2>
            <div class="job_info">
                <h3>What you'll do:</h3>
                <ol>
                    <li>Develop an integrated branding and marketing strategy for Belle Apps.</li>
                    <li>Deploy optimized campaigns that drive customer retention</li>
                    <li>Collaborate with other team members to maintain and develop effective Belle Apps social media outlets.</li>
                    <li>Design different marketing materials (ideal)</li>
                </ol>
                <br>
                <h3>What we're looking for:</h3>
                <ol>
                    <li>An interest in startups. Experience working in a startup is a plus</li>
                    <li>Strong writing and creative management skills and a knack for simplifying complex ideas that will resonate with target customer (ideal)</li>
                    <li>Prior experience with marketing (completion of at least one marketing course) is a plus</li>
                    <li>All majors are welcome</li>
                </ol>
            </div>
        </div>
        
        <div class="job">
            <h2>Web Application Manager</h2>
            <div class="job_info">
                <h3>What you'll do:</h3>
                <ol>
                    <li>Work as a front-end or back-end web developer and collaborate with the team to bring product ideas to life</li>
                    <li>Work creatively or collaboratively across teams to discover and create optimal user interactions and controls</li>
                </ol>
                <br>
                <h3>What we're looking for:</h3>
                <ol>
                    <li>An interest in startups. Experience working in a startup is a plus</li>
                    <li>Front-end: HTML, CSS, JQuery, Javascript</li>
                    <li>Back-end: Node.js (Javascript), SQL, PHP</li>
                    <li>Good communication and human relation skills & organizational skills in a deadline driven environment</li>
                    <li>Creativity, enthusiasm and energy</li>
                </ol>
            </div>
        </div>

        <div class="job">
            <h2>Mobile Application Manager</h2>
            <div class="job_info">
                <h3>What you'll do:</h3>
                <ol>
                    <li>Work as a iOS or Android developer and collaborate with the web application team to bring product ideas to life</li>
                    <li>Lead the entire app lifecycle right from concept stage until delivery and post launch support </li>
                </ol>
                <br>
                <h3>What we're looking for:</h3>
                <ol>
                    <li>An interest in startups. Experience working in a startup is a plus</li>
                    <li>For iOS: iOS SDK and XCode, iOS UX guidelines/best practice</li>
                    <li>For Android: Java, Android SDK, Android UX guidelines/best practice </li>
                    <li>Experience with mobile development issues related to performance optimization, caching, security, and native hardware components (camera, gps, etc.)</li>
                    <li>Good communication and human relation skills & organizational skills in a deadline driven environment</li>
                    <li>Creativity, enthusiasm and energy </li>
                </ol>
            </div>
        </div>

        <div class="job">
            <h2>Graphic Design</h2>
            <div class="job_info">
                <h3>What you'll do:</h3>
                <ol>
                    <li>Develop concepts, graphics and layouts for product illustrations, company logos, and websites</li>
                    <li>Develop and design e-newsletters and other web-based communications using online marketing best practices</li>
                    <li>Work with the frontend developers to design the web application</li>
                </ol>
                <br>
                <h3>What we're looking for:</h3>
                <ol>
                    <li>An interest in startups. Experience working in a startup is a plus</li>
                    <li>Advanced level skills using Adobe Creative Suite/Adobe Creative Cloud</li>
                    <li>Experience with graphic design and/or web design</li>
                    <li>Good communication and human relation skills & organizational skills in a deadline driven environment</li>
                    <li>Creativity, enthusiasm and energy</li>
                    <li>All majors are welcome</li>
                </ol>
            </div>
        </div>
        
        <div class="job">
            <h2>Video Production Manager</h2>
            <div class="job_info">
                <h3>What you'll do:</h3>
                <ol>
                    <li>Collaborate with other team members to maintain and develop an effective promotional video (produce and edit for various platforms, i.e. Crowdsource, Indigogo)</li>
                    <li>Ensure content is edited and released in a timely manner according to production schedule</li> 
                    <li>Recruit video production assistants or assemble a team (if necessary)</li>
                </ol>
                <br>
                <h3>What we're looking for:</h3>
                <ol>
                    <li>An interest in startups. Experience working in a startup is a plus</li>
                    <li>Experience with video production equipment and software tools</li>
                    <li> Good communication and human relation skills & organizational skills in a deadline driven environment</li>
                    <li>Creativity, enthusiasm and energy</li>
                    <li>All majors are welcome</li>
                </ol>
                <br>
                </div>
                
            </div>
        </div>
    </div>
        <div class="section" id="contact">

          <div class="wrap">
            
            <?php include 'includes/footer.html' ?>
          
          </div>
        </div>
    </body>
</html>
