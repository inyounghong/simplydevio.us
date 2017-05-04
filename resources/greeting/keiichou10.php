<?
session_start();
header('Content-type: image/png');

$visitor = exec("python ../image.py 'keiichou'");
$new_message1 = str_replace("visitor",$visitor, 'Thanks for dropping by,  visitor!');
$new_message2 = str_replace("visitor",$visitor, '');
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

$width  = (14 * strlen($longer_message));
$im = imagecreatetruecolor ($width,46);
$background = imagecolorallocate($im, 246, 246, 246);
imagefill($im,0,0,$background);

$color = imagecolorallocate($im, 82, 156, 161);

imagettftext($im, 9, 0, 106, 24, $color, $font, $new_message1);
imagettftext($im, 9, 0, 0, 50, $color, $font, $new_message2);

imagepng($im);
imagedestroy($im);

?>