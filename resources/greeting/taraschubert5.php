<?
session_start();
header('Content-type: image/png');
$visitor = exec("python ../image.py 'taraschubert'");
$new_message1 = str_replace("visitor",$visitor, 'Hey, visitor!');
$new_message2 = str_replace("visitor",$visitor, '');
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
$width  = (12 * strlen($longer_message));
$im = imagecreatetruecolor ($width,38);
$background = imagecolorallocate($im, 24, 26, 27);
imagefill($im,0,0,$background);
$color = imagecolorallocate($im, 181, 230, 255);
imagettftext($im, 15, 0, 0, 20, $color, $font, $new_message1);
imagettftext($im, 15, 0, 0, 0, $color, $font, $new_message2);
imagepng($im);
imagedestroy($im);
?>