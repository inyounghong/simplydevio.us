<?
session_start();
header('Content-type: image/png');
$visitor = exec("python ../image.py 'lichtdrache'");
$new_message1 = str_replace("visitor",$visitor, 'Hello visitor, nice to see you here!');
$new_message2 = str_replace("visitor",$visitor, 'Feel free to look around.');
$font = './uploaded_fonts/' . 'Rock.TTF';
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
$im = imagecreatetruecolor ($width,106);
$background = imagecolorallocate($im, 3, 255, 201);
imagefill($im,0,0,$background);
$color = imagecolorallocate($im, 48, 48, 48);
imagettftext($im, 32, 0, 12, 40, $color, $font, $new_message1);
imagettftext($im, 32, 0, 12, 97, $color, $font, $new_message2);
imagepng($im);
imagedestroy($im);
?>