<?
session_start();
header('Content-type: image/png');

$visitor = exec("python ../image_with_name.py 'ayecurryan'");
$new_message1 = str_replace("visitor",$visitor, 'Hello visitor <3');
$new_message2 = str_replace("visitor",$visitor, '(●°u°●)​ 」');
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

$width  = (9 * strlen($longer_message));
$im = imagecreatetruecolor ($width,74);
$background = imagecolorallocate($im, 255, 164, 145);
imagefill($im,0,0,$background);

$color = imagecolorallocate($im, 255, 255, 255);

imagettftext($im, 15, 0, 32, 20, $color, $font, $new_message1);
imagettftext($im, 15, 0, 32, 61, $color, $font, $new_message2);

imagepng($im);
imagedestroy($im);

?>