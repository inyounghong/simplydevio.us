<?
session_start();
header('Content-type: image/png');
$visitor = exec("python ../image.py 'Cantatus-Promise'");
$new_message1 = str_replace("visitor",$visitor, 'Hey, visitor! Welcome to my page.');
$new_message2 = str_replace("visitor",$visitor, 'Hey, visitor!');
$font = './uploaded_fonts/' . 'brain_flower.ttf';
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
$im = imagecreatetruecolor ($width,50);
$background = imagecolorallocate($im, 0, 0, 0);
imagefill($im,0,0,$background);
$color = imagecolorallocate($im, 255, 136, 0);
imagettftext($im, 31, 0, 0, 20, $color, $font, $new_message1);
imagettftext($im, 31, 0, 0, 50, $color, $font, $new_message2);
imagepng($im);
imagedestroy($im);
?>