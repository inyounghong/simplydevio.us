<?
session_start();
header('Content-type: image/png');
$visitor = exec("python ../image_with_name.py 'lonelicrown'");
$new_message1 = str_replace("visitor",$visitor, 'Welcome fawnling, ');
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
$width  = (50 * strlen($longer_message));
$im = imagecreatetruecolor ($width,200);
$background = imagecolorallocate($im, 153, 94, 255);
imagefill($im,0,0,$background);
$color = imagecolorallocate($im, 255, 255, 255);
imagettftext($im, 27, 0, 200, 152, $color, $font, $new_message1);
imagettftext($im, 27, 0, 0, 50, $color, $font, $new_message2);
imagepng($im);
imagedestroy($im);
?>