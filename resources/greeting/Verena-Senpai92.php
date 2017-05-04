<?
session_start();
header('Content-type: image/png');
$visitor = exec("python ../image_with_name.py 'Verena-Senpai'");
$new_message1 = str_replace("visitor",$visitor, 'Hi, visitor!');
$new_message2 = str_replace("visitor",$visitor, 'Welcome to my page! <3');
$font = './uploaded_fonts/' . 'ComingSoon.ttf';
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
$im = imagecreatetruecolor ($width,157);
$background = imagecolorallocate($im, 224, 224, 224);
imagefill($im,0,0,$background);
$color = imagecolorallocate($im, 68, 68, 68);
imagettftext($im, 24, 0, 112, 54, $color, $font, $new_message1);
imagettftext($im, 24, 0, 72, 103, $color, $font, $new_message2);
imagepng($im);
imagedestroy($im);
?>