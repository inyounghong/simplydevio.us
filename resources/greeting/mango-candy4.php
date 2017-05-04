<?
session_start();
header('Content-type: image/png');
$visitor = exec("python ../image.py 'mango-candy'");
$new_message1 = str_replace("visitor",$visitor, 'hey, visitor!');
$new_message2 = str_replace("visitor",$visitor, 'welcome to my page!');
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
$width  = (25 * strlen($longer_message));
$im = imagecreatetruecolor ($width,153);
$background = imagecolorallocate($im, 255, 191, 217);
imagefill($im,0,0,$background);
$color = imagecolorallocate($im, 255, 242, 247);
imagettftext($im, 25, 0, 25, 60, $color, $font, $new_message1);
imagettftext($im, 25, 0, 25, 115, $color, $font, $new_message2);
imagepng($im);
imagedestroy($im);
?>