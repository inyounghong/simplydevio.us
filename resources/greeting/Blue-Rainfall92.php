<?
session_start();
header('Content-type: image/png');
$visitor = exec("python ../image_with_name.py 'Blue-Rainfall'");
$new_message1 = str_replace("visitor",$visitor, 'I see you there, visitor.');
$new_message2 = str_replace("visitor",$visitor, 'Did you think you could sneak past me?');
$font = './uploaded_fonts/' . 'g_revo.ttf';
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
$width  = (49 * strlen($longer_message));
$im = imagecreatetruecolor ($width,173);
$background = imagecolorallocate($im, 178, 16, 19);
imagefill($im,0,0,$background);
$color = imagecolorallocate($im, 255, 255, 255);
imagettftext($im, 50, 0, 11, 62, $color, $font, $new_message1);
imagettftext($im, 50, 0, 11, 151, $color, $font, $new_message2);
imagepng($im);
imagedestroy($im);
?>