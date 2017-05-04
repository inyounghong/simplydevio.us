<?
session_start();
header('Content-type: image/png');
$visitor = exec("python ../image_with_name.py 'asayyu'");
$new_message1 = str_replace("visitor",$visitor, 'Hi, visitor! Welcome.');
$new_message2 = str_replace("visitor",$visitor, 'Thanks for visiting!');
$font = './uploaded_fonts/' . 'opensans.ttf';
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
$width  = (8 * strlen($longer_message));
$im = imagecreatetruecolor ($width,50);
$background = imagecolorallocate($im, 255, 255, 255);
imagefill($im,0,0,$background);
$color = imagecolorallocate($im, 0, 0, 0);
imagettftext($im, 12, 0, 0, 21, $color, $font, $new_message1);
imagettftext($im, 12, 0, 0, 41, $color, $font, $new_message2);
imagepng($im);
imagedestroy($im);
?>