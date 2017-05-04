$(document).ready(function(){
    checkit();

    $('#password').keyup(function() {
        checkit();
    }) 
});
function checkit()
{
    var css = '<style type="text/css">\n\n';
    
    // HTML BUILDING
    var htmlstring = '';
    var maxWidth = document.getElementById('maxWidth').value;
    var thumbNumber = example.butName.length;
    var thumbHeight = (maxWidth/(thumbNumber-1));
    var slideHeight = Math.ceil(330 - thumbHeight);
    var maxThumb = thumbHeight * 2;
    
    //  LEFT SIDE DIRECTORY BUTTONS
    for(var i = 0; i < thumbNumber; i++)
    {
        htmlstring += '<div class="pic">'
        if(i==0)
        {
            htmlstring += '<a href="' + example.butName[i].value + '" class="slide';
            htmlstring += ' main';
        }
        else
        {
            htmlstring += '<a href="' + example.butName[i].value + '" class="thumb">';
            htmlstring += '<img src="' + example.butLink[i].value + '"></a>';
            htmlstring += '<a href="' + example.butName[i].value + '" class="slide';
            htmlstring += '';
        }
        htmlstring += '">';
        htmlstring += '<img src="' + example.butLink[i].value + '" height="' + slideHeight + '"></a>';
        htmlstring += '</div>'
    }
    
// DONE WITH HTML BUILDING
// CSS BUILDING
    
    var textstring = '*{background:none; border:none; padding:0; margin:0;} \n\n';
    textstring += '.gr{padding:0 !important;}\n';
    textstring += '.gr-top img, .gr1, .gr2, .gr3 {display:none;}\n';
    textstring += '.gr-top, .bottom, a.external:after {display:none;}\n';
    textstring += '.gr-box br{display:none;}\n';
    textstring += 'a{text-decoration:none; font-weight:normal;}\n';
    textstring += '.external{display:block;}\n\n';
    
    textstring += '.gr-box{\n';
    textstring += 'z-index:99!important;}\n\n';
    
    textstring += '.text{\n';
    textstring += 'max-width:' + maxWidth + 'px;\n';
    textstring += 'height:330px;\n';
    textstring += 'position:relative;\n';
    textstring += 'text-align:center;\n';
    textstring += 'padding-top:' + slideHeight + 'px;\n';
    textstring += 'margin:20px auto 0;}\n\n';
    textstring += '.text br{display:none;}\n\n';
    textstring += '.thumb{\n';
    textstring += 'background:#' + document.getElementById('thumbBackground').value + ';\n';
    textstring += 'position:relative;\n';
    textstring += 'height:' + thumbHeight + 'px;\n';
    textstring += 'width:' + thumbHeight + 'px;\n';
    textstring += 'z-index:100;\n';
    textstring += 'display:inline-block;\n';
    textstring += 'overflow:hidden;}\n\n';
    textstring += '.thumb img{\n';
    textstring += 'position:absolute;\n';
    textstring += 'left: 0;\n';
    textstring += 'max-height:' + maxThumb + 'px;\n';
    textstring += 'max-width:' + maxThumb + 'px;\n';
    textstring += 'opacity:1;\n';
    textstring += 'transition:opacity 0.2s;}\n\n';
    textstring += '.thumb img:hover{opacity:0.6;}\n\n';
    textstring += '.pic{display:inline-block;}\n\n';
    textstring += '.slide{\n';
    textstring += 'background:#' +document.getElementById('slideBackground').value + ';\n';
    textstring += 'width:' + maxWidth + 'px;\n';
    textstring += 'top:0;\n';
    textstring += 'left:0;\n';
    textstring += 'display:none;\n';
    textstring += 'overflow:hidden;\n';
    textstring += 'position:absolute;\n';
    textstring += 'height:' + slideHeight + 'px;}\n\n';
    textstring += '.slide img{\n';
    //textstring += 'position:absolute;\n';
    textstring += 'max-width:1000px;}\n\n';
    textstring += '.main{display:block!important;}\n';
    textstring += '.pic:hover .slide{display:block;}\n';
// CUSTOM BOX HTML BUILDING
    var widgetstring = '<div class=\"popup2-moremenu\"><div class=\"floaty-boat\"><br><img src=\"';
    widgetstring += document.getElementById('customBackground').value;
    widgetstring += '\"></div></div><div class=\"gr-box gr-genericbox\">';
    
    
    
    // Write textstring to the textarea.
    document.getElementById("max_width_range").innerHTML = maxWidth;

    if ($('#password').val() == 'celvas<3' || $('#password').val() == 'celvas <3') {
        document.getElementById("cssArea").value = textstring;
        document.getElementById("htmlArea").value = htmlstring;
        document.getElementById("widgetArea").value = widgetstring;
        document.getElementById('message').innerHTML = '&#10004;';
    }
    
        
    var complete_css = '<style>#preview_box a{font-weight:400;}';
    complete_css += textstring;
    complete_css += '.gr-box a{text-decoration:none;} .gr-box{min-width:600px; max-width:800px; padding: 20px 10px;} .description{max-width:800px;}';
    complete_css += '.maxheight{position:absolute;top:370px;display:block;border-top:1px dotted #777; width:100%; text-align:center; padding-top:5px;}';
    complete_css += '.thumb img{margin-left:-50%;}' // Fail fix to make the whole 50x50 square show.
    complete_css += '.gr-box{background:url(\"' + document.getElementById('customBackground').value + '\") no-repeat;</style>';
    
    //injectStyles(complete_css);
    var complete_html = '<div class="gr-box"><div class="gr-top"><div class="gr"><h2><img src="http:/\/st.deviantart.net/minish/gruzecontrol/icons/journal.gif?2" style="vertical-align:middle"><a href="#">Devious Journal Entry</a></h2><span class="timestamp">Tue Oct 22, 2013, 7:04 AM</span></div></div><div class="body"><div class="text">';
    complete_html += htmlstring;
    complete_html += '</div><div class=\"bottom\"><a class=\"a commentslink\" href=\"http://sta.sh/023q9vb62a0q#comments\">No Comments</a></div></div>';
    document.getElementById('preview_box').innerHTML = complete_css + complete_html;
}