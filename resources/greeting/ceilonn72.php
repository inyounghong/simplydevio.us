<?
session_start();
header('Content-type: image/png');
$visitor = exec("python ../image_with_name.py 'ceilonn'");
$new_message1 = str_replace("visitor",$visitor, 'Thanks for visiting, visitor!');
$new_message2 = str_replace("visitor",$visitor, '.');
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
$width  = (10 * strlen($longer_message));
$im = imagecreatetruecolor ($width,34);
$background = imagecolorallocate($im, 201, 14, 27);
imagefill($im,0,0,$background);
$color = imagecolorallocate($im, 250, 250, 250);
imagettftext($im, 9, 0, 57, 22, $color, $font, $new_message1);
imagettftext($im, 9, 0, 69, 186, $color, $font, $new_message2);
imagepng($im);
imagedestroy($im);
?>