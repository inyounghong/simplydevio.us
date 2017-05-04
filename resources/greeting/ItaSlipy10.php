<?
session_start();
header('Content-type: image/png');
$visitor = exec("python ../image.py 'ItaSlipy'");
$new_message1 = str_replace("visitor",$visitor, 'Hi, visitor! Thanks for coming!');
$new_message2 = str_replace("visitor",$visitor, 'Take a look arround ♥');
$font = './uploaded_fonts/' . 'arialbd.ttf';
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
$im = imagecreatetruecolor ($width,81);
$background = imagecolorallocate($im, 29, 0, 66);
imagefill($im,0,0,$background);
$color = imagecolorallocate($im, 255, 255, 255);
imagettftext($im, 14, 0, 3, 32, $color, $font, $new_message1);
imagettftext($im, 14, 0, 93, 56, $color, $font, $new_message2);
imagepng($im);
imagedestroy($im);
?>