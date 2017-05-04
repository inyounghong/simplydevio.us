<?
session_start();
header('Content-type: image/png');
$visitor = exec("python ../image_with_name.py 'TreePencil'");
$new_message1 = str_replace("visitor",$visitor, 'Hey there, visitor! I can see you!');
$new_message2 = str_replace("visitor",$visitor, 'Thanks for visiting my profile! ');
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
$im = imagecreatetruecolor ($width,70);
$background = imagecolorallocate($im, 0, 25, 148);
imagefill($im,0,0,$background);
$color = imagecolorallocate($im, 255, 255, 255);
imagettftext($im, 20, 0, 55, 25, $color, $font, $new_message1);
imagettftext($im, 20, 0, 75, 60, $color, $font, $new_message2);
imagepng($im);
imagedestroy($im);
?>