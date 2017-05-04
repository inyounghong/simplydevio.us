<?
session_start();
header('Content-type: image/png');
$visitor = exec("python ../image.py 'kyasarinn'");
$new_message1 = str_replace("visitor",$visitor, 'Hello, visitor! I am happy, to see you here!');
$new_message2 = str_replace("visitor",$visitor, 'Hey, visitor!');
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
$width  = (23 * strlen($longer_message));
$im = imagecreatetruecolor ($width,76);
$background = imagecolorallocate($im, 218, 228, 217);
imagefill($im,0,0,$background);
$color = imagecolorallocate($im, 0, 0, 0);
imagettftext($im, 33, 0, 0, 41, $color, $font, $new_message1);
imagettftext($im, 33, 0, 200, 200, $color, $font, $new_message2);
imagepng($im);
imagedestroy($im);
?>