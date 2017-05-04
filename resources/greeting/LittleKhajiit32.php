<?
session_start();
header('Content-type: image/png');
$visitor = exec("python ../image_with_name.py 'LittleKhajiit'");
$new_message1 = str_replace("visitor",$visitor, 'Hi, visitor!');
$new_message2 = str_replace("visitor",$visitor, 'welcome to my profile!');
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
$width  = (30 * strlen($longer_message));
$im = imagecreatetruecolor ($width,100);
$background = imagecolorallocate($im, 144, 137, 132);
imagefill($im,0,0,$background);
$color = imagecolorallocate($im, 255, 232, 232);
imagettftext($im, 25, 0, 50, 30, $color, $font, $new_message1);
imagettftext($im, 25, 0, 64, 70, $color, $font, $new_message2);
imagepng($im);
imagedestroy($im);
?>