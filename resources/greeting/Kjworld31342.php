<?
session_start();
header('Content-type: image/png');
$visitor = exec("python ../image_with_name.py 'Kjworld313'");
$new_message1 = str_replace("visitor",$visitor, 'Hello! Welcome to my page, visitor');
$new_message2 = str_replace("visitor",$visitor, 'Kj|Friendly|Pyscho|Bubbly');
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
$width  = (13 * strlen($longer_message));
$im = imagecreatetruecolor ($width,100);
$background = imagecolorallocate($im, 255, 153, 153);
imagefill($im,0,0,$background);
$color = imagecolorallocate($im, 255, 255, 255);
imagettftext($im, 16, 0, 18, 36, $color, $font, $new_message1);
imagettftext($im, 16, 0, 55, 88, $color, $font, $new_message2);
imagepng($im);
imagedestroy($im);
?>