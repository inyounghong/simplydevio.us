<?
session_start();
header('Content-type: image/png');
$visitor = exec("python ../image.py 'ciel0nn'");
$new_message1 = str_replace("visitor",$visitor, 'Hey, visitor!');
$new_message2 = str_replace("visitor",$visitor, 'Hey, visitor!');
$font = './uploaded_fonts/' . 'opensans.ttf';
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
$im = imagecreatetruecolor ($width,35);
$background = imagecolorallocate($im, 33, 118, 113);
imagefill($im,0,0,$background);
$color = imagecolorallocate($im, 230, 205, 125);
imagettftext($im, 13, 0, 29, 24, $color, $font, $new_message1);
imagettftext($im, 13, 0, 200, 177, $color, $font, $new_message2);
imagepng($im);
imagedestroy($im);
?>