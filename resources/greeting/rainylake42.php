<?
session_start();
header('Content-type: image/png');
$visitor = exec("python ../image_with_name.py 'rainylake'");
$new_message1 = str_replace("visitor",$visitor, 'Hey, visitor');
$new_message2 = str_replace("visitor",$visitor, 'Welcome to my dA home!');
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
$width  = (15 * strlen($longer_message));
$im = imagecreatetruecolor ($width,79);
$background = imagecolorallocate($im, 34, 35, 70);
imagefill($im,0,0,$background);
$color = imagecolorallocate($im, 255, 255, 255);
imagettftext($im, 18, 0, 112, 32, $color, $font, $new_message1);
imagettftext($im, 18, 0, 30, 60, $color, $font, $new_message2);
imagepng($im);
imagedestroy($im);
?>