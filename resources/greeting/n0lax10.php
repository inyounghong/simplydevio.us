<?
session_start();
header('Content-type: image/png');
$visitor = exec("python ../image.py 'n0lax'");
$new_message1 = str_replace("visitor",$visitor, 'Hey, visitor!');
$new_message2 = str_replace("visitor",$visitor, 'Stay as long as you like.');
$font = './uploaded_fonts/' . 'arial.ttf';
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
$im = imagecreatetruecolor ($width,100);
$background = imagecolorallocate($im, 221, 196, 200);
imagefill($im,0,0,$background);
$color = imagecolorallocate($im, 75, 58, 66);
imagettftext($im, 15, 0, 0, 20, $color, $font, $new_message1);
imagettftext($im, 15, 0, 0, 50, $color, $font, $new_message2);
imagepng($im);
imagedestroy($im);
?>