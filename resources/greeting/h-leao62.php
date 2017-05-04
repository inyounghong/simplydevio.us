<?
session_start();
header('Content-type: image/png');

$visitor = exec("python ../image_with_name.py 'h-leao'");
$new_message1 = str_replace("visitor",$visitor, 'Hello visitor, ');
$new_message2 = str_replace("visitor",$visitor, 'Im glad you came!');
$font = './uploaded_fonts/' . 'opensans.ttf';

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
$im = imagecreatetruecolor ($width,127);
$background = imagecolorallocate($im, 255, 200, 18);
imagefill($im,0,0,$background);

$color = imagecolorallocate($im, 0, 0, 0);

imagettftext($im, 21, 0, 20, 32, $color, $font, $new_message1);
imagettftext($im, 21, 0, 18, 76, $color, $font, $new_message2);

imagepng($im);
imagedestroy($im);

?>