<?
session_start();
header('Content-type: image/png');
$visitor = exec("python ../image.py 'Kjworld313'");
$new_message1 = str_replace("visitor",$visitor, '           Hello! Welcome to my page, visitor');
$new_message2 = str_replace("visitor",$visitor, '    Kj|Friendly|Pyscho\'ish|Bubbly');
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
$width  = (10 * strlen($longer_message));
$im = imagecreatetruecolor ($width,125);
$background = imagecolorallocate($im, 255, 187, 173);
imagefill($im,0,0,$background);
$color = imagecolorallocate($im, 255, 255, 255);
imagettftext($im, 12, 0, 30, 49, $color, $font, $new_message1);
imagettftext($im, 12, 0, 32, 84, $color, $font, $new_message2);
imagepng($im);
imagedestroy($im);
?>