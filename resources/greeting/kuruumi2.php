<?
session_start();
header('Content-type: image/png');
$visitor = exec("python ../image.py 'kuruumi'");
$new_message1 = str_replace("visitor",$visitor, 'Hello, visitor');
$new_message2 = str_replace("visitor",$visitor, 'Welcome to my page!');
$font = './uploaded_fonts/' . 'CHERI___.TTF';
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
$width  = (26 * strlen($longer_message));
$im = imagecreatetruecolor ($width,135);
$background = imagecolorallocate($im, 197, 176, 195);
imagefill($im,0,0,$background);
$color = imagecolorallocate($im, 240, 241, 241);
imagettftext($im, 22, 0, 126, 65, $color, $font, $new_message1);
imagettftext($im, 22, 0, 96, 96, $color, $font, $new_message2);
imagepng($im);
imagedestroy($im);
?>