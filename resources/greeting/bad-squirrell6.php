<?
session_start();
header('Content-type: image/png');

$visitor = exec("python ../image.py 'bad-squirrell'");
$new_message1 = str_replace("visitor",$visitor, 'Hey, visitor!');
$new_message2 = str_replace("visitor",$visitor, 'Thanks for having a look at my page!');
$font = './uploaded_fonts/' . 'ComingSoon.ttf';

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
$im = imagecreatetruecolor ($width,90);
$background = imagecolorallocate($im, 15, 9, 73);
imagefill($im,0,0,$background);

$color = imagecolorallocate($im, 255, 255, 255);

imagettftext($im, 20, 0, 31, 24, $color, $font, $new_message1);
imagettftext($im, 20, 0, 31, 50, $color, $font, $new_message2);

imagepng($im);
imagedestroy($im);

?>