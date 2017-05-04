<?
session_start();
header('Content-type: image/png');
$visitor = exec("python ../image_with_name.py 'Astral-Ambiance'");
$new_message1 = str_replace("visitor",$visitor, 'Hey there, visitor!');
$new_message2 = str_replace("visitor",$visitor, 'Welcome To Hell, Enjoy your stay.');
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
$width  = (14 * strlen($longer_message));
$im = imagecreatetruecolor ($width,60);
$background = imagecolorallocate($im, 255, 255, 255);
imagefill($im,0,0,$background);
$color = imagecolorallocate($im, 163, 212, 142);
imagettftext($im, 17, 0, 113, 20, $color, $font, $new_message1);
imagettftext($im, 17, 0, 40, 50, $color, $font, $new_message2);
imagepng($im);
imagedestroy($im);
?>