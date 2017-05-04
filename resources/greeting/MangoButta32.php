<?
session_start();
header('Content-type: image/png');

$visitor = exec("python ../image_with_name.py 'MangoButta'");
$new_message1 = str_replace("visitor",$visitor, 'Hey, visitor!');
$new_message2 = str_replace("visitor",$visitor, 'Welcome to my page!');
$font = './uploaded_fonts/' . 'nomystery.ttf';

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

$width  = (26 * strlen($longer_message));
$im = imagecreatetruecolor ($width,152);
$background = imagecolorallocate($im, 212, 254, 133);
imagefill($im,0,0,$background);

$color = imagecolorallocate($im, 255, 167, 99);

imagettftext($im, 30, 0, 20, 60, $color, $font, $new_message1);
imagettftext($im, 30, 0, 20, 121, $color, $font, $new_message2);

imagepng($im);
imagedestroy($im);

?>