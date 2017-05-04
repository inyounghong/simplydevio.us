<?
session_start();
header('Content-type: image/png');

$visitor = exec("python ../image.py 'twofaceddesigns'");
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

$width  = (13 * strlen($longer_message));
$im = imagecreatetruecolor ($width,59);
$background = imagecolorallocate($im, 252, 252, 252);
imagefill($im,0,0,$background);

$color = imagecolorallocate($im, 255, 0, 119);

imagettftext($im, 18, 0, 32, 20, $color, $font, $new_message1);
imagettftext($im, 18, 0, 0, 50, $color, $font, $new_message2);

imagepng($im);
imagedestroy($im);

?>