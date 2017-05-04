<?
session_start();
header('Content-type: image/png');
$visitor = exec("python ../image_with_name.py 'SnowbalI'");
$new_message1 = str_replace("visitor",$visitor, 'Hope you brought a coat');
$new_message2 = str_replace("visitor",$visitor, 'here, visitor');
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
$width  = (22 * strlen($longer_message));
$im = imagecreatetruecolor ($width,160);
$background = imagecolorallocate($im, 250, 250, 250);
imagefill($im,0,0,$background);
$color = imagecolorallocate($im, 212, 212, 212);
imagettftext($im, 23, 0, 20, 60, $color, $font, $new_message1);
imagettftext($im, 23, 0, 22, 123, $color, $font, $new_message2);
imagepng($im);
imagedestroy($im);
?>