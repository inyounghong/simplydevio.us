<?
session_start();
header('Content-type: image/png');
$visitor = exec("python ../image_with_name.py 'GtsDroveX'");
$new_message1 = str_replace("visitor",$visitor, 'Welcome to my page Visitor!');
$new_message2 = str_replace("visitor",$visitor, 'I hope you have an amazing day! ');
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
$width  = (20 * strlen($longer_message));
$im = imagecreatetruecolor ($width,200);
$background = imagecolorallocate($im, 0, 79, 168);
imagefill($im,0,0,$background);
$color = imagecolorallocate($im, 255, 255, 255);
imagettftext($im, 50, 0, 58, 85, $color, $font, $new_message1);
imagettftext($im, 50, 0, 7, 143, $color, $font, $new_message2);
imagepng($im);
imagedestroy($im);
?>