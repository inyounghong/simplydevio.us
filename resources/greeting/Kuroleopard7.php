<?
session_start();
header('Content-type: image/png');
$visitor = exec("python ../image.py 'Kuroleopard'");
$new_message1 = str_replace("visitor",$visitor, 'Welcome to my profile, visitor!');
$new_message2 = str_replace("visitor",$visitor, 'Hope to see you stick around');
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
$width  = (20 * strlen($longer_message));
$im = imagecreatetruecolor ($width,129);
$background = imagecolorallocate($im, 25, 255, 255);
imagefill($im,0,0,$background);
$color = imagecolorallocate($im, 255, 255, 255);
imagettftext($im, 18, 0, 65, 51, $color, $font, $new_message1);
imagettftext($im, 18, 0, 101, 114, $color, $font, $new_message2);
imagepng($im);
imagedestroy($im);
?>