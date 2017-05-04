<?
session_start();
header('Content-type: image/png');
$visitor = exec("python ../image_with_name.py 'Poke-Chann'");
$new_message1 = str_replace("visitor",$visitor, 'Whats up, visitor?');
$new_message2 = str_replace("visitor",$visitor, '');
$font = './uploaded_fonts/' . 'ARBERKLEY.ttf';
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
$im = imagecreatetruecolor ($width,10);
$background = imagecolorallocate($im, 255, 255, 255);
imagefill($im,0,0,$background);
$color = imagecolorallocate($im, 125, 47, 63);
imagettftext($im, 10, 0, 0, 20, $color, $font, $new_message1);
imagettftext($im, 10, 0, 0, 50, $color, $font, $new_message2);
imagepng($im);
imagedestroy($im);
?>