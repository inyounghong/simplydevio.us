<?
session_start();
header('Content-type: image/png');
$visitor = exec("python ../image.py 'candycorms'");
$new_message1 = str_replace("visitor",$visitor, 'visitor');
$new_message2 = str_replace("visitor",$visitor, 'must love candy corn');
$font = './uploaded_fonts/' . 'DoubleFeature20.ttf';
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
$width  = (25 * strlen($longer_message));
$im = imagecreatetruecolor ($width,189);
$background = imagecolorallocate($im, 0, 0, 0);
imagefill($im,0,0,$background);
$color = imagecolorallocate($im, 255, 142, 43);
imagettftext($im, 27, 0, 69, 65, $color, $font, $new_message1);
imagettftext($im, 27, 0, 24, 130, $color, $font, $new_message2);
imagepng($im);
imagedestroy($im);
?>