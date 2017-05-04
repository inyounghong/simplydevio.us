<?
session_start();
header('Content-type: image/png');
$visitor = exec("python ../image_with_name.py 'xxlesly'");
$new_message1 = str_replace("visitor",$visitor, 'Colourful greetings to you, visitor!');
$new_message2 = str_replace("visitor",$visitor, 'Colourful greetings to you, visitor!');
$font = './uploaded_fonts/' . 'CHERI___.TTF';
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
$width  = (40 * strlen($longer_message));
$im = imagecreatetruecolor ($width,200);
$background = imagecolorallocate($im, 46, 55, 53);
imagefill($im,0,0,$background);
$color = imagecolorallocate($im, 255, 255, 255);
imagettftext($im, 50, 0, 99, 100, $color, $font, $new_message1);
imagettftext($im, 50, 0, 99, 100, $color, $font, $new_message2);
imagepng($im);
imagedestroy($im);
?>