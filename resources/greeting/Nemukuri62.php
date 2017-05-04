<?
session_start();
header('Content-type: image/png');
$visitor = exec("python ../image_with_name.py 'Nemukuri'");
$new_message1 = str_replace("visitor",$visitor, 'Hoi, visitor!');
$new_message2 = str_replace("visitor",$visitor, 'Welcome to the Chestnut Tree!');
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
$width  = (13 * strlen($longer_message));
$im = imagecreatetruecolor ($width,79);
$background = imagecolorallocate($im, 232, 143, 104);
imagefill($im,0,0,$background);
$color = imagecolorallocate($im, 161, 66, 26);
imagettftext($im, 15, 0, 37, 28, $color, $font, $new_message1);
imagettftext($im, 15, 0, 35, 62, $color, $font, $new_message2);
imagepng($im);
imagedestroy($im);
?>