<?
session_start();
header('Content-type: image/png');
$visitor = exec("python ../image_with_name.py 'KenneDuck'");
$new_message1 = str_replace("visitor",$visitor, 'Hey, visitor!');
$new_message2 = str_replace("visitor",$visitor, 'Fuse with me!');
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
$width  = (27 * strlen($longer_message));
$im = imagecreatetruecolor ($width,75);
$background = imagecolorallocate($im, 0, 0, 130);
imagefill($im,0,0,$background);
$color = imagecolorallocate($im, 255, 255, 255);
imagettftext($im, 22, 0, 11, 34, $color, $font, $new_message1);
imagettftext($im, 22, 0, 32, 65, $color, $font, $new_message2);
imagepng($im);
imagedestroy($im);
?>