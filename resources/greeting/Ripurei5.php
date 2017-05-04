<?
session_start();
header('Content-type: image/png');
$visitor = exec("python ../image.py 'Ripurei'");
$new_message1 = str_replace("visitor",$visitor, 'Hey, visitor! Great to see you in my page, enjoy!');
$new_message2 = str_replace("visitor",$visitor, 'Hey, visitor!');
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
$width  = (9 * strlen($longer_message));
$im = imagecreatetruecolor ($width,26);
$background = imagecolorallocate($im, 112, 127, 117);
imagefill($im,0,0,$background);
$color = imagecolorallocate($im, 255, 255, 255);
imagettftext($im, 13, 0, 0, 20, $color, $font, $new_message1);
imagettftext($im, 13, 0, 0, 50, $color, $font, $new_message2);
imagepng($im);
imagedestroy($im);
?>