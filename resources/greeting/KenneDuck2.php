<?
session_start();
header('Content-type: image/png');
$visitor = exec("python ../image.py 'KenneDuck'");
$new_message1 = str_replace("visitor",$visitor, 'Hey, Bro!');
$new_message2 = str_replace("visitor",$visitor, 'Welcome to my page!');
$font = './uploaded_fonts/' . 'trebuc.ttf';
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
$width  = (28 * strlen($longer_message));
$im = imagecreatetruecolor ($width,73);
$background = imagecolorallocate($im, 132, 163, 163);
imagefill($im,0,0,$background);
$color = imagecolorallocate($im, 255, 255, 255);
imagettftext($im, 18, 0, 87, 25, $color, $font, $new_message1);
imagettftext($im, 18, 0, 39, 57, $color, $font, $new_message2);
imagepng($im);
imagedestroy($im);
?>