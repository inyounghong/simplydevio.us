<?
session_start();
header('Content-type: image/png');
$visitor = exec("python ../image_with_name.py 'SnowbalI'");
$new_message1 = str_replace("visitor",$visitor, 'Hope you brought a coat');
$new_message2 = str_replace("visitor",$visitor, 'visitor');
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
$width  = (15 * strlen($longer_message));
$im = imagecreatetruecolor ($width,119);
$background = imagecolorallocate($im, 247, 247, 247);
imagefill($im,0,0,$background);
$color = imagecolorallocate($im, 189, 189, 189);
imagettftext($im, 21, 0, 30, 36, $color, $font, $new_message1);
imagettftext($im, 21, 0, 28, 75, $color, $font, $new_message2);
imagepng($im);
imagedestroy($im);
?>