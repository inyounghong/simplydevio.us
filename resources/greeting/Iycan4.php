<?
session_start();
header('Content-type: image/png');
$visitor = exec("python ../image.py 'Iycan'");
$new_message1 = str_replace("visitor",$visitor, 'Hey there');
$new_message2 = str_replace("visitor",$visitor, 'visitor !!!');
$font = './uploaded_fonts/' . 'CHERI___.TTF';
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
$width  = (33 * strlen($longer_message));
$im = imagecreatetruecolor ($width,94);
$background = imagecolorallocate($im, 255, 158, 165);
imagefill($im,0,0,$background);
$color = imagecolorallocate($im, 255, 245, 251);
imagettftext($im, 29, 0, 54, 34, $color, $font, $new_message1);
imagettftext($im, 29, 0, 133, 84, $color, $font, $new_message2);
imagepng($im);
imagedestroy($im);
?>