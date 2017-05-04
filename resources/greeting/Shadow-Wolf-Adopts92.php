<?
session_start();
header('Content-type: image/png');

$visitor = exec("python ../image_with_name.py 'Shadow-Wolf-Adopts'");
$new_message1 = str_replace("visitor",$visitor, 'Greetings, visitor!');
$new_message2 = str_replace("visitor",$visitor, 'Welcome to my page.~');
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

$width  = (23 * strlen($longer_message));
$im = imagecreatetruecolor ($width,103);
$background = imagecolorallocate($im, 255, 148, 25);
imagefill($im,0,0,$background);

$color = imagecolorallocate($im, 43, 43, 43);

imagettftext($im, 26, 0, 11, 35, $color, $font, $new_message1);
imagettftext($im, 26, 0, 13, 77, $color, $font, $new_message2);

imagepng($im);
imagedestroy($im);

?>