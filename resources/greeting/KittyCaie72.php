<?
session_start();
header('Content-type: image/png');

$visitor = exec("python ../image_with_name.py 'KittyCaie'");
$new_message1 = str_replace("visitor",$visitor, 'Hey, visitor');
$new_message2 = str_replace("visitor",$visitor, 'Welcome');
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

$width  = (33 * strlen($longer_message));
$im = imagecreatetruecolor ($width,155);
$background = imagecolorallocate($im, 0, 0, 0);
imagefill($im,0,0,$background);

$color = imagecolorallocate($im, 177, 255, 110);

imagettftext($im, 35, 0, 26, 66, $color, $font, $new_message1);
imagettftext($im, 35, 0, 200, 128, $color, $font, $new_message2);

imagepng($im);
imagedestroy($im);

?>