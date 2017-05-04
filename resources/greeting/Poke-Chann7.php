<?
session_start();
header('Content-type: image/png');
$visitor = exec("python ../image.py 'Poke-Chann'");
$new_message1 = str_replace("visitor",$visitor, 'Whats up, visitor?');
$new_message2 = str_replace("visitor",$visitor, '');
$font = './uploaded_fonts/' . 'Storyboo.TTF';
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
$im = imagecreatetruecolor ($width,29);
$background = imagecolorallocate($im, 255, 255, 255);
imagefill($im,0,0,$background);
$color = imagecolorallocate($im, 138, 80, 105);
imagettftext($im, 15, 0, 0, 20, $color, $font, $new_message1);
imagettftext($im, 15, 0, 0, 50, $color, $font, $new_message2);
imagepng($im);
imagedestroy($im);
?>