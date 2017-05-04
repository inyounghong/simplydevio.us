<?
session_start();
header('Content-type: image/png');
$visitor = exec("python ../image_with_name.py 'SeventhTale'");
$new_message1 = str_replace("visitor",$visitor, 'Welcome to my Profile');
$new_message2 = str_replace("visitor",$visitor, 'visitor!');
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
$width  = (38 * strlen($longer_message));
$im = imagecreatetruecolor ($width,91);
$background = imagecolorallocate($im, 48, 35, 19);
imagefill($im,0,0,$background);
$color = imagecolorallocate($im, 179, 135, 19);
imagettftext($im, 22, 0, 108, 46, $color, $font, $new_message1);
imagettftext($im, 22, 0, 126, 71, $color, $font, $new_message2);
imagepng($im);
imagedestroy($im);
?>