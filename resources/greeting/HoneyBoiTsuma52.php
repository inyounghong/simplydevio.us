<?
session_start();
header('Content-type: image/png');
$visitor = exec("python ../image_with_name.py 'HoneyBoiTsuma'");
$new_message1 = str_replace("visitor",$visitor, 'Welcome to my page, visitor!');
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
$width  = (16 * strlen($longer_message));
$im = imagecreatetruecolor ($width,57);
$background = imagecolorallocate($im, 59, 4, 4);
imagefill($im,0,0,$background);
$color = imagecolorallocate($im, 196, 41, 18);
imagettftext($im, 22, 0, 45, 41, $color, $font, $new_message1);
imagettftext($im, 22, 0, 46, 41, $color, $font, $new_message2);
imagepng($im);
imagedestroy($im);
?>