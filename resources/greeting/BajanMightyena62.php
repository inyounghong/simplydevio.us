<?
session_start();
header('Content-type: image/png');

$visitor = exec("python ../image_with_name.py 'BajanMightyena'");
$new_message1 = str_replace("visitor",$visitor, 'Bonjour, visitor!~');
$new_message2 = str_replace("visitor",$visitor, 'Welcome To My Page.');
$font = './uploaded_fonts/' . 'brain_flower.ttf';

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

$width  = (22 * strlen($longer_message));
$im = imagecreatetruecolor ($width,136);
$background = imagecolorallocate($im, 235, 206, 254);
imagefill($im,0,0,$background);

$color = imagecolorallocate($im, 166, 131, 202);

imagettftext($im, 43, 0, 42, 60, $color, $font, $new_message1);
imagettftext($im, 43, 0, 76, 113, $color, $font, $new_message2);

imagepng($im);
imagedestroy($im);

?>