<?
session_start();
header('Content-type: image/png');
$visitor = exec("python ../image_with_name.py 'fxerie'");
$new_message1 = str_replace("visitor",$visitor, 'I\'m Fae. Thanks for visiting!');
$new_message2 = str_replace("visitor",$visitor, 'Welcome, visitor!');
$font = './uploaded_fonts/' . 'georgia.ttf';
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
$width  = (15 * strlen($longer_message));
$im = imagecreatetruecolor ($width,79);
$background = imagecolorallocate($im, 255, 255, 255);
imagefill($im,0,0,$background);
$color = imagecolorallocate($im, 0, 0, 0);
imagettftext($im, 25, 0, 0, 64, $color, $font, $new_message1);
imagettftext($im, 25, 0, 25, 27, $color, $font, $new_message2);
imagepng($im);
imagedestroy($im);
?>