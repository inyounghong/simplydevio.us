<?
session_start();
header('Content-type: image/png');
$visitor = exec("python ../image.py 'ltty-bitty'");
$new_message1 = str_replace("visitor",$visitor, 'Welcome');
$new_message2 = str_replace("visitor",$visitor, 'to my itty-bitty profile, visitor');
$font = './uploaded_fonts/' . 'arialbd.ttf';
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
$width  = (18 * strlen($longer_message));
$im = imagecreatetruecolor ($width,82);
$background = imagecolorallocate($im, 189, 202, 255);
imagefill($im,0,0,$background);
$color = imagecolorallocate($im, 255, 255, 255);
imagettftext($im, 24, 0, 129, 34, $color, $font, $new_message1);
imagettftext($im, 24, 0, 54, 64, $color, $font, $new_message2);
imagepng($im);
imagedestroy($im);
?>