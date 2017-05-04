<?
session_start();
header('Content-type: image/png');
$visitor = exec("python ../image_with_name.py 'tuwka'");
$new_message1 = str_replace("visitor",$visitor, 'Hello, visitor!');
$new_message2 = str_replace("visitor",$visitor, '');
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
$width  = (10 * strlen($longer_message));
$im = imagecreatetruecolor ($width,50);
$background = imagecolorallocate($im, 218, 228, 217);
imagefill($im,0,0,$background);
$color = imagecolorallocate($im, 67, 92, 68);
imagettftext($im, 15, 0, 0, 30, $color, $font, $new_message1);
imagettftext($im, 15, 0, 0, 40, $color, $font, $new_message2);
imagepng($im);
imagedestroy($im);
?>