<?
session_start();
header('Content-type: image/png');
$visitor = exec("python ../image.py 'iciscle'");
$new_message1 = str_replace("visitor",$visitor, 'YOOOO');
$new_message2 = str_replace("visitor",$visitor, 'visitor!!!');
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
$width  = (46 * strlen($longer_message));
$im = imagecreatetruecolor ($width,165);
$background = imagecolorallocate($im, 46, 55, 53);
imagefill($im,0,0,$background);
$color = imagecolorallocate($im, 255, 255, 255);
imagettftext($im, 26, 0, 38, 93, $color, $font, $new_message1);
imagettftext($im, 26, 0, 200, 122, $color, $font, $new_message2);
imagepng($im);
imagedestroy($im);
?>