<?
session_start();
header('Content-type: image/png');
$visitor = exec("python ../image.py 'Qi-Adoptables'");
$new_message1 = str_replace("visitor",$visitor, 'Hey, visitor!');
$new_message2 = str_replace("visitor",$visitor, 'Welcome to my profile!');
$font = './uploaded_fonts/' . 'g_revo.ttf';
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
$width  = (26 * strlen($longer_message));
$im = imagecreatetruecolor ($width,167);
$background = imagecolorallocate($im, 255, 120, 156);
imagefill($im,0,0,$background);
$color = imagecolorallocate($im, 255, 255, 255);
imagettftext($im, 25, 0, 155, 75, $color, $font, $new_message1);
imagettftext($im, 25, 0, 50, 115, $color, $font, $new_message2);
imagepng($im);
imagedestroy($im);
?>