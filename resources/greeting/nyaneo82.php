<?
session_start();
header('Content-type: image/png');
$visitor = exec("python ../image_with_name.py 'nyaneo'");
$new_message1 = str_replace("visitor",$visitor, 'Hello, visitor!');
$new_message2 = str_replace("visitor",$visitor, 'Hi, visitor!');
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
$width  = (18 * strlen($longer_message));
$im = imagecreatetruecolor ($width,77);
$background = imagecolorallocate($im, 255, 255, 255);
imagefill($im,0,0,$background);
$color = imagecolorallocate($im, 0, 0, 0);
imagettftext($im, 38, 0, 67, 193, $color, $font, $new_message1);
imagettftext($im, 38, 0, 69, 50, $color, $font, $new_message2);
imagepng($im);
imagedestroy($im);
?>