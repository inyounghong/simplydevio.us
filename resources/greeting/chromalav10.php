<?
session_start();
header('Content-type: image/png');

$visitor = exec("python ../image.py 'Chromalav'");
$new_message1 = str_replace("visitor",$visitor, 'Hey, visitor!');
$new_message2 = str_replace("visitor",$visitor, 'Welcome to my Deviantart!');
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

$width  = (11 * strlen($longer_message));
$im = imagecreatetruecolor ($width,48);
$background = imagecolorallocate($im, 247, 247, 247);
imagefill($im,0,0,$background);

$color = imagecolorallocate($im, 255, 0, 76);

imagettftext($im, 18, 0, 22, 23, $color, $font, $new_message1);
imagettftext($im, 18, 0, 0, 40, $color, $font, $new_message2);

imagepng($im);
imagedestroy($im);

?>