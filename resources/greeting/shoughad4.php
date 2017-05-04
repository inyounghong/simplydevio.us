<?
session_start();
header('Content-type: image/png');
$visitor = exec("python ../image.py 'shoughad'");
$new_message1 = str_replace("visitor",$visitor, 'Hey, visitor! Thanks for dropping by!');
$new_message2 = str_replace("visitor",$visitor, 'Feel free to look around.');
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
$width  = (10 * strlen($longer_message));
$im = imagecreatetruecolor ($width,50);
$background = imagecolorallocate($im, 218, 228, 217);
imagefill($im,0,0,$background);
$color = imagecolorallocate($im, 0, 0, 0);
imagettftext($im, 15, 0, 0, 20, $color, $font, $new_message1);
imagettftext($im, 15, 0, 32, 43, $color, $font, $new_message2);
imagepng($im);
imagedestroy($im);
?>