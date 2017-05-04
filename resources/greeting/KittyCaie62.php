<?
session_start();
header('Content-type: image/png');

$visitor = exec("python ../image_with_name.py 'KittyCaie'");
$new_message1 = str_replace("visitor",$visitor, 'Hey, visitor! ');
$new_message2 = str_replace("visitor",$visitor, 'Welcome to my page =^w^=');
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

$width  = (29 * strlen($longer_message));
$im = imagecreatetruecolor ($width,159);
$background = imagecolorallocate($im, 227, 237, 220);
imagefill($im,0,0,$background);

$color = imagecolorallocate($im, 0, 0, 0);

imagettftext($im, 37, 0, 24, 68, $color, $font, $new_message1);
imagettftext($im, 37, 0, 108, 132, $color, $font, $new_message2);

imagepng($im);
imagedestroy($im);

?>