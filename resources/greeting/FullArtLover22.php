<?
session_start();
header('Content-type: image/png');
$visitor = exec("python ../image_with_name.py 'FullArtLover'");
$new_message1 = str_replace("visitor",$visitor, 'Hey, visitor!');
$new_message2 = str_replace("visitor",$visitor, 'I can see you! Hope you enjoy my art ;)');
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
$width  = (29 * strlen($longer_message));
$im = imagecreatetruecolor ($width,123);
$background = imagecolorallocate($im, 25, 25, 25);
imagefill($im,0,0,$background);
$color = imagecolorallocate($im, 255, 255, 255);
imagettftext($im, 38, 0, 200, 38, $color, $font, $new_message1);
imagettftext($im, 38, 0, 0, 82, $color, $font, $new_message2);
imagepng($im);
imagedestroy($im);
?>