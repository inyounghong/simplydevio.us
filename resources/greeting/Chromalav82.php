<?
session_start();
header('Content-type: image/png');

$visitor = exec("python ../image_with_name.py 'Chromalav'");
$new_message1 = str_replace("visitor",$visitor, 'Howdy, visitor!');
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

$width  = (12 * strlen($longer_message));
$im = imagecreatetruecolor ($width,60);
$background = imagecolorallocate($im, 247, 242, 240);
imagefill($im,0,0,$background);

$color = imagecolorallocate($im, 255, 0, 136);

imagettftext($im, 21, 0, 57, 20, $color, $font, $new_message1);
imagettftext($im, 21, 0, 0, 50, $color, $font, $new_message2);

imagepng($im);
imagedestroy($im);

?>