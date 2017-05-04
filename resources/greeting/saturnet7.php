<?
session_start();
header('Content-type: image/png');
$visitor = exec("python ../image.py 'saturnet'");
$new_message1 = str_replace("visitor",$visitor, 'Hey, visitor! Welcome to my page.');
$new_message2 = str_replace("visitor",$visitor, 'Hope you have a nice time looking through my gallery!');
$font = './uploaded_fonts/' . 'brain_flower.ttf';
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
$width  = (50 * strlen($longer_message));
$im = imagecreatetruecolor ($width,94);
$background = imagecolorallocate($im, 119, 118, 156);
imagefill($im,0,0,$background);
$color = imagecolorallocate($im, 255, 255, 255);
imagettftext($im, 43, 0, 83, 16, $color, $font, $new_message1);
imagettftext($im, 43, 0, 88, 50, $color, $font, $new_message2);
imagepng($im);
imagedestroy($im);
?>