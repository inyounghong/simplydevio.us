<?
session_start();
header('Content-type: image/png');
$visitor = exec("python ../image.py 'xscreamjay'");
$new_message1 = str_replace("visitor",$visitor, 'Hey, visitor!');
$new_message2 = str_replace("visitor",$visitor, 'Welcome to my page.');
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
$width  = (21 * strlen($longer_message));
$im = imagecreatetruecolor ($width,61);
$background = imagecolorallocate($im, 255, 255, 255);
imagefill($im,0,0,$background);
$color = imagecolorallocate($im, 159, 206, 84);
imagettftext($im, 14, 0, 121, 28, $color, $font, $new_message1);
imagettftext($im, 14, 0, 115, 50, $color, $font, $new_message2);
imagepng($im);
imagedestroy($im);
?>