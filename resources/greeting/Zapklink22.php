<?
session_start();
header('Content-type: image/png');
$visitor = exec("python ../image_with_name.py 'Zapklink'");
$new_message1 = str_replace("visitor",$visitor, 'Welcome to my page, ');
$new_message2 = str_replace("visitor",$visitor, 'visitor! ♥');
$font = './uploaded_fonts/' . 'Monotype Corsiva.ttf';
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
$width  = (37 * strlen($longer_message));
$im = imagecreatetruecolor ($width,200);
$background = imagecolorallocate($im, 255, 182, 193);
imagefill($im,0,0,$background);
$color = imagecolorallocate($im, 255, 255, 255);
imagettftext($im, 50, 0, 0, 58, $color, $font, $new_message1);
imagettftext($im, 50, 0, 0, 129, $color, $font, $new_message2);
imagepng($im);
imagedestroy($im);
?>