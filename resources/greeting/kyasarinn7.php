<?
session_start();
header('Content-type: image/png');
$visitor = exec("python ../image.py 'kyasarinn'");
$new_message1 = str_replace("visitor",$visitor, 'Hey, visitor! Nice to see you here!');
$new_message2 = str_replace("visitor",$visitor, 'Hey, visitor!');
$font = './uploaded_fonts/' . 'georgia.ttf';
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
$width  = (16 * strlen($longer_message));
$im = imagecreatetruecolor ($width,50);
$background = imagecolorallocate($im, 239, 207, 181);
imagefill($im,0,0,$background);
$color = imagecolorallocate($im, 174, 60, 45);
imagettftext($im, 22, 0, 20, 35, $color, $font, $new_message1);
imagettftext($im, 22, 0, 0, 200, $color, $font, $new_message2);
imagepng($im);
imagedestroy($im);
?>