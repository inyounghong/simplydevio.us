<?
session_start();
header('Content-type: image/png');
$visitor = exec("python ../image.py 'LainyLu'");
$new_message1 = str_replace("visitor",$visitor, 'Sup, visitor ');
$new_message2 = str_replace("visitor",$visitor, 'Welcome to my Page');
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
$width  = (27 * strlen($longer_message));
$im = imagecreatetruecolor ($width,200);
$background = imagecolorallocate($im, 218, 138, 144);
imagefill($im,0,0,$background);
$color = imagecolorallocate($im, 0, 0, 0);
imagettftext($im, 50, 0, 54, 95, $color, $font, $new_message1);
imagettftext($im, 50, 0, 46, 169, $color, $font, $new_message2);
imagepng($im);
imagedestroy($im);
?>