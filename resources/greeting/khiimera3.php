<?
session_start();
header('Content-type: image/png');
$visitor = exec("python ../image.py 'Khiimera'");
$new_message1 = str_replace("visitor",$visitor, 'Hello hello~ visitor!');
$new_message2 = str_replace("visitor",$visitor, 'Welcome to my page!');
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
$width  = (21 * strlen($longer_message));
$im = imagecreatetruecolor ($width,97);
$background = imagecolorallocate($im, 255, 247, 234);
imagefill($im,0,0,$background);
$color = imagecolorallocate($im, 255, 103, 127);
imagettftext($im, 22, 0, 40, 45, $color, $font, $new_message1);
imagettftext($im, 22, 0, 48, 80, $color, $font, $new_message2);
imagepng($im);
imagedestroy($im);
?>