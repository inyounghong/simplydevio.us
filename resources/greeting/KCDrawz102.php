<?
session_start();
header('Content-type: image/png');
$visitor = exec("python ../image_with_name.py 'KCDrawz'");
$new_message1 = str_replace("visitor",$visitor, 'Welcome visitor!');
$new_message2 = str_replace("visitor",$visitor, 'Welcome visitor!');
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
$width  = (41 * strlen($longer_message));
$im = imagecreatetruecolor ($width,105);
$background = imagecolorallocate($im, 53, 53, 53);
imagefill($im,0,0,$background);
$color = imagecolorallocate($im, 255, 255, 255);
imagettftext($im, 50, 0, 59, 72, $color, $font, $new_message1);
imagettftext($im, 50, 0, 59, 72, $color, $font, $new_message2);
imagepng($im);
imagedestroy($im);
?>