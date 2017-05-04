<?
session_start();
header('Content-type: image/png');
$visitor = exec("python ../image.py 'fishter911'");
$new_message1 = str_replace("visitor",$visitor, 'Hello fellow traveler!');
$new_message2 = str_replace("visitor",$visitor, 'Welcome friend!');
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
$width  = (16 * strlen($longer_message));
$im = imagecreatetruecolor ($width,92);
$background = imagecolorallocate($im, 28, 17, 130);
imagefill($im,0,0,$background);
$color = imagecolorallocate($im, 242, 242, 242);
imagettftext($im, 19, 0, 99, 20, $color, $font, $new_message1);
imagettftext($im, 19, 0, 0, 50, $color, $font, $new_message2);
imagepng($im);
imagedestroy($im);
?>