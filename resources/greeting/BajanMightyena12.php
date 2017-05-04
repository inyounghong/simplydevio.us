<?
session_start();
header('Content-type: image/png');
$visitor = exec("python ../image_with_name.py 'BajanMightyena'");
$new_message1 = str_replace("visitor",$visitor, 'Welcome, visitor!');
$new_message2 = str_replace("visitor",$visitor, 'You are in the wastelands! Enjoy your sojourn.');
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
$width  = (12 * strlen($longer_message));
$im = imagecreatetruecolor ($width,100);
$background = imagecolorallocate($im, 55, 37, 41);
imagefill($im,0,0,$background);
$color = imagecolorallocate($im, 213, 174, 140);
imagettftext($im, 18, 0, 109, 45, $color, $font, $new_message1);
imagettftext($im, 18, 0, 27, 77, $color, $font, $new_message2);
imagepng($im);
imagedestroy($im);
?>