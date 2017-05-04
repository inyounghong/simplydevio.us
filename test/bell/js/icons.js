

// see canvas js file to call drawIcons

var midwid = wid/2;
function drawIcons(midwid){

// keep in mind that mobile responsiveness starts at 700px wide

var p1 = (midwid-350);
var tipt = 70; // Starting top point

p1.toString()+"px"
document.getElementById("studying").style.left = (midwid-300).toString()+"px";
document.getElementById("studying").style.top = tipt.toString()+"px";

document.getElementById("shopping").style.right = (midwid-320).toString()+"px";
document.getElementById("shopping").style.top = (tipt+4).toString()+"px";

document.getElementById("logo").style.left = (midwid-200).toString()+"px";
document.getElementById("logo").style.top = (tipt+330).toString()+"px";

document.getElementById("faded").style.left = (midwid-260).toString()+"px";
document.getElementById("faded").style.top = (tipt+460).toString()+"px";

document.getElementById("list").style.left = (midwid-260).toString()+"px";
document.getElementById("list").style.top = (tipt+850).toString()+"px";

document.getElementById("earn").style.right = (midwid-280).toString()+"px";
document.getElementById("earn").style.top = (tipt+950).toString()+"px";

document.getElementById("route").style.right = (midwid-280).toString()+"px";
document.getElementById("route").style.top = (tipt+1270).toString()+"px";

document.getElementById("miles").style.left = (midwid-285).toString()+"px";
document.getElementById("miles").style.top = (tipt+1360).toString()+"px";

document.getElementById("circle").style.left = (midwid-80).toString()+"px";
document.getElementById("circle").style.top = (tipt+1620).toString()+"px";

document.getElementById("confirm").style.left = (midwid-62).toString()+"px";
document.getElementById("confirm").style.top = (tipt+1655).toString()+"px";

document.getElementById("receipt").style.left = (midwid-80).toString()+"px";
document.getElementById("receipt").style.top = (tipt+1800).toString()+"px";

document.getElementById("food").style.left = (midwid-300).toString()+"px";
document.getElementById("food").style.top = (tipt+1940).toString()+"px";

document.getElementById("money").style.right = (midwid-320).toString()+"px";
document.getElementById("money").style.top = (tipt+1950).toString()+"px";


}