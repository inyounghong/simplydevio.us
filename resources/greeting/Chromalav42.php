<?
session_start();
header('Content-type: image/png');

$visitor = exec("python ../image_with_name.py 'Chromalav'");
$new_message1 = str_replace("visitor",$visitor, 'Hello, visitor~!');
$new_message2 = str_replace("visitor",$visitor, '');
$font = './uploaded_fonts/' . 'Lobster.ttf';

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
$im = imagecreatetruecolor ($width,50);
$background = imagecolorallocate($im, 71, 71, 71);
imagefill($im,0,0,$background);

$color = imagecolorallocate($im, 255, 3, 162);

imagettftext($im, 21, 0, 0, 50, $color, $font, $new_message1);
imagettftext($im, 21, 0, 0, 50, $color, $font, $new_message2);

imagepng($im);
imagedestroy($im);

?>