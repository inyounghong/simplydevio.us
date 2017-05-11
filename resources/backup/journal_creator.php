<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<link rel="stylesheet" type="text/css" href="http://simplydevio.us/main.css" media="screen" />

<link href='http://fonts.googleapis.com/css?family=Fjalla+One' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Sue+Ellen+Francisco' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Lobster+Two:400,700' rel='stylesheet' type='text/css'>

<title>Journal Skin Creator</title>

<meta name="description" content="A free-to-use journal skin generator for premium members on DeviantART.com. Fill out this simple form to create your very own journal skins today!">

<script src="../jquery.js"></script>

 <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>

  <script>
    $(function(){

		$("#resnav").load("http://simplydevio.us/resources/resnav.html");
	});
</script>


 <script type="text/javascript">
 $(document).ready(function(){
 $("#useimage").click(function(){
 	$("#boximagerow").toggle();});
 $("#useimagetop").click(function(){
 	$("#topimagerow").toggle();});
 $("#useimagetxt").click(function(){
 	$("#txtimagerow").toggle();});
 $("#includemaxwidth").click(function(){
 	$("#boxwidthcol").toggle();});
 });


 </script>



</head>

<body>
    <?php include '../menu1.html' ?>

<div class="section header g"><div class="tri tw"></div>
<h1 class="ribbon"><span class="ribbon-content"><p>Journal Creator</p></span></h1>

<div class="tagline">Make your own journal skins!</div>


<!-- Info Section -->


<script type="text/javascript">

function checkit()
{

	var gatsby = '<p>In my younger and more vulnerable years my father gave me some advice that I’ve been turning over in my mind ever since. "Whenever you feel like criticizing any one," he told me, "just remember that all the people in this world haven’t had the advantages that you’ve had." <a href="http://simplysilent.deviantart.com">SimplySilent</a></p> <p>He didn’t say any more, but we’ve always been unusually communicative in a reserved way, and I understood that he meant a great deal more than that. In consequence, I’m inclined to reserve all judgments, a habit that has opened up many curious natures to me and also made me the victim of not a few veteran bores. The abnormal mind is quick to detect and attach itself to this quality when it appears in a normal person, and so it came about that in college I was unjustly accused of being a politician, because I was privy to the secret griefs of wild, unknown men. Most of the confidences were unsought—frequently I have feigned sleep, preoccupation, or a hostile levity when I realized by some unmistakable sign that an intimate revelation was quivering on the horizon; for the intimate revelations of young men, or at least the terms in which they express them, are usually plagiaristic and marred by obvious suppressions. Reserving judgments is a matter of infinite hope.</p> <p>I am still a little afraid of missing something if I forget that, as my father snobbishly suggested, and I snobbishly repeat, a sense of the fundamental decencies is parcelled out unequally at birth.And, after boasting this way of my tolerance, I come to the admission that it has a limit. Conduct may be founded on the hard rock or the wet marshes, but after a certain point I don’t care what it’s founded on. When I came back from the East last autumn I felt that I wanted the world to be in uniform and at a sort of moral attention forever; I wanted no more riotous excursions with privileged glimpses into the human heart. Only Gatsby, the man who gives his name to this book, was exempt from my reaction—Gatsby, who represented everything for which I have an unaffected scorn. If personality is an unbroken series of successful gestures, then there was something gorgeous about him, some heightened sensitivity to the promises of life, as if he were related to one of those intricate machines that register earthquakes ten thousand miles away.</p> <p>This responsiveness had nothing to do with that flabby impressionability which is dignified under the name of the “creative temperament.”—it was an extraordinary gift for hope, a romantic readiness such as I have never found in any other person and which it is not likely I shall ever find again. No—Gatsby turned out all right at the end; it is what preyed on Gatsby, what foul dust floated in the wake of his dreams that temporarily closed out my interest in the abortive sorrows and short-winded elations of men.';
	var textstring = '<style type="text/css">\n\n';
	textstring += '*{background:none; \nborder:none; \npadding:0; \nmargin:0;} \n\n';
    textstring += '.gr{padding:0 !important;}\n';
    textstring += '.gr-top img, .gr1, .gr2, .gr3 {display:none;}\n';
    textstring += 'a.external:after {display:none;}\n\n';

// GR-BOX SECTION

    textstring += '.gr-box{\n';

 	var boxbcolor = document.getElementById('boxbackcolor');
		if (boxbcolor.value == '') {
			textstring += 'background: transparent';}
		else {
			textstring += 'background: #' + boxbcolor.value;}

 	var boxbimg = document.getElementById('boxbackimage');
	if (boxbimg.value == 'http://' || boxbimg.value == '') {
		textstring += '';}
	else {
		textstring += ' url(\'' + boxbimg.value + '\')';}

	user_input = document.example.boxbrep.options[document.example.boxbrep.selectedIndex].value
	if (boxbimg.value == 'http://' || boxbimg.value == '') {
		textstring += '';}
	else {
		textstring += ' ' + user_input;}

	user_input = document.example.boxbpos.options[document.example.boxbpos.selectedIndex].value
	if (boxbimg.value == 'http://' || boxbimg.value == '') {
		textstring += '';}
	else {
		textstring += ' ' + user_input;}
	textstring += ';';

	// Max Width
	var boxwidth = document.getElementById('boxwidth');
	if (boxwidth.value == '') {
		textstring += '';}
	else {
		textstring += '\nmax-width: ' + boxwidth.value + 'px;';
		textstring += '\nmargin: 0 auto;';}

	textstring += '}\n\n';

 // GR-TOP JUNK

    textstring += '.gr-top{\n';

 	// Background Color
	var topbcolor = document.getElementById('topbackcolor');
		if (topbcolor.value == '') {
			textstring += 'background: transparent';}
		else {
			textstring += 'background: #' + topbcolor.value;}

	// Background Image URL
 	var topbimg = document.getElementById('topbackimage');
	if (topbimg.value == 'http://' || topbimg.value == '') {
		textstring += '';}
	else {
		textstring += ' url(\'' + topbimg.value + '\')';}

	// Background Repeat
	user_input = document.example.topbrep.options[document.example.topbrep.selectedIndex].value
	if (topbimg.value == 'http://' || topbimg.value == '') {
		textstring += '';}
	else {
		textstring += ' ' + user_input;}

	// Background Position
	user_input = document.example.topbpos.options[document.example.topbpos.selectedIndex].value
	if (topbimg.value == 'http://' || topbimg.value == '') {
		textstring += '';
	}
	else {
		textstring += ' ' + user_input;
	}
	textstring += ';';

	// Top Height
	var topheight = document.getElementById('topheight');

	// Top Text Padding
	user_input = document.example.topalign.options[document.example.topalign.selectedIndex].value
	textstring += '\n'
	if(user_input == 'top'){
		textstring += 'padding-bottom: ' + topheight.value + 'px;';
	}
	else if (user_input == 'middle'){
		padvar = topheight.value/2;
		textstring += 'padding-top: ' + padvar + 'px;\npadding-bottom: ' + padvar + 'px;';
	}
	else{
		textstring +=  'padding-top: ' + topheight.value + 'px;';
	}

	// Top Text Align (aka timestamp align)
	user_input = document.example.timealign.options[document.example.timealign.selectedIndex].value
	textstring += '\ntext-align: ' + user_input + ';';

	// Padding (within text area)
	var horpadding = document.getElementById('horpadding');
	if (horpadding.value == '') {
		textstring += '';}
	else {
		textstring += '\npadding-left: ' + horpadding.value + '%;\npadding-right: ' + horpadding.value + '%;';}



	textstring += '}\n\n';

// GR-TOP TITLE JUNK

    textstring += '.gr-top h2, .gr-top h2 a{\n';

	// Title Color
	var titlecolor = document.getElementById('titlecolor');
	textstring += 'color: #' + titlecolor.value + ';';

	// Title Font Type
	var titlefont = document.getElementById('titlefont');
	if (titlefont.value == '') {
		textstring += '';}
	else {
		textstring += '\nfont-family: \'' + titlefont.value + '\';';}

	// Title Font Size
	var titlesize = document.getElementById('titlesize');
	textstring += '\nfont-size: ' + titlesize.value + 'px;';

	// Title Align
	user_input = document.example.titlealign.options[document.example.titlealign.selectedIndex].value
	textstring += '\ntext-align: ' + user_input + ';';

	// Title Text Transform
	user_input = document.example.titletransform.options[document.example.titletransform.selectedIndex].value
	textstring += '\ntext-transform: ' + user_input + ';';

	textstring += '}\n\n';

// GR-TOP TIMESTAMP JUNK

    textstring += '.gr-top .timestamp{\n';

	// Time Color
	var timecolor = document.getElementById('timecolor');
	textstring += 'color: #' + timecolor.value + ';';

	// Time Font
	var timefont = document.getElementById('timefont');
	if (timefont.value == '') {
		textstring += '';}
	else {
		textstring += '\nfont-family: \'' + timefont.value + '\';';}

	// Time Size
	var timesize = document.getElementById('timesize');
	textstring += '\nfont-size: ' + timesize.value + 'px;';

	// Time Text Transform
	user_input = document.example.timetransform.options[document.example.timetransform.selectedIndex].value
	textstring += '\ntext-transform: ' + user_input + ';';

	textstring += '}\n\n';


 // TEXT JUNK

    textstring += '.text{\n';

 	// Text Background Color
 	var txtbcolor = document.getElementById('txtbackcolor');
		if (txtbcolor.value == '') {
			textstring += 'background: transparent';}
		else {
			textstring += 'background: #' + txtbcolor.value;}

	// Text Background Image
 	var txtbimg = document.getElementById('txtbackimage');
	if (txtbimg.value == 'http://' || txtbimg.value == '') {
		textstring += '';}
	else {
		textstring += ' url(\'' + txtbimg.value + '\')';}

	// Text Repeat
	user_input = document.example.txtbrep.options[document.example.txtbrep.selectedIndex].value
	if (txtbimg.value == 'http://' || txtbimg.value == '') {
		textstring += '';}
	else {
		textstring += ' ' + user_input ;}

	 // Text Position
	user_input = document.example.txtbpos.options[document.example.txtbpos.selectedIndex].value
	if (txtbimg.value == 'http://' || txtbimg.value == '') {
		textstring += '';}
	else {
		textstring += ' ' + user_input;}
	textstring += ';\n';

	// Text Color
	var maincolor = document.getElementById('maincolor');
	textstring += 'color: #' + maincolor.value + ';';

	// Text Font
	var mainfont = document.getElementById('mainfont');
	if (mainfont.value == '') {
		textstring += '';}
	else {
		textstring += '\nfont-family: \'' + mainfont.value + '\';';}

	// Text Font Size
	var mainsize = document.getElementById('mainsize');
	textstring += '\nfont-size: ' + mainsize.value + 'px;';

	// Text Align
	user_input = document.example.mainalign.options[document.example.mainalign.selectedIndex].value
	textstring += '\ntext-align: ' + user_input + ';';

	// Text Transform
	user_input = document.example.maintransform.options[document.example.maintransform.selectedIndex].value
	textstring += '\ntext-transform: ' + user_input + ';';

	// Text Padding
	textstring += '\npadding: '

	var verpadding = document.getElementById('verpadding');
	var horpadding = document.getElementById('horpadding');

	if (verpadding == '') {
		textstring += '0 ';}
	else {
		textstring +=  verpadding.value + 'px ';}

	if (horpadding == '') {
		textstring += '0 ';}
	else {
		textstring +=  horpadding.value + '% ';}

	if (verpadding == '') {
		textstring += '0 ';}
	else {
		textstring +=  verpadding.value + 'px ';}

	if (horpadding == '') {
		textstring += '0';}
	else {
		textstring +=  horpadding.value + '%';}

	textstring += ';';
	textstring += '}\n\n';



 // GR-BOTTOM JUNK

    textstring += '.bottom{\n';

 	// Bottom Background Color
 	var botbcolor = document.getElementById('botbackcolor');
		if (botbcolor.value == '') {
			textstring += 'background: transparent';}
		else {
			textstring += 'background: #' + botbcolor.value;}


	// Bottom Background Image
 	var botbimg = document.getElementById('botbackimage');
	if (botbimg.value == 'http://' || botbimg.value == '') {
		textstring += '';}
	else {
		textstring += ' url(\'' + botbimg.value + '\')';}

	// Bottom Repeat
	user_input = document.example.botbrep.options[document.example.botbrep.selectedIndex].value
	if (botbimg.value == 'http://' || botbimg.value == '') {
		textstring += '';}
	else {
		textstring += ' ' + user_input ;}

	// Bottom Position
	user_input = document.example.botbpos.options[document.example.botbpos.selectedIndex].value
	if (botbimg.value == 'http://' || botbimg.value == '') {
		textstring += '';}
	else {
		textstring += ' ' + user_input;}
	textstring += ';';

	// Bottom Height
	var botheight = document.getElementById('botheight');

	// Bottom Padding
	user_input = document.example.botalign.options[document.example.botalign.selectedIndex].value
	textstring += '\n'
	if(user_input == 'top'){
		textstring += 'padding-bottom: ' + botheight.value + 'px;';
	}
	else if (user_input == 'middle'){
		padvar = botheight.value/2;
		textstring += 'padding-top: ' + padvar + 'px;\npadding-bottom: ' + padvar + 'px;';
	}
	else{
		textstring +=  'padding-top: ' + botheight.value + 'px;';
	}

	// Padding (within text area)
	var horpadding = document.getElementById('horpadding');
	if (horpadding.value == '') {
		textstring += '';}
	else {
		textstring += '\npadding-left: ' + horpadding.value + '%;\npadding-right: ' + horpadding.value + '%;';}

	textstring += ';}\n\n';

// GR-BOTTOM COMMENTSLINK JUNK

	textstring += '.commentslink{\n';

	// Comment Color
	var commentcolor = document.getElementById('commentcolor');
	textstring += 'color: #' + commentcolor.value + ';';

	// Comment Font
	var commentfont = document.getElementById('commentfont');
	if (commentfont.value == '') {
		textstring += '';}
	else {
		textstring += '\nfont-family: \'' + commentfont.value + '\';';}

	// Comment Size
	var commentsize = document.getElementById('commentsize');
	textstring += '\nfont-size: ' + commentsize.value + 'px;';

	// Comment Align
	user_input = document.example.commentalign.options[document.example.commentalign.selectedIndex].value
	textstring += '\ntext-align: ' + user_input + ';';

	// Comment Transform
	user_input = document.example.commenttransform.options[document.example.commenttransform.selectedIndex].value
	textstring += '\ntext-transform: ' + user_input + ';';

	textstring += '}\n\n </style>\n\n';




	// See what checkboxes are checked. They are elements 9-12


	for (i=9;i<13;i++) {
		if (document.example.elements[i].checked) {
			textstring += document.example.elements[i].name + ' ';
		}
	}

	// Write textstring to the textarea.

	document.forms['example'].output.value = textstring;


	var w = window.open();
	var d= w.document;
	d.open();
	d.write(textstring);
	d.write("<link rel=\"stylesheet\" type=\"text/css\" href=\"main.css\" media=\"screen\" /><div class=\"pattern\"><div class=\"previewpage\">");
	d.write("<div class=\"gr-box\"><div class=\"gr-top\"><div class=\"gr\"><h2><img src=\"http:/\/st.deviantart.net/minish/gruzecontrol/icons/journal.gif?2\" style=\"vertical-align:middle\" alt=\"\"><a href=\"#\">Devious Journal Entry</a></h2><span class=\"timestamp\">Tue Oct 22, 2013, 7:04 AM</span></div></div><div class=\"body\"><div class=\"text\">" + gatsby + "</div><div class=\"bottom\"><a class=\"a commentslink\" href=\"http://sta.sh/023q9vb62a0q#comments\">No Comments</a></div></div></div></div>");
	d.close();
}
// -->
</script>

<div class="infowrap">

	<div class="info">
		<h1>Create</h1> <p>fabulous journal skins by filling out this form!</p>
		<a href="#create" class="button p">More Info</a>
	</div>

    <div class="info">
		<h1>Preview</h1> <p>your skins and make adjustments as necessary!</p>
		<a href="#preview" class="button p w">More Info</a></div>

    <div class="info">
		<h1>Purchase</h1> <p>a license to create as many skins as you'd like!</p>
	<a href="#purchase" class="button p w">More Info</a>
	</div>

    <div class="clear"></div>

</div>

</div>

<!-- Brown Content -->

<div class="section b"><div class="tri tg"></div>

    <div class="wbox" id="resource">

    	<div class="left">

            <form name="example" action="#" onsubmit="checkit(); return false">

        	<div class="resourceSection">

				<h1>Journal Box</h1>

				<div class="infos">Refers to the entire journal skin.</div>

                <br /><h2>Background</h2>

               	Color: # <a title="What color do you want for the background? Leave this empty for a transparent background." class="tooltip">
                    <input id="boxbackcolor" class="color" maxlength="6" value="EEEEEE">
                </a>

                <a title="Do you want to use an image for the background?" class="tooltip">
                        <input type="checkbox" id="useimage"><label for="useimage">Use Image</label>
                </a>

                <br />

                <span class="hiddenrow" id="boximagerow" style="display: none">
                <a title="What image do you want for the background?" class="tooltip">
                    Image URL: <input name="backimage" id="boxbackimage" class="url" value="http://">
                </a>

                <a title="Do you want your image to repeat?" class="tooltip"><select name="boxbrep" id="boxbrep">
                    <option value="repeat" selected="selected">Image Repeat</option>
                    <option value="repeat-x">Repeat Horizontally</option>
                    <option value="repeat-y">Repeat Vertically</option>
                    <option value="no-repeat">No Repeat</option></select>
                </a>

                <a title="Where do you want the image?" class="tooltip">
                    <select name="boxbpos" id="boxbpos">
                        <option value="" selected="selected">Image Position</option>
                        <option value="left top">Top Left</option>
                        <option value="left">Middle Left</option>
                        <option value="left bottom">Bottom Left</option>
                        <option value="center top">Top Center</option>
                        <option value="center">Middle Center</option>
                        <option value="center bottom">Bottom Center</option>
                        <option value="right top">Top Right</option>
                        <option value="right">Middle Right</option>
                        <option value="right bottom">Bottom Right</option>
                     </select>
				</a>
                </span>

                <br /><h2>Max Width</h2>

                <a title="Do you want to limit the max width of your journal?" class="tooltip">
                    <input type="checkbox" id="includemaxwidth"><label for="includemaxwidth">Include Max Width</label>
                </a>

                <span class="hiddenrow" id="boxwidthcol" style="display: none">
                <a title="What width do you want to limit your journal to?" class="tooltip">
                    <input id="boxwidth" class="pixellong" maxlength="4" value="900"> px
                </a>
                </span>

			</div>

            <div class="resourceSection">

                  <h1>Journal Top</h1>

                  <div class="infos">Refers to the top of the journal where the Title and the Date & Time are located.</div>

                  <br /><h2>Background</h2>

                  <a title="What color do you want for the background? Leave this empty for a transparent background." class="tooltip">
                      Color: # <input id="topbackcolor" class="color" maxlength="6" value="9FCE54">
                  </a>

                  <a title="Do you want to use an image for the background?" class="tooltip">
                      <input type="checkbox" class="check" id="useimagetop">
                      <label for="useimagetop">Use Image</label>
                  </a>

                  <br />

                  <div class="hiddenrow" id="topimagerow" style="display: none">

                      Image URL: <input id="topbackimage" class="url" value="http://">

                      <a title="Right click on your image, select Copy Image URL, and paste here. [Help]" class="tooltip">
                          <select name="topbrep">
                              <option value="repeat" selected="selected">Image Repeat</option>
                              <option value="repeat-x">Repeat Horizontally</option>
                              <option value="repeat-y">Repeat Vertically</option>
                              <option value="no-repeat">No Repeat</option>
                          </select>
                      </a>

                      <select name="topbpos">
                          <option value="" selected="selected">Image Position</option>
                          <option value="left top">Top Left</option>
                          <option value="left">Middle Left</option>
                          <option value="left bottom">Bottom Left</option>
                          <option value="center top">Top Center</option>
                          <option value="center">Middle Center</option>
                          <option value="center bottom">Bottom Center</option>
                          <option value="right top">Top Right</option>
                          <option value="right">Middle Right</option>
                          <option value="right bottom">Bottom Right</option>
                      </select>

              	</div>

                      <h2>Height</h2>
                      <input id="topheight" class="pixellong" maxlength="4" value="100"> px
                      <select name="topalign">
                          <option value="top" selected="selected">Text Position</option>
                          <option value="top">Top</option>
                          <option value="middle">Middle</option>
                          <option value="bottom">Bottom</option>
                      </select>



                  <br /><h2>Title Text</h2>

                  <a title="What color do you want the Title to be?" class="tooltip">Color: # <input id="titlecolor" class="color" maxlength="6" value="555555"></a>

                  Font: <input id="titlefont" class="font" value="Source Sans Pro">

                  Size: <input id="titlesize" class="pixel" maxlength="2" value="28">px

                  <select name="titlealign">
                      <option value="left" selected="selected">Text Align</option>
                      <option value="left">Left</option>
                      <option value="center">Center</option>
                      <option value="right">Right</option>
                  </select>

                  <select name="titletransform">
                      <option value="none" selected="selected">No Text Transform</option>
                      <option value="capitalize">Capitalize Text</option>
                      <option value="uppercase">Uppercase Text</option>
                      <option value="lowercase">Lowercase Text</option>
                  </select>

                  <br />

                  <h2>Date and Time</h2>

                  <a title="What color do you want the Time & Date to be?" class="tooltip">Color: # <input id="timecolor" class="color" maxlength="6" value="555555"></a>

                  Font: <input id="timefont" class="font" value="Source Sans Pro">

                  Size: <input id="timesize" class="pixel" maxlength="2" value="16">px

                  <select name="timealign">
                      <option value="left" selected="selected">Text Align</option>
                      <option value="left">Left</option>
                      <option value="center">Center</option>
                      <option value="right">Right</option>
                  </select>

                  <select name="timetransform">
                      <option value="none" selected="selected">No Text Transform</option>
                      <option value="capitalize">Capitalize Text</option>
                      <option value="uppercase">Uppercase Text</option>
                      <option value="lowercase">Lowercase Text</option>
                  </select>

                  <br />

			</div>

            <div class="resourceSection">

                  <h1>Journal Text</h1>

                  <div class="infos">Refers to the middle of the journal and contains the text you tpye into the journal.</div>

                  <br /><h2>Background</h2>
                  Color: # <input id="txtbackcolor" class="color" maxlength="6" value="EEEEEE">

                  <a title="Do you want to use an image for the background?" class="tooltip"><input type="checkbox" id="useimagetxt"> <label for="useimagetxt">Use Image</label></a><br />

                  <div class="hiddenrow" id="txtimagerow" style="display: none">
                      Image URL: <input id="txtbackimage" class="url" value="http://">

                      <select name="txtbrep">
                          <option value="repeat" selected="selected">Image Repeat</option>
                          <option value="repeat-x">Repeat Horizontally</option>
                          <option value="repeat-y">Repeat Vertically</option>
                          <option value="no-repeat">No Repeat</option>
                      </select>

                      <select name="txtbpos">
                          <option value="" selected="selected">Image Position</option>
                          <option value="left top">Top Left</option>
                          <option value="left">Middle Left</option>
                          <option value="left bottom">Bottom Left</option>
                          <option value="center top">Top Center</option>
                          <option value="center">Middle Center</option>
                          <option value="center bottom">Bottom Center</option>
                          <option value="right top">Top Right</option>
                          <option value="right">Middle Right</option>
                          <option value="right bottom">Bottom Right</option>
                      </select>
                  </div>

				<h2>Main Text</h2>

                  <a title="What color do you want the text to be?" class="tooltip">
                      Color: # <input id="maincolor" class="color" maxlength="6" value="222222">
                  </a>

                  Font: <input id="mainfont" class="font" value="Source Sans Pro" />
                  Size: <input id="mainsize" class="pixel" maxlength="2" value="16"> px

                  <select name="mainalign">
                      <option value="left" selected="selected">Text Align</option>
                      <option value="left">Left</option>
                      <option value="center">Center</option>
                      <option value="right">Right</option></select>

                  <select name="maintransform">
                      <option value="none" selected="selected">No Text Transform</option>
                      <option value="capitalize">Capitalize Text</option>
                      <option value="uppercase">Uppercase Text</option>
                      <option value="lowercase">Lowercase Text</option></select>

                  <br />


                  <h2>Padding</h2>
                  <a title="How much padding (spacing) do you want on the left and right of your journal?" class="tooltip">
                      Left & Right: <input id="horpadding" class="percent" maxlength="2" value="5">%
                  </a>

                  <a title="How much padding (spacing) do you want on the top and right of the main text?" class="tooltip">
                      Top & Bottom: <input id="verpadding" class="pixel" maxlength="3" value="30">px
                  </a>


             </div>

             <div class="resourceSection">

                  <br /><h1>Journal Bottom</h1>

                  <div class="infos">Refers to the bottom of the journal and contains the Comments and Mood List</div>

                  <br /><h2>Background</h2>

                  Color: # <input id="botbackcolor" class="color" maxlength="7" value="5E4948">
                  Image URL: <input id="botbackimage" class="url" value="http://">

                  <select name="botbrep">
                      <option value="repeat" selected="selected">Image Repeat</option>
                      <option value="repeat-x">Repeat Horizontally</option>
                      <option value="repeat-y">Repeat Vertically</option>
                      <option value="no-repeat">No Repeat</option>
                  </select>

                  <select name="botbpos">
                      <option value="" selected="selected">Image Position</option>
                      <option value="left top">Top Left</option>
                      <option value="left">Middle Left</option>
                      <option value="left bottom">Bottom Left</option>
                      <option value="center top">Top Center</option>
                      <option value="center">Middle Center</option>
                      <option value="center bottom">Bottom Center</option>
                      <option value="right top">Top Right</option>
                      <option value="right">Middle Right</option>
                      <option value="right bottom">Bottom Right</option>
                  </select>

                  <br />

                  <h2>Height:</h2>

                  <input id="botheight" class="pixellong" maxlength="4" value="100">px

                  <select name="botalign">
                      <option value="top" selected="selected">Text Position</option>
                      <option value="top">Top</option>
                      <option value="middle">Middle</option>
                      <option value="bottom">Bottom</option>
                  </select>

                  <br />

                  <h2>Comments Link</h2>

                  <a title="What color do you want the Comments to be?" class="tooltip">
                      Color: # <input id="commentcolor" class="color" maxlength="6" value="555555">
                  </a>
                  Font: <input id="commentfont" class="font" value="Source Sans Pro">
                  Size: <input id="commentsize" class="pixel" maxlength="2" value="12">px

                  <select name="commentalign">
                      <option value="left" selected="selected">Text Align</option>
                      <option value="left">Left</option>
                      <option value="center">Center</option>
                      <option value="right">Right</option>
                  </select>

                  <select name="commenttransform">
                      <option value="none" selected="selected">No Text Transform</option>
                      <option value="capitalize">Capitalize Text</option>
                      <option value="uppercase">Uppercase Text</option>
                      <option value="lowercase">Lowercase Text</option>
                  </select>


</div></div>

<table class="form">


<tr><td colspan="2"><input type="submit" value="Submit form"><br>
<input type="reset"></td></tr>
<tr><td height="805" colspan="3"><textarea cols="100" rows="50" name="output">When you hit 'Submit' the user input will be written to this textarea</textarea></td></tr>
</div>

            </div></form>



		</div>

		<div class="right">

			<div id="resnav">

            </div>

		</div>

		<div class="clear">

        </div>

    </div>

</body>
</html>
