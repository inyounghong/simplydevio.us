<?
session_start();
header('Content-type: image/png');

$visitor = exec("python ../image.py 'CyberToothCat'");
$new_message1 = str_replace("visitor",$visitor, 'Welcome, visitor');
$new_message2 = str_replace("visitor",$visitor, '');
$font = './uploaded_fonts/' . 'arialbd.ttf';

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

$width  = (37 * strlen($longer_message));
$im = imagecreatetruecolor ($width,62);
$background = imagecolorallocate($im, 38, 38, 38);
imagefill($im,0,0,$background);

$color = imagecolorallocate($im, 255, 255, 255);

imagettftext($im, 38, 0, 7, 44, $color, $font, $new_message1);
imagettftext($im, 38, 0, 13, 94, $color, $font, $new_message2);

imagepng($im);
imagedestroy($im);

?>