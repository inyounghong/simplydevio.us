<?
session_start();
header('Content-type: image/png');
$visitor = exec("python ../image.py 'treepencil'");
$new_message1 = str_replace("visitor",$visitor, 'Hello there,  visitor! I can see you! ');
$new_message2 = str_replace("visitor",$visitor, 'Thank you for visiting my profile, have a nice day!');
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
$width  = (10 * strlen($longer_message));
$im = imagecreatetruecolor ($width,70);
$background = imagecolorallocate($im, 0, 25, 148);
imagefill($im,0,0,$background);
$color = imagecolorallocate($im, 255, 255, 255);
imagettftext($im, 15, 0, 60, 30, $color, $font, $new_message1);
imagettftext($im, 15, 0, 30, 55, $color, $font, $new_message2);
imagepng($im);
imagedestroy($im);
?>