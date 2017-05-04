<?
session_start();
header('Content-type: image/png');
$visitor = exec("python ../image_with_name.py 'Alkraas'");
$new_message1 = str_replace("visitor",$visitor, 'Nice to meet you.');
$new_message2 = str_replace("visitor",$visitor, 'Hello visitor');
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
$width  = (28 * strlen($longer_message));
$im = imagecreatetruecolor ($width,119);
$background = imagecolorallocate($im, 14, 14, 14);
imagefill($im,0,0,$background);
$color = imagecolorallocate($im, 85, 170, 255);
imagettftext($im, 30, 0, 42, 97, $color, $font, $new_message1);
imagettftext($im, 30, 0, 42, 43, $color, $font, $new_message2);
imagepng($im);
imagedestroy($im);
?>