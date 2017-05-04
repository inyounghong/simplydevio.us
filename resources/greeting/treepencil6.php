<?
session_start();
header('Content-type: image/png');
$visitor = exec("python ../image.py 'treepencil'");
$new_message1 = str_replace("visitor",$visitor, 'Hey, visitor! I can see you!');
$new_message2 = str_replace("visitor",$visitor, 'I hope you have a nice day!');
$font = './uploaded_fonts/' . 'opensans.ttf';
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
$im = imagecreatetruecolor ($width,66);
$background = imagecolorallocate($im, 210, 106, 255);
imagefill($im,0,0,$background);
$color = imagecolorallocate($im, 0, 0, 0);
imagettftext($im, 15, 0, 27, 24, $color, $font, $new_message1);
imagettftext($im, 15, 0, 17, 53, $color, $font, $new_message2);
imagepng($im);
imagedestroy($im);
?>