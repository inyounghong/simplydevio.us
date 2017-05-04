<?
session_start();
header('Content-type: image/png');
$visitor = exec("python ../image_with_name.py 'silversummersong'");
$new_message1 = str_replace("visitor",$visitor, 'Welcome visitor!');
$new_message2 = str_replace("visitor",$visitor, 'Grab a cookie and make yourself at home!');
$font = './uploaded_fonts/' . 'Monotype Corsiva.ttf';
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
$im = imagecreatetruecolor ($width,87);
$background = imagecolorallocate($im, 217, 238, 229);
imagefill($im,0,0,$background);
$color = imagecolorallocate($im, 144, 147, 144);
imagettftext($im, 18, 0, 73, 28, $color, $font, $new_message1);
imagettftext($im, 18, 0, 0, 64, $color, $font, $new_message2);
imagepng($im);
imagedestroy($im);
?>