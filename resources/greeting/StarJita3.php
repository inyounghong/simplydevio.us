<?
session_start();
header('Content-type: image/png');
$visitor = exec("python ../image.py 'StarJita'");
$new_message1 = str_replace("visitor",$visitor, '~Hello visitor!~');
$new_message2 = str_replace("visitor",$visitor, '.>. Please enjoy your stay .>.');
$font = './uploaded_fonts/' . 'CHERI___.TTF';
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
$width  = (14 * strlen($longer_message));
$im = imagecreatetruecolor ($width,92);
$background = imagecolorallocate($im, 24, 113, 150);
imagefill($im,0,0,$background);
$color = imagecolorallocate($im, 247, 244, 213);
imagettftext($im, 18, 0, 0, 34, $color, $font, $new_message1);
imagettftext($im, 18, 0, 65, 75, $color, $font, $new_message2);
imagepng($im);
imagedestroy($im);
?>