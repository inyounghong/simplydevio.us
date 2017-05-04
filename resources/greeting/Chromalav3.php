<?
session_start();
header('Content-type: image/png');

$visitor = exec("python ../image.py 'Chromalav'");
$new_message1 = str_replace("visitor",$visitor, 'Howdy, visitor!');
$new_message2 = str_replace("visitor",$visitor, 'Welcome to my Deviantart');
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

$width  = (13 * strlen($longer_message));
$im = imagecreatetruecolor ($width,51);
$background = imagecolorallocate($im, 255, 245, 242);
imagefill($im,0,0,$background);

$color = imagecolorallocate($im, 255, 18, 65);

imagettftext($im, 21, 0, 11, 20, $color, $font, $new_message1);
imagettftext($im, 21, 0, 0, 44, $color, $font, $new_message2);

imagepng($im);
imagedestroy($im);

?>