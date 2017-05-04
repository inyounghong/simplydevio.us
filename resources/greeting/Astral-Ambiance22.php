<?
session_start();
header('Content-type: image/png');
$visitor = exec("python ../image_with_name.py 'Astral-Ambiance'");
$new_message1 = str_replace("visitor",$visitor, 'Hey, visitor!');
$new_message2 = str_replace("visitor",$visitor, 'Welcome To Hell, Enjoy your stay');
$font = './uploaded_fonts/' . 'g_revo.ttf';
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
$width  = (20 * strlen($longer_message));
$im = imagecreatetruecolor ($width,95);
$background = imagecolorallocate($im, 255, 255, 255);
imagefill($im,0,0,$background);
$color = imagecolorallocate($im, 219, 173, 173);
imagettftext($im, 18, 0, 170, 49, $color, $font, $new_message1);
imagettftext($im, 18, 0, 59, 78, $color, $font, $new_message2);
imagepng($im);
imagedestroy($im);
?>