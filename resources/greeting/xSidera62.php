<?
session_start();
header('Content-type: image/png');
$visitor = exec("python ../image_with_name.py 'xSidera'");
$new_message1 = str_replace("visitor",$visitor, 'Hello, visitor!');
$new_message2 = str_replace("visitor",$visitor, 'My name is Sidera, welcome to my page!');
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
$width  = (13 * strlen($longer_message));
$im = imagecreatetruecolor ($width,91);
$background = imagecolorallocate($im, 132, 232, 175);
imagefill($im,0,0,$background);
$color = imagecolorallocate($im, 255, 255, 255);
imagettftext($im, 27, 0, 0, 43, $color, $font, $new_message1);
imagettftext($im, 27, 0, 0, 71, $color, $font, $new_message2);
imagepng($im);
imagedestroy($im);
?>