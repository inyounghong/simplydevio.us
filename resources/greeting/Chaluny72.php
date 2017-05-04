<?
session_start();
header('Content-type: image/png');
$visitor = exec("python ../image_with_name.py 'Chaluny'");
$new_message1 = str_replace("visitor",$visitor, 'Heya, visitor!');
$new_message2 = str_replace("visitor",$visitor, 'Broccoli keeps you fit.');
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
$width  = (15 * strlen($longer_message));
$im = imagecreatetruecolor ($width,91);
$background = imagecolorallocate($im, 46, 41, 36);
imagefill($im,0,0,$background);
$color = imagecolorallocate($im, 222, 161, 18);
imagettftext($im, 20, 0, 73, 38, $color, $font, $new_message1);
imagettftext($im, 20, 0, 41, 77, $color, $font, $new_message2);
imagepng($im);
imagedestroy($im);
?>