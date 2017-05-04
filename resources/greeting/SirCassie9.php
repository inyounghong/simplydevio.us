<?
session_start();
header('Content-type: image/png');
$visitor = exec("python ../image.py 'SirCassie'");
$new_message1 = str_replace("visitor",$visitor, 'Hey, visitor!');
$new_message2 = str_replace("visitor",$visitor, 'Welcome to my dA home!');
$font = './uploaded_fonts/' . 'Lobster.ttf';
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
$width  = (24 * strlen($longer_message));
$im = imagecreatetruecolor ($width,194);
$background = imagecolorallocate($im, 77, 92, 122);
imagefill($im,0,0,$background);
$color = imagecolorallocate($im, 255, 240, 254);
imagettftext($im, 32, 0, 2, 37, $color, $font, $new_message1);
imagettftext($im, 32, 0, 74, 172, $color, $font, $new_message2);
imagepng($im);
imagedestroy($im);
?>