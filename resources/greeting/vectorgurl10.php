<?
session_start();
header('Content-type: image/png');
$visitor = exec("python ../image.py 'vectorgurl'");
$new_message1 = str_replace("visitor",$visitor, 'Hi, visitor!');
$new_message2 = str_replace("visitor",$visitor, '.');
$font = './uploaded_fonts/' . 'georgia.ttf';
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
$width  = (30 * strlen($longer_message));
$im = imagecreatetruecolor ($width,61);
$background = imagecolorallocate($im, 208, 220, 236);
imagefill($im,0,0,$background);
$color = imagecolorallocate($im, 255, 255, 255);
imagettftext($im, 41, 0, 35, 48, $color, $font, $new_message1);
imagettftext($im, 41, 0, 38, 101, $color, $font, $new_message2);
imagepng($im);
imagedestroy($im);
?>