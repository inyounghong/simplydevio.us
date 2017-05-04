<?
session_start();
header('Content-type: image/png');
$visitor = exec("python ../image_with_name.py 'tori-lopez'");
$new_message1 = str_replace("visitor",$visitor, 'yooo, visitor');
$new_message2 = str_replace("visitor",$visitor, 'what\'s good, fam');
$font = './uploaded_fonts/' . 'nomystery.ttf';
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
$im = imagecreatetruecolor ($width,162);
$background = imagecolorallocate($im, 215, 254, 124);
imagefill($im,0,0,$background);
$color = imagecolorallocate($im, 255, 171, 87);
imagettftext($im, 29, 0, 46, 53, $color, $font, $new_message1);
imagettftext($im, 29, 0, 88, 121, $color, $font, $new_message2);
imagepng($im);
imagedestroy($im);
?>