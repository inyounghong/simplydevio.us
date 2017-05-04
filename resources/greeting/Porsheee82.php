<?
session_start();
header('Content-type: image/png');
$visitor = exec("python ../image_with_name.py 'Porsheee'");
$new_message1 = str_replace("visitor",$visitor, 'Welcome to my page, visitor! For your own convenience, my gallery');
$new_message2 = str_replace("visitor",$visitor, 'is stationed above for all your procrastination whims and needs. ');
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
$width  = (35 * strlen($longer_message));
$im = imagecreatetruecolor ($width,200);
$background = imagecolorallocate($im, 157, 14, 14);
imagefill($im,0,0,$background);
$color = imagecolorallocate($im, 255, 255, 255);
imagettftext($im, 40, 0, 98, 76, $color, $font, $new_message1);
imagettftext($im, 40, 0, 98, 149, $color, $font, $new_message2);
imagepng($im);
imagedestroy($im);
?>