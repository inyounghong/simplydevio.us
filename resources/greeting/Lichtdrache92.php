<?
session_start();
header('Content-type: image/png');
$visitor = exec("python ../image_with_name.py 'Lichtdrache'");
$new_message1 = str_replace("visitor",$visitor, 'Welcome to my page, visitor!');
$new_message2 = str_replace("visitor",$visitor, ' ');
$font = './uploaded_fonts/' . 'arial.ttf';
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
$width  = (35 * strlen($longer_message));
$im = imagecreatetruecolor ($width,70);
$background = imagecolorallocate($im, 3, 255, 201);
imagefill($im,0,0,$background);
$color = imagecolorallocate($im, 48, 48, 48);
imagettftext($im, 39, 0, 65, 51, $color, $font, $new_message1);
imagettftext($im, 39, 0, 0, 90, $color, $font, $new_message2);
imagepng($im);
imagedestroy($im);
?>