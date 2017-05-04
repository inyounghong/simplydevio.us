<?
session_start();
header('Content-type: image/png');

$visitor = exec("python ../image.py 'silversummersong'");
$new_message1 = str_replace("visitor",$visitor, 'Welcome,visitor! Make yourself at home!');
$new_message2 = str_replace("visitor",$visitor, 'No need to thank me for watches, favorites, or llamas!');
$font = './uploaded_fonts/' . 'Monotype Corsiva.ttf';

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

$width  = (15 * strlen($longer_message));
$im = imagecreatetruecolor ($width,88);
$background = imagecolorallocate($im, 122, 62, 72);
imagefill($im,0,0,$background);

$color = imagecolorallocate($im, 255, 255, 255);

imagettftext($im, 24, 0, 75, 39, $color, $font, $new_message1);
imagettftext($im, 24, 0, 72, 75, $color, $font, $new_message2);

imagepng($im);
imagedestroy($im);

?>