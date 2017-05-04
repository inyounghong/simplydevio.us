<?
session_start();
header('Content-type: image/png');
$visitor = exec("python ../image_with_name.py 'ChezzyEm'");
$new_message1 = str_replace("visitor",$visitor, 'G\\\\\\\'day, visitor!');
$new_message2 = str_replace("visitor",$visitor, 'Welcome to my wonderful page!');
$font = './uploaded_fonts/' . 'ComingSoon.ttf';
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
$im = imagecreatetruecolor ($width,80);
$background = imagecolorallocate($im, 255, 247, 180);
imagefill($im,0,0,$background);
$color = imagecolorallocate($im, 189, 45, 185);
imagettftext($im, 21, 0, 80, 28, $color, $font, $new_message1);
imagettftext($im, 21, 0, 0, 68, $color, $font, $new_message2);
imagepng($im);
imagedestroy($im);
?>