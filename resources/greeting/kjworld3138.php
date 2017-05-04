<?
session_start();
header('Content-type: image/png');
$visitor = exec("python ../image.py 'kjworld313'");
$new_message1 = str_replace("visitor",$visitor, 'Welcome to my page, visitor!');
$new_message2 = str_replace("visitor",$visitor, 'Kj|Friendly|Pyscho\'ish|Bubbly');
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
$width  = (16 * strlen($longer_message));
$im = imagecreatetruecolor ($width,66);
$background = imagecolorallocate($im, 54, 248, 255);
imagefill($im,0,0,$background);
$color = imagecolorallocate($im, 255, 48, 214);
imagettftext($im, 20, 0, 60, 22, $color, $font, $new_message1);
imagettftext($im, 20, 0, 0, 49, $color, $font, $new_message2);
imagepng($im);
imagedestroy($im);
?>