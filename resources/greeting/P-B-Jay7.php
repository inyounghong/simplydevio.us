<?
session_start();
header('Content-type: image/png');
$visitor = exec("python ../image.py 'P-B-Jay'");
$new_message1 = str_replace("visitor",$visitor, 'Hi there, visitor!');
$new_message2 = str_replace("visitor",$visitor, 'Hey, visitor!');
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
$width  = (21 * strlen($longer_message));
$im = imagecreatetruecolor ($width,33);
$background = imagecolorallocate($im, 46, 55, 53);
imagefill($im,0,0,$background);
$color = imagecolorallocate($im, 255, 255, 255);
imagettftext($im, 14, 0, 120, 25, $color, $font, $new_message1);
imagettftext($im, 14, 0, 0, 50, $color, $font, $new_message2);
imagepng($im);
imagedestroy($im);
?>