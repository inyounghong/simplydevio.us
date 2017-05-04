<?
session_start();
header('Content-type: image/png');
$visitor = exec("python ../image.py 'lichtdrache'");
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
$width  = (27 * strlen($longer_message));
$im = imagecreatetruecolor ($width,77);
$background = imagecolorallocate($im, 3, 255, 201);
imagefill($im,0,0,$background);
$color = imagecolorallocate($im, 48, 48, 48);
imagettftext($im, 38, 0, 33, 60, $color, $font, $new_message1);
imagettftext($im, 38, 0, 0, 65, $color, $font, $new_message2);
imagepng($im);
imagedestroy($im);
?>