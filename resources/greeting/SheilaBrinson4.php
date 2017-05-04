<?
session_start();
header('Content-type: image/png');
$visitor = exec("python ../image.py 'SheilaBrinson'");
$new_message1 = str_replace("visitor",$visitor, 'Welcome visitor ');
$new_message2 = str_replace("visitor",$visitor, 'Thanks for Visiting!  <3');
$font = './uploaded_fonts/' . 'BLKCHCRY.TTF';
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
$im = imagecreatetruecolor ($width,156);
$background = imagecolorallocate($im, 168, 15, 25);
imagefill($im,0,0,$background);
$color = imagecolorallocate($im, 255, 189, 195);
imagettftext($im, 28, 0, 43, 51, $color, $font, $new_message1);
imagettftext($im, 28, 0, 43, 103, $color, $font, $new_message2);
imagepng($im);
imagedestroy($im);
?>