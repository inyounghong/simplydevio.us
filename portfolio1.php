<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

        <!--<link rel="stylesheet" type="text/css" href="http://simplydevio.us/main.css" media="screen" />-->
        
        <link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,700italic,400,600,700' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Ubuntu:300,400,500,700' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" media="(max-width: 640px)" href="http://simplydevio.us/medium.css">
        <link rel="stylesheet" media="(max-width: 400px)" href="http://simplydevio.us/small.css">

        <script src="../jquery.js"></script>
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>

        <title>Portfolio</title>
        <link rel="icon" href="http://www.simplydevio.us/new128.png" sizes="128x128">

        <script>
          (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
          (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
          m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
          })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
        
          ga('create', 'UA-45010841-2', 'simplydevio.us');
          ga('send', 'pageview');
        </script>

        <style>
            *{
                padding:0;
                margin:0;

            }

            body{
                background:#eee url('http://www.simplydevio.us/images/stripessmall2.png');
                font-family:'Source Sans Pro';
                font-size:18px;
            }

            a{
                color:#e03e56;
                text-decoration:none;
                border-bottom:1px solid #F5C3CA;
            }

            a:hover{

            }
            /* GALLERY AND SUCH */

            .thumb_gallery{
                text-align:center;
                margin:0 -15px;
            }

            .thumb_wrap{
                display:inline-block;
                margin: 10px 10px;
                position:relative;
                height:320px;
                overflow:hidden;
            }

            .thumb{
                background:#1d2742;
                z-index:5;
                position:relative;
                display: inline-block;
            }

            .thumb img{
                transition: all .2s;
            }

            .thumb:after{
                content:url('http://www.simplydevio.us/images/wsearch.png');
                position:absolute;
                top:70%;
                left:50%;
                margin-left:-18px;
                margin-top:-18px;
                opacity:0;
                transition:all .2s;
            }

            .thumb_info{
                position: absolute;
                left: 0;
                top:80%;
                text-align: center;
                display: inline-block;
                width: 84%;
                padding: 0 8%;
                color: #fff!important;
                text-transform: uppercase;
                font-weight: 700;
                font-family:'Ubuntu';
                font-size:18px;
                opacity:0;
                transition:all .2s;
            }

            .hy .res_image:after, .hy .thumb{background:#f58c3b!important;}
            .hp .res_image:after, .hp .thumb{background:#e03e56;}
            .hb .res_image:after, .hb .thumb{background:#1d2742;}
            .hg .res_image:after, .hg .thumb{background:#25bda6;}

            .thumb:hover img{
                opacity:.1;
            }

            .thumb:hover:after{
                opacity:1;
                top:47%;
            }

            .thumb_wrap:hover .thumb_info{
                opacity:1;
                top:57%;
            }


            header{
                background:#1d2742;
                padding:200px 50px 230px;
                text-align:center;
            }

            header *{
                font-family:'Source Sans Pro';
                color:#fff;
                font-weight:300;
            }

            header h1{
                font-size:70px;
                font-weight:600;

            }

            header h1 span{
                font-weight:600;
                opacity:0.6;
            }

            header h2{
                font-family:'Droid Serif', 'Cambria', serif;
                font-size: 22px;
                opacity:0.8;
                margin-top:40px;
            }

            header em{
                font-style:normal;
                font-weight:600;
                border-bottom:5px solid #fff;
            }

            /* MAIN STYLING */

            main{
                padding:130px 50px 0;
                color:#151515;
            }

            main h1{
                font-size:70px;
                margin-bottom:40px;
                font-family:'Source Sans Pro';

            }



            .container{
                max-width:1000px;
                margin:0 auto 150px;
                padding:0 20px;
            }

            .narrow{
                max-width:740px;
            }

            p{
                font-size:22px;
                color:#333;
                margin:20px 0;
                line-height:32px;

            }

            p.big{
                font-family:'Droid Serif', 'Cambria', serif;
                font-size:36px;
                margin-bottom:30px;
                line-height:46px;
            }

            .left50{
                width:45%;
                float:left;
            }

            .right50{
                width:45%;
                float:right;
            }

            .clear{
                clear: both;
            }

            h2 a{
                font-family:'Droid Serif';
                font-size:32px;
                margin-bottom:30px;
                line-height:40px;
                font-weight:400;
                color:#222;
                border-bottom:none;
            }

            .big_wrap{
                margin:30px 0 70px;

            }

            .big_wrap img{
                background:#ddd;
                padding:10px;
            }

            .big_wrap a{
                border:none;
            }




        </style>

    </head>

    <body>
    
        <header>
            <h1>Hi there. <span>I like <em>websites</em>.</span></h1>
        </header>
        <main>
            <div class="container">
                <div class="narrow">
                    <h1>About Me</h1>
                    <p class="big">I'm Inyoung Hong, a designer and programmer who's passionate about making the web awesome.</p>

                    <p>I'm a student majoring in Computer Science at Cornell University who will be graduating in 2018. I love working with both front- and back-end web development, and 
                        in my spare time, I enjoy tinkering with my website <a target="_blank" href="http://www.simplydevio.us/index.php">simplydevio.us</a>, taking web <a href="http://www.simplydevio.us/portfolio1.php#commissions">commissions</a>, and consuming any chocolate chip cookies in the near vicinity.</p>

                    <p>Currently, I'm working on learning more Python and making my website projects mobile compatible.</p>
                </div>
            </div>

            <div class="container">
                <div class="narrow">
                    <h1>Projects</h1>
                    <h2><a target="_blank" href="http://www.simplydevio.us">simplydevio.us</a></h2>
                    <p>My main website which serves as a platform for my <a target="_blank" href="http://www.deviantart.com">DeviantART</a>-based business as well as a playground for my ideas.
                        It obviously makes extensive use of CSS, and also includes bits of PHP, Python, Javascript, and jQuery.</p>
                    <div class="big_wrap">
                        <a target="_blank" href="http://www.simplydevio.us/index.php"><img src="portfolio/images/simplydevious.jpg"></a>
                    </div>
                    <h2><a target="_blank" href="http://www.simplydevio.us/tvc/index.php">Tracy Volunteer Connection</a></h2>
                    <p>A work-in-progress website for promoting the <a target="_blank" href="http://www.simplydevio.us/tvc/index.php">Tracy Volunteer Connection</a>, a newly launched community project in my hometown.</p>
                    <div class="big_wrap">
                        <a target="_blank" href="http://www.simplydevio.us/tvc/index.php"><img src="portfolio/images/tracy1.jpg"></a>
                    </div>
                    <a name="commissions"></a>
                </div>

            </div>

            <div class="container">
                <h1>Portfolio</h1>
                <p>Skins I have designed and coded for use on <a target="_blank" href="http://www.deviantart.com">DeviantART</a>.</p>
                <div class="thumb_gallery">
                    <div class="thumb_wrap">
                        <a href="http://simplysilent.deviantart.com/art/Autumn-Spirit-Skin-397511431" class="thumb"><img src="portfolio/images/autumn_spirit.jpg">
                        <div class="thumb_info">Autumn Spirit</div>
                        </a>
                    </div>
                    <div class="thumb_wrap">
                        <a href="http://simplysilent.deviantart.com/art/Tropical-Fruit-CSS-404814616" class="thumb"><img src="portfolio/images/tropical_fruit.jpg">
                            <div class="thumb_info">Tropical Fruit</div>
                            </a>
                    </div>
                    <div class="thumb_wrap">
                        <a href="http://simplysilent.deviantart.com/art/Forgotten-Memories-Journal-CSS-338519229" class="thumb"><img src="portfolio/images/forgotten_memories.jpg">
                            <div class="thumb_info">Forgotten Memories</div>
                            </a>
                    </div>
                    <div class="thumb_wrap">
                        <a href="http://simplysilent.deviantart.com/journal/Interview-1-Inma-475350174" class="thumb"><img src="portfolio/images/inma.jpg">
                        <div class="thumb_info">Inma Interview</div>
                        </a>
                    </div>
                    
                    <div class="thumb_wrap">
                        <a href="http://simplysilent.deviantart.com/art/Virtuoso-Journal-Skin-471743271" class="thumb"><img src="portfolio/images/virtuoso.jpg">
                        <div class="thumb_info">Virtuoso</div>
                        </a>
                    </div>
                    <div class="thumb_wrap">
                        <a href="http://simplysilent.deviantart.com/art/Winter-Taste-Skin-428178737" class="thumb"><img src="portfolio/images/winter_taste.jpg">
                        <div class="thumb_info">Winter Taste</div>
                        </a>
                    </div>
                    <div class="thumb_wrap">
                        <a href="http://simplysilent.deviantart.com/art/Surreal-Journal-CSS-v2-424171754" class="thumb"><img src="portfolio/images/surreal.jpg">
                        <div class="thumb_info">Surreal</div>
                        </a>
                    </div>
                
                    <div class="thumb_wrap">
                        <a href="http://simplysilent.deviantart.com/art/Fade-Journal-Skin-439981783" class="thumb"><img src="portfolio/images/fade.jpg">
                        <div class="thumb_info">Fade</div>
                        </a>
                    </div>
                    <div class="thumb_wrap">
                        <a href="http://simplysilent.deviantart.com/journal/CP-Spotlights-1-Group-Spotlight-Project-466878330" class="thumb"><img src="portfolio/images/cp.jpg">
                        <div class="thumb_info">Community Projects</div>
                        </a>
                    </div>
                </div>
            </div>

            <div class="container">
                <h1>Contact</h1>
                <p>Want to get in contact? Shoot me an email at <a href="mailto:ih235@cornell.edu">ih235@cornell.edu</a>.</p>                       
                           
        </main>
    </body>
</html>
