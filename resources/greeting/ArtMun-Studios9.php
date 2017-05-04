<?
session_start();
header('Content-type: image/png');
$visitor = exec("python ../image.py 'ArtMun-Studios'");
$new_message1 = str_replace("visitor",$visitor, 'Welcome to ARTMUN Studios!');
$new_message2 = str_replace("visitor",$visitor, 'Let Your Imagination Take Flight');
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
$im = imagecreatetruecolor ($width,191);
$background = imagecolorallocate($im, 222, 7, 50);
imagefill($im,0,0,$background);
$color = imagecolorallocate($im, 0, 0, 0);
imagettftext($im, 33, 0, 46, 91, $color, $font, $new_message1);
imagettftext($im, 33, 0, 4, 153, $color, $font, $new_message2);
imagepng($im);
imagedestroy($im);
?>