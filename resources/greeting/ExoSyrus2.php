<?
session_start();
header('Content-type: image/png');
$visitor = exec("python ../image.py 'ExoSyrus'");
$new_message1 = str_replace("visitor",$visitor, 'Hey, visitor!');
$new_message2 = str_replace("visitor",$visitor, 'Hey, visitor!');
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
$width  = (22 * strlen($longer_message));
$im = imagecreatetruecolor ($width,50);
$background = imagecolorallocate($im, 41, 19, 74);
imagefill($im,0,0,$background);
$color = imagecolorallocate($im, 232, 42, 181);
imagettftext($im, 36, 0, 49, 36, $color, $font, $new_message1);
imagettftext($im, 36, 0, 49, 36, $color, $font, $new_message2);
imagepng($im);
imagedestroy($im);
?>