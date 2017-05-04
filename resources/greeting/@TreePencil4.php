<?
session_start();
header('Content-type: image/png');
$visitor = exec("python ../image.py '@TreePencil'");
$new_message1 = str_replace("visitor",$visitor, 'Hello there visitor! I can see you! ');
$new_message2 = str_replace("visitor",$visitor, 'Thank you for visiting my profile, have a nice day!');
$font = './uploaded_fonts/' . 'arial.ttf';
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
$im = imagecreatetruecolor ($width,80);
$background = imagecolorallocate($im, 201, 125, 190);
imagefill($im,0,0,$background);
$color = imagecolorallocate($im, 0, 0, 0);
imagettftext($im, 15, 0, 60, 25, $color, $font, $new_message1);
imagettftext($im, 15, 0, 15, 65, $color, $font, $new_message2);
imagepng($im);
imagedestroy($im);
?>