<?
session_start();
header('Content-type: image/png');
$visitor = exec("python ../image.py 'xX-CathTheHedgie-Xx'");
$new_message1 = str_replace("visitor",$visitor, 'Hey,visitor!');
$new_message2 = str_replace("visitor",$visitor, 'Welcome,to,my,page!');
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
$width  = (19 * strlen($longer_message));
$im = imagecreatetruecolor ($width,89);
$background = imagecolorallocate($im, 218, 228, 217);
imagefill($im,0,0,$background);
$color = imagecolorallocate($im, 0, 0, 0);
imagettftext($im, 24, 0, 4, 41, $color, $font, $new_message1);
imagettftext($im, 24, 0, 3, 69, $color, $font, $new_message2);
imagepng($im);
imagedestroy($im);
?>