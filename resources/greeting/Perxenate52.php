<?
session_start();
header('Content-type: image/png');

$visitor = exec("python ../image_with_name.py 'Perxenate'");
$new_message1 = str_replace("visitor",$visitor, 'Hello, visitor !');
$new_message2 = str_replace("visitor",$visitor, 'Welcome to my page!');
$font = './uploaded_fonts/' . 'georgia.ttf';

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

$width  = (40 * strlen($longer_message));
$im = imagecreatetruecolor ($width,142);
$background = imagecolorallocate($im, 241, 241, 241);
imagefill($im,0,0,$background);

$color = imagecolorallocate($im, 0, 0, 0);

imagettftext($im, 50, 0, 119, 62, $color, $font, $new_message1);
imagettftext($im, 50, 0, 119, 123, $color, $font, $new_message2);

imagepng($im);
imagedestroy($im);

?>