<?
session_start();
header('Content-type: image/png');
$visitor = exec("python ../image_with_name.py 'AlikuHatsune'");
$new_message1 = str_replace("visitor",$visitor, 'Welcome, visitor!');
$new_message2 = str_replace("visitor",$visitor, ' ');
$font = './uploaded_fonts/' . 'brain_flower.ttf';
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
$im = imagecreatetruecolor ($width,69);
$background = imagecolorallocate($im, 143, 249, 255);
imagefill($im,0,0,$background);
$color = imagecolorallocate($im, 0, 0, 0);
imagettftext($im, 50, 0, 0, 54, $color, $font, $new_message1);
imagettftext($im, 50, 0, 0, 50, $color, $font, $new_message2);
imagepng($im);
imagedestroy($im);
?>