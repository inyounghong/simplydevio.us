<?
session_start();
header('Content-type: image/png');
$visitor = exec("python ../image_with_name.py 'DaComplexCompletion'");
$new_message1 = str_replace("visitor",$visitor, 'Hey visitor! Welcome to my void!');
$new_message2 = str_replace("visitor",$visitor, 'Hey visitor! Welcome to my void!');
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
$width  = (11 * strlen($longer_message));
$im = imagecreatetruecolor ($width,50);
$background = imagecolorallocate($im, 5, 5, 255);
imagefill($im,0,0,$background);
$color = imagecolorallocate($im, 10, 247, 255);
imagettftext($im, 15, 0, 9, 20, $color, $font, $new_message1);
imagettftext($im, 15, 0, 9, 50, $color, $font, $new_message2);
imagepng($im);
imagedestroy($im);
?>