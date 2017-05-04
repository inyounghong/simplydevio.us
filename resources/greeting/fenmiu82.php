<?
session_start();
header('Content-type: image/png');
$visitor = exec("python ../image_with_name.py 'fenmiu'");
$new_message1 = str_replace("visitor",$visitor, 'hi, visitor! ');
$new_message2 = str_replace("visitor",$visitor, 'have a lovely day!');
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
$width  = (11 * strlen($longer_message));
$im = imagecreatetruecolor ($width,56);
$background = imagecolorallocate($im, 214, 250, 255);
imagefill($im,0,0,$background);
$color = imagecolorallocate($im, 108, 130, 163);
imagettftext($im, 15, 0, 25, 20, $color, $font, $new_message1);
imagettftext($im, 15, 0, 19, 50, $color, $font, $new_message2);
imagepng($im);
imagedestroy($im);
?>