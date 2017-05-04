<?
session_start();
header('Content-type: image/png');
$visitor = exec("python ../image_with_name.py 'Iycan'");
$new_message1 = str_replace("visitor",$visitor, 'Hey, visitor!');
$new_message2 = str_replace("visitor",$visitor, 'Thanks for stopping by!');
$font = './uploaded_fonts/' . 'brain_flower.ttf';
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
$im = imagecreatetruecolor ($width,63);
$background = imagecolorallocate($im, 6, 194, 207);
imagefill($im,0,0,$background);
$color = imagecolorallocate($im, 0, 0, 0);
imagettftext($im, 23, 0, 37, 27, $color, $font, $new_message1);
imagettftext($im, 23, 0, 14, 53, $color, $font, $new_message2);
imagepng($im);
imagedestroy($im);
?>