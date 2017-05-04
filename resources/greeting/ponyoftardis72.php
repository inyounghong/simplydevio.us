<?
session_start();
header('Content-type: image/png');
$visitor = exec("python ../image_with_name.py 'ponyoftardis'");
$new_message1 = str_replace("visitor",$visitor, 'I see you visitor B)');
$new_message2 = str_replace("visitor",$visitor, 'Enough your visit! ');
$font = './uploaded_fonts/' . 'cambria.ttc';
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
$width  = (30 * strlen($longer_message));
$im = imagecreatetruecolor ($width,143);
$background = imagecolorallocate($im, 179, 245, 252);
imagefill($im,0,0,$background);
$color = imagecolorallocate($im, 94, 94, 94);
imagettftext($im, 32, 0, 110, 51, $color, $font, $new_message1);
imagettftext($im, 32, 0, 110, 119, $color, $font, $new_message2);
imagepng($im);
imagedestroy($im);
?>