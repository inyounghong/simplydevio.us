<?
session_start();
header('Content-type: image/png');
$visitor = exec("python ../image.py 'sixuri'");
$new_message1 = str_replace("visitor",$visitor, 'Welcome, visitor!');
$new_message2 = str_replace("visitor",$visitor, 'I hope you like my art!');
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
$width  = (24 * strlen($longer_message));
$im = imagecreatetruecolor ($width,142);
$background = imagecolorallocate($im, 255, 255, 255);
imagefill($im,0,0,$background);
$color = imagecolorallocate($im, 247, 117, 152);
imagettftext($im, 31, 0, 67, 62, $color, $font, $new_message1);
imagettftext($im, 31, 0, 72, 114, $color, $font, $new_message2);
imagepng($im);
imagedestroy($im);
?>