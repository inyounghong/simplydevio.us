<?
session_start();
header('Content-type: image/png');
$visitor = exec("python ../image_with_name.py 'Kyasarinn'");
$new_message1 = str_replace("visitor",$visitor, 'Hey, visitor!');
$new_message2 = str_replace("visitor",$visitor, 'Nice to see you here!');
$font = './uploaded_fonts/' . 'arial.ttf';
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
$width  = (12 * strlen($longer_message));
$im = imagecreatetruecolor ($width,85);
$background = imagecolorallocate($im, 0, 116, 155);
imagefill($im,0,0,$background);
$color = imagecolorallocate($im, 255, 255, 255);
imagettftext($im, 17, 0, 27, 33, $color, $font, $new_message1);
imagettftext($im, 17, 0, 13, 60, $color, $font, $new_message2);
imagepng($im);
imagedestroy($im);
?>