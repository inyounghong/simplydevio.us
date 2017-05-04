<?
session_start();
header('Content-type: image/png');

$visitor = exec("python ../image_with_name.py 'LunaticWinter'");
$new_message1 = str_replace("visitor",$visitor, 'Hey, visitor!');
$new_message2 = str_replace("visitor",$visitor, 'Welcome to my page! <3');
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

$width  = (40 * strlen($longer_message));
$im = imagecreatetruecolor ($width,181);
$background = imagecolorallocate($im, 255, 249, 232);
imagefill($im,0,0,$background);

$color = imagecolorallocate($im, 0, 0, 0);

imagettftext($im, 45, 0, 99, 70, $color, $font, $new_message1);
imagettftext($im, 45, 0, 99, 150, $color, $font, $new_message2);

imagepng($im);
imagedestroy($im);

?>