<?
session_start();
header('Content-type: image/png');
$visitor = exec("python ../image.py 'StarryEyedRomantic'");
$new_message1 = str_replace("visitor",$visitor, 'Hey, star child!');
$new_message2 = str_replace("visitor",$visitor, 'Thanks for stopping by! <3');
$font = './uploaded_fonts/' . 'trebuc.ttf';
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
$width  = (24 * strlen($longer_message));
$im = imagecreatetruecolor ($width,124);
$background = imagecolorallocate($im, 255, 0, 153);
imagefill($im,0,0,$background);
$color = imagecolorallocate($im, 255, 255, 255);
imagettftext($im, 31, 0, 14, 45, $color, $font, $new_message1);
imagettftext($im, 31, 0, 38, 93, $color, $font, $new_message2);
imagepng($im);
imagedestroy($im);
?>