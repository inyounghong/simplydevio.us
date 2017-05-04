<?
session_start();
header('Content-type: image/png');
$visitor = exec("python ../image_with_name.py 'Joybuzzy'");
$new_message1 = str_replace("visitor",$visitor, 'Come Back Soon!');
$new_message2 = str_replace("visitor",$visitor, '');
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
$width  = (21 * strlen($longer_message));
$im = imagecreatetruecolor ($width,36);
$background = imagecolorallocate($im, 243, 248, 239);
imagefill($im,0,0,$background);
$color = imagecolorallocate($im, 85, 170, 255);
imagettftext($im, 25, 0, 46, 33, $color, $font, $new_message1);
imagettftext($im, 25, 0, 99, 68, $color, $font, $new_message2);
imagepng($im);
imagedestroy($im);
?>