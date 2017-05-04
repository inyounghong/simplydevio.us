<?
session_start();
header('Content-type: image/png');




$username = $_SESSION['username'];
$r = $_SESSION['r'];
$g = $_SESSION['g'];
$b = $_SESSION['b'];
$br = $_SESSION['br'];
$bg = $_SESSION['bg'];
$bb = $_SESSION['bb'];
$message1 = $_SESSION['message1'];
$message2 = $_SESSION['message2'];
$image_file = $_SESSION['image_file'];
$font = $_SESSION['font'];
$font_size = $_SESSION['font_size'];
$letter_width = $_SESSION['letter_width'];
$xpos = $_SESSION['xpos'];
$ypos = $_SESSION['ypos'];
$xpos2 = $_SESSION['xpos2'];
$ypos2 = $_SESSION['ypos2'];

$height = $_SESSION['height'];
$visitor = exec("python ../image.py $username");
$new_message1 = str_replace("visitor",$visitor, $message1);
$new_message2 = str_replace("visitor",$visitor, $message2);
$font = '/uploaded_fonts/' . $font;



# Determine the longer of the two  messages
if (strlen($new_message2) > 0)
{
	if (strlen($new_message1) <= strlen($new_message2))
	{
		$longer_message = $new_message2;
	}
	else
	{
		$longer_message = $new_message1;
	}
}
else
{
	$longer_message = $new_message1;
}

$width  = ($letter_width * strlen($longer_message));
$im = imagecreatetruecolor ($width,$height);
$background = imagecolorallocate($im, $br, $bg, $bb);
imagefill($im,0,0,$background);



$color = imagecolorallocate($im, $r, $g, $b);


imagettftext($im, $font_size, 0, $xpos, $ypos, $color, $font, $new_message1);
imagettftext($im, $font_size, 0, $xpos2, $ypos2, $color, $font, $message2);

imagepng($im);
imagedestroy($im);

session_end();

?>
