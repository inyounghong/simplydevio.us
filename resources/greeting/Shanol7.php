<?
session_start();
header('Content-type: image/png');
$visitor = exec("python ../image.py 'Shanol'");
$new_message1 = str_replace("visitor",$visitor, '[ Greetings, dear visitor...');
$new_message2 = str_replace("visitor",$visitor, 'i am glad you stopped by. ]');
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
$width  = (12 * strlen($longer_message));
$im = imagecreatetruecolor ($width,70);
$background = imagecolorallocate($im, 27, 31, 34);
imagefill($im,0,0,$background);
$color = imagecolorallocate($im, 193, 200, 222);
imagettftext($im, 25, 0, 48, 35, $color, $font, $new_message1);
imagettftext($im, 25, 0, 73, 64, $color, $font, $new_message2);
imagepng($im);
imagedestroy($im);
?>