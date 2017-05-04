<?
session_start();
header('Content-type: image/png');
$visitor = exec("python ../image.py 'EinnhardeR'");
$new_message1 = str_replace("visitor",$visitor, 'Hey, visitor! Welcome to my page.');
$new_message2 = str_replace("visitor",$visitor, 'Thank you so much for the visit.');
$font = './uploaded_fonts/' . 'arial.ttf';
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
$width  = (35 * strlen($longer_message));
$im = imagecreatetruecolor ($width,200);
$background = imagecolorallocate($im, 255, 255, 255);
imagefill($im,0,0,$background);
$color = imagecolorallocate($im, 0, 0, 0);
imagettftext($im, 45, 0, 118, 88, $color, $font, $new_message1);
imagettftext($im, 45, 0, 144, 147, $color, $font, $new_message2);
imagepng($im);
imagedestroy($im);
?>