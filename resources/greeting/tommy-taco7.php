<?
session_start();
header('Content-type: image/png');
$visitor = exec("python ../image.py 'tommy-taco'");
$new_message1 = str_replace("visitor",$visitor, 'O\'ye There');
$new_message2 = str_replace("visitor",$visitor, '');
$font = './uploaded_fonts/' . 'ARBERKLEY.ttf';
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
$width  = (33 * strlen($longer_message));
$im = imagecreatetruecolor ($width,104);
$background = imagecolorallocate($im, 255, 252, 252);
imagefill($im,0,0,$background);
$color = imagecolorallocate($im, 137, 21, 179);
imagettftext($im, 21, 0, 85, 32, $color, $font, $new_message1);
imagettftext($im, 21, 0, 0, 50, $color, $font, $new_message2);
imagepng($im);
imagedestroy($im);
?>