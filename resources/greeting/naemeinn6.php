<?
session_start();
header('Content-type: image/png');
$visitor = exec("python ../image.py 'naemeinn'");
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
$width  = (28 * strlen($longer_message));
$im = imagecreatetruecolor ($width,119);
$background = imagecolorallocate($im, 247, 177, 124);
imagefill($im,0,0,$background);
$color = imagecolorallocate($im, 255, 218, 145);
imagettftext($im, 28, 0, 88, 106, $color, $font, $new_message1);
imagettftext($im, 28, 0, 93, 99, $color, $font, $new_message2);
imagepng($im);
imagedestroy($im);
?>