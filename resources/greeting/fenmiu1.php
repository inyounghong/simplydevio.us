<?
session_start();
header('Content-type: image/png');
$visitor = exec("python ../image.py 'fenmiu'");
$new_message1 = str_replace("visitor",$visitor, 'Ahoy, visitor!');
$new_message2 = str_replace("visitor",$visitor, 'I hope you are having a lovely day!');
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
$width  = (9 * strlen($longer_message));
$im = imagecreatetruecolor ($width,57);
$background = imagecolorallocate($im, 255, 253, 194);
imagefill($im,0,0,$background);
$color = imagecolorallocate($im, 255, 38, 38);
imagettftext($im, 13, 0, 75, 20, $color, $font, $new_message1);
imagettftext($im, 13, 0, 19, 50, $color, $font, $new_message2);
imagepng($im);
imagedestroy($im);
?>