<?
session_start();
header('Content-type: image/png');
$visitor = exec("python ../image_with_name.py 'Kyasarinn'");
$new_message1 = str_replace("visitor",$visitor, 'Hey, visitor! Nice to see you here!');
$new_message2 = str_replace("visitor",$visitor, '');
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
$im = imagecreatetruecolor ($width,46);
$background = imagecolorallocate($im, 218, 228, 217);
imagefill($im,0,0,$background);
$color = imagecolorallocate($im, 44, 54, 53);
imagettftext($im, 20, 0, 0, 20, $color, $font, $new_message1);
imagettftext($im, 20, 0, 0, 50, $color, $font, $new_message2);
imagepng($im);
imagedestroy($im);
?>