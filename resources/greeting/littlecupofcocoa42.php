<?
session_start();
header('Content-type: image/png');

$visitor = exec("python ../image_with_name.py 'littlecupofcocoa'");
$new_message1 = str_replace("visitor",$visitor, 'Hello! ');
$new_message2 = str_replace("visitor",$visitor, 'Welcome to my page!');
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

$width  = (26 * strlen($longer_message));
$im = imagecreatetruecolor ($width,104);
$background = imagecolorallocate($im, 0, 0, 0);
imagefill($im,0,0,$background);

$color = imagecolorallocate($im, 5, 255, 247);

imagettftext($im, 26, 0, 154, 47, $color, $font, $new_message1);
imagettftext($im, 26, 0, 85, 50, $color, $font, $new_message2);

imagepng($im);
imagedestroy($im);

?>