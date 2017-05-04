<?
session_start();
header('Content-type: image/png');
$visitor = exec("python ../image.py 'ciel0nn'");
$new_message1 = str_replace("visitor",$visitor, 'Ahoy, visitor!');
$new_message2 = str_replace("visitor",$visitor, 'Hey, visitor!');
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
$width  = (8 * strlen($longer_message));
$im = imagecreatetruecolor ($width,31);
$background = imagecolorallocate($im, 66, 66, 66);
imagefill($im,0,0,$background);
$color = imagecolorallocate($im, 238, 236, 203);
imagettftext($im, 11, 0, 11, 20, $color, $font, $new_message1);
imagettftext($im, 11, 0, 96, 103, $color, $font, $new_message2);
imagepng($im);
imagedestroy($im);
?>