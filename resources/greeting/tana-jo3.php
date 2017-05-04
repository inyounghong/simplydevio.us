<?
session_start();
header('Content-type: image/png');
$visitor = exec("python ../image.py 'TaNa-Jo'");
$new_message1 = str_replace("visitor",$visitor, 'Hi, visitor!');
$new_message2 = str_replace("visitor",$visitor, 'Hey, visitor!');
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
$width  = (14 * strlen($longer_message));
$im = imagecreatetruecolor ($width,31);
$background = imagecolorallocate($im, 244, 244, 244);
imagefill($im,0,0,$background);
$color = imagecolorallocate($im, 164, 165, 204);
imagettftext($im, 15, 0, 0, 20, $color, $font, $new_message1);
imagettftext($im, 15, 0, 0, 50, $color, $font, $new_message2);
imagepng($im);
imagedestroy($im);
?>