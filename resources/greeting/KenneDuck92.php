<?
session_start();
header('Content-type: image/png');
$visitor = exec("python ../image_with_name.py 'KenneDuck'");
$new_message1 = str_replace("visitor",$visitor, 'Hey, visitor!');
$new_message2 = str_replace("visitor",$visitor, ' ');
$font = './uploaded_fonts/' . 'trebuc.ttf';
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
$width  = (21 * strlen($longer_message));
$im = imagecreatetruecolor ($width,48);
$background = imagecolorallocate($im, 250, 250, 250);
imagefill($im,0,0,$background);
$color = imagecolorallocate($im, 54, 54, 54);
imagettftext($im, 21, 0, 3, 33, $color, $font, $new_message1);
imagettftext($im, 21, 0, 11, 44, $color, $font, $new_message2);
imagepng($im);
imagedestroy($im);
?>