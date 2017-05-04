<?
session_start();
header('Content-type: image/png');
$visitor = exec("python ../image_with_name.py 'Cantatus-Promise'");
$new_message1 = str_replace("visitor",$visitor, 'Thanks for visiting my page!');
$new_message2 = str_replace("visitor",$visitor, '');
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
$width  = (11 * strlen($longer_message));
$im = imagecreatetruecolor ($width,58);
$background = imagecolorallocate($im, 255, 255, 255);
imagefill($im,0,0,$background);
$color = imagecolorallocate($im, 0, 0, 0);
imagettftext($im, 20, 0, 0, 33, $color, $font, $new_message1);
imagettftext($im, 20, 0, 0, 0, $color, $font, $new_message2);
imagepng($im);
imagedestroy($im);
?>