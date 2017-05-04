<?
session_start();
header('Content-type: image/png');
$visitor = exec("python ../image_with_name.py 'NotaVisitorJustanother'");
$new_message1 = str_replace("visitor",$visitor, 'Thanks for the watches');
$new_message2 = str_replace("visitor",$visitor, 'Happy Halloween!');
$font = './uploaded_fonts/' . 'DoubleFeature20.ttf';
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
$width  = (14 * strlen($longer_message));
$im = imagecreatetruecolor ($width,62);
$background = imagecolorallocate($im, 229, 58, 94);
imagefill($im,0,0,$background);
$color = imagecolorallocate($im, 0, 0, 0);
imagettftext($im, 15, 0, 9, 20, $color, $font, $new_message1);
imagettftext($im, 15, 0, 56, 50, $color, $font, $new_message2);
imagepng($im);
imagedestroy($im);
?>