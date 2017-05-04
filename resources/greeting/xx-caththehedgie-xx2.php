<?
session_start();
header('Content-type: image/png');
$visitor = exec("python ../image.py 'xx-caththehedgie-xx'");
$new_message1 = str_replace("visitor",$visitor, 'Hey, visitor!');
$new_message2 = str_replace("visitor",$visitor, 'Welcome to my Page!!');
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
$width  = (29 * strlen($longer_message));
$im = imagecreatetruecolor ($width,124);
$background = imagecolorallocate($im, 229, 66, 100);
imagefill($im,0,0,$background);
$color = imagecolorallocate($im, 0, 0, 0);
imagettftext($im, 30, 0, 104, 47, $color, $font, $new_message1);
imagettftext($im, 30, 0, 70, 108, $color, $font, $new_message2);
imagepng($im);
imagedestroy($im);
?>