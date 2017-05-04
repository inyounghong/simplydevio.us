<?
session_start();
header('Content-type: image/png');
$visitor = exec("python ../image_with_name.py 'thwackcrackers'");
$new_message1 = str_replace("visitor",$visitor, 'Hey, visitor!');
$new_message2 = str_replace("visitor",$visitor, 'Welcome to my humble page!');
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
$width  = (19 * strlen($longer_message));
$im = imagecreatetruecolor ($width,163);
$background = imagecolorallocate($im, 0, 0, 0);
imagefill($im,0,0,$background);
$color = imagecolorallocate($im, 255, 10, 10);
imagettftext($im, 35, 0, 157, 38, $color, $font, $new_message1);
imagettftext($im, 35, 0, 67, 107, $color, $font, $new_message2);
imagepng($im);
imagedestroy($im);
?>