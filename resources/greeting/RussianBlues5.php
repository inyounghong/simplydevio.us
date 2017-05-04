<?
session_start();
header('Content-type: image/png');
$visitor = exec("python ../image.py 'RussianBlues'");
$new_message1 = str_replace("visitor",$visitor, 'Hello!');
$new_message2 = str_replace("visitor",$visitor, 'Welcome to my page, visitor!');
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
$width  = (12 * strlen($longer_message));
$im = imagecreatetruecolor ($width,96);
$background = imagecolorallocate($im, 255, 219, 167);
imagefill($im,0,0,$background);
$color = imagecolorallocate($im, 92, 61, 35);
imagettftext($im, 20, 0, 128, 29, $color, $font, $new_message1);
imagettftext($im, 20, 0, 18, 69, $color, $font, $new_message2);
imagepng($im);
imagedestroy($im);
?>