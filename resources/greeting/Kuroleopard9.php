<?
session_start();
header('Content-type: image/png');
$visitor = exec("python ../image.py 'Kuroleopard'");
$new_message1 = str_replace("visitor",$visitor, 'visitor');
$new_message2 = str_replace("visitor",$visitor, 'Welcome to my profile!');
$font = './uploaded_fonts/' . 'Storyboo.TTF';
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
$width  = (19 * strlen($longer_message));
$im = imagecreatetruecolor ($width,98);
$background = imagecolorallocate($im, 0, 255, 213);
imagefill($im,0,0,$background);
$color = imagecolorallocate($im, 0, 0, 0);
imagettftext($im, 23, 0, 88, 36, $color, $font, $new_message1);
imagettftext($im, 23, 0, 20, 84, $color, $font, $new_message2);
imagepng($im);
imagedestroy($im);
?>