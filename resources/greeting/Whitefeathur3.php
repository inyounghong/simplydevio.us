<?
session_start();
header('Content-type: image/png');

$visitor = exec("python ../image.py 'Whitefeathur'");
$new_message1 = str_replace("visitor",$visitor, 'Welcome to my page! ');
$new_message2 = str_replace("visitor",$visitor, '');
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

$width  = (17 * strlen($longer_message));
$im = imagecreatetruecolor ($width,50);
$background = imagecolorallocate($im, 106, 179, 235);
imagefill($im,0,0,$background);

$color = imagecolorallocate($im, 171, 255, 244);

imagettftext($im, 22, 0, 20, 33, $color, $font, $new_message1);
imagettftext($im, 22, 0, 37, 18, $color, $font, $new_message2);

imagepng($im);
imagedestroy($im);

?>