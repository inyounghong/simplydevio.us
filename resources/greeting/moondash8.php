<?
session_start();
header('Content-type: image/png');
$visitor = exec("python ../image.py 'moondash'");
$new_message1 = str_replace("visitor",$visitor, 'Hey, visitor!');
$new_message2 = str_replace("visitor",$visitor, 'Welcome to my page.');
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
$width  = (32 * strlen($longer_message));
$im = imagecreatetruecolor ($width,62);
$background = imagecolorallocate($im, 232, 240, 236);
imagefill($im,0,0,$background);
$color = imagecolorallocate($im, 30, 40, 39);
imagettftext($im, 22, 0, 97, 21, $color, $font, $new_message1);
imagettftext($im, 22, 0, 65, 45, $color, $font, $new_message2);
imagepng($im);
imagedestroy($im);
?>