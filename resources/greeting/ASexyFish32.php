<?
session_start();
header('Content-type: image/png');
$visitor = exec("python ../image_with_name.py 'ASexyFish'");
$new_message1 = str_replace("visitor",$visitor, 'uhhhhh');
$new_message2 = str_replace("visitor",$visitor, 'lol hi, visitor!');
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
$width  = (10 * strlen($longer_message));
$im = imagecreatetruecolor ($width,50);
$background = imagecolorallocate($im, 205, 255, 148);
imagefill($im,0,0,$background);
$color = imagecolorallocate($im, 255, 56, 156);
imagettftext($im, 16, 0, 0, 20, $color, $font, $new_message1);
imagettftext($im, 16, 0, 0, 50, $color, $font, $new_message2);
imagepng($im);
imagedestroy($im);
?>