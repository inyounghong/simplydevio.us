<?
session_start();
header('Content-type: image/png');
$visitor = exec("python ../image.py 'Alkasay'");
$new_message1 = str_replace("visitor",$visitor, 'Hey, visitor!');
$new_message2 = str_replace("visitor",$visitor, 'I am really glad to see you here, enjoy your time. ~Alka');
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
$width  = (14 * strlen($longer_message));
$im = imagecreatetruecolor ($width,91);
$background = imagecolorallocate($im, 135, 32, 70);
imagefill($im,0,0,$background);
$color = imagecolorallocate($im, 242, 240, 255);
imagettftext($im, 20, 0, 200, 31, $color, $font, $new_message1);
imagettftext($im, 20, 0, 42, 70, $color, $font, $new_message2);
imagepng($im);
imagedestroy($im);
?>