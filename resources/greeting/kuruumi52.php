<?
session_start();
header('Content-type: image/png');
$visitor = exec("python ../image_with_name.py 'kuruumi'");
$new_message1 = str_replace("visitor",$visitor, 'Hello there, visitor!');
$new_message2 = str_replace("visitor",$visitor, ' ');
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
$width  = (20 * strlen($longer_message));
$im = imagecreatetruecolor ($width,48);
$background = imagecolorallocate($im, 255, 255, 255);
imagefill($im,0,0,$background);
$color = imagecolorallocate($im, 197, 176, 195);
imagettftext($im, 19, 0, 0, 34, $color, $font, $new_message1);
imagettftext($im, 19, 0, 0, 50, $color, $font, $new_message2);
imagepng($im);
imagedestroy($im);
?>