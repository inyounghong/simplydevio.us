<?
session_start();
header('Content-type: image/png');
$visitor = exec("python ../image_with_name.py 'EDFTeam'");
$new_message1 = str_replace("visitor",$visitor, '¡Hola, visitor!  Gracias por visitar nuestra página.');
$new_message2 = str_replace("visitor",$visitor, '');
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
$background = imagecolorallocate($im, 85, 45, 45);
imagefill($im,0,0,$background);
$color = imagecolorallocate($im, 255, 248, 247);
imagettftext($im, 12, 0, 0, 20, $color, $font, $new_message1);
imagettftext($im, 12, 0, 0, 50, $color, $font, $new_message2);
imagepng($im);
imagedestroy($im);
?>