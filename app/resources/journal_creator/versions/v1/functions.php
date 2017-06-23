<?php
// BACKGROUND: COLOR OR TRANSPARENCY
function background($color_id, $color_value, $trans_id) {
	echo '
	<b>Background</b><br>
	<input id="' . $color_id . '" class="color" maxlength="6" value="' . $color_value . '">
    <input type="checkbox" id="' . $trans_id . '" class="check"><label for="' . $trans_id . '">Transparent Background</label>
    <br>
	';
}
// TEXT COLOR, FAMILY, ALIGNING, TRANSFORMATION, SIZE
function font_css_transform($color_id, $color_value, $family_id, $family_value, $align_name, $transform_name, $size_id, $size_max, $size_value, $size_range_id) {
	color($color_id, $color_value);
	font_family($family_id, $family_value);
	text_align($align_name);
	text_transform($transform_name);
	font_size($size_id, $size_max, $size_value, $size_range_id);
}
function font_css($color_id, $color_value, $family_id, $family_value, $align_name, $size_id, $size_max, $size_value, $size_range_id) {
	color($color_id, $color_value);
	font_family($family_id, $family_value);
	text_align($align_name);
	echo '<br>';
	font_size($size_id, $size_max, $size_value, $size_range_id);
}
// color
function color($id, $value){
	echo '<input id="' . $id . '" class="color" maxlength="6" value="' . $value . '">';
}
// font-family
function font_family($id, $value){
	echo '<input id="' . $id . '" class="font" value="' . $value . '">';
}
// text-align
function text_align($name){
	echo '
	<select name="' . $name . '">
		<option value="left" selected="selected">Align</option>
		<option value="left">Left</option>
		<option value="center">Center</option>
		<option value="right">Right</option>
	</select>';
}
// text-transform
function text_transform($name){
	echo '
	<select name="' . $name . '">
		<option value="none" selected="selected">Transform</option>
		<option value="capitalize">Capitalize</option>
		<option value="uppercase">Uppercase</option>
		<option value="lowercase">Lowercase</option>
	</select><br>';
}
// font-size
function font_size($id, $max, $value, $range_id) {
	echo '
	<span class="heading">Font Size</span>
    <input id="' . $id . '" type="range" min="0" max="' . $max . '" value="' . $value . '"><span class="range_label" id="' . $range_id . '"></span>';
}


// USE IMAGE CHECKBOX
function use_image($checkbox_id, $hidden_id, $url_id, $repeat_id, $position_id){
	echo '
	<input type="checkbox" id="' . $checkbox_id . '" class="check"><label for="' . $checkbox_id . '">Use Image</label>
	<div class="hiddenrow" id="' . $hidden_id . '" style="display:none;">';
		image_url($url_id);
		echo '<br>';
		image_repeat($repeat_id);
		image_position($position_id);
	echo '</div>';
}
// background:url(img)
function image_url($id){
	echo '<input id="' . $id . '" class="url" placeholder="Image URL">';
}
// background-repeat
function image_repeat($id){
	echo '
	<select name="' . $id . '" id="' . $id . '">
		<option value="repeat" selected="selected">Repeat Image</option>
		<option value="repeat-x">Repeat Horizontally</option>
		<option value="repeat-y">Repeat Vertically</option>
		<option value="no-repeat">No Repeat</option>
	</select>';
}
// background-position
function image_position($id){
	echo'
    <select name="' . $di . '" id="' . $id . '">
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
	</select>';
}
// BORDER
function use_border($check_id, $hidden_id, $border_id, $border_color, $style_id, $width_id, $width_max, $width_range_id){
	echo'
    <br><input type="checkbox" id="' . $check_id .'" class="check"><label for="' . $check_id .'">Add Border</label>

    <span id="' . $hidden_id .'" style="display: none"><br>
        <input id="' . $border_id .'" class="color" maxlength="6" value="' . $border_color .'">
        <select name="' . $style_id .'" id="' . $style_id .'">
            <option value="solid" selected="selected">Solid Border</option>
            <option value="dashed">Dashed</option>
            <option value="dotted">Dotted</option>
            <option value="double">Double</option>
        </select>
        <br><span class="heading">Width</span>
        <input id="' . $width_id .'" type="range" min="0" max="' . $width_max .'" value="3"><span class="range_label" id="' . $width_range_id .'"></span>
    </span>';
}
?>
<script>
var textstring = '';
 // finding background color
function background_color(id, check){
    if (document.getElementById(check).checked)
    {
        textstring += 'background: transparent';
    }
    else
    {
        textstring += 'background: #' + document.getElementById(id).value;
    }
}
// finding background image, repeat, and position
function background_image(id) {
    url = document.getElementById(id).value;
    if (url == ''){
	    textstring += '';
    }
    else
    {
        url = url.replace("https://", "http://");
	    textstring += ' url(\'' + url + '\')';
        textstring += ' ' + brep;
        textstring += ' ' + bpos;
    }
    textstring += ';';
}
// finding fonts
var font_family = function(id) {
    if (document.getElementById(id).value == '') {
        textstring += '';
    }
    else {
        textstring += '\nfont-family: "' + document.getElementById(id).value + '";';
    }
}
var font_size = function(id){
    textstring += '\nfont-size: ' + document.getElementById(id).value + 'px;';
}
var font_color = function(id){
	textstring += '\ncolor: #' + document.getElementById(id).value + ';';
}
var font_color_imp = function(id){
	textstring += '\ncolor: #' + document.getElementById(id).value + '!important;';
}
var text_transform = function(transform){
    textstring += '\ntext-transform: ' + transform + ';';
}
var text_align = function(align) {
    textstring += '\ntext-align: ' + align + ';';
}
// setting vertical pixel
var vPixel = function(pixel) {
    if (pixel == '') {
        vpix = '0';
    }
    else {
        vpix = pixel + 'px ';
    }
}
var hPercent = function(percent) {
    if (percent == '')
    {
        hper = '0';
    }
    else {
        hper = percent + '% ';
    }
}
function border_radius (id) {
    textstring += '\nborder-radius: ' + document.getElementById(id).value + 'px;\n';
    textstring += '-moz-border-radius: ' + document.getElementById(id).value + 'px;\n';
    textstring += '-webkit-border-radius: ' + document.getElementById(id).value + 'px;\n';
}
var use_border = function(check, color, width, style) {
    if (document.getElementById(check).checked)
    {
        textstring += 'border: ' + document.getElementById(width).value + 'px ' + document.getElementById(style).value + ' #' + document.getElementById(color).value + ';\n';
    }
    else
    {
        textstring += '';
    }
}
</script>
