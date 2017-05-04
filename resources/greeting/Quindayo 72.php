<?
session_start();
header('Content-type: image/png');
$visitor = exec("python ../image_with_name.py 'Quindayo '");
$new_message1 = str_replace("visitor",$visitor, 'Greetings, friend.');
$new_message2 = str_replace("visitor",$visitor, 'Please check out my art and tell me what you think.');
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
$width  = (10 * strlen($longer_message));
$im = imagecreatetruecolor ($width,41);
$background = imagecolorallocate($im, 0, 0, 0);
imagefill($im,0,0,$background);
$color = imagecolorallocate($im, 38, 255, 96);
imagettftext($im, 14, 0, 0, 20, $color, $font, $new_message1);
imagettftext($im, 14, 0, 0, 50, $color, $font, $new_message2);
imagepng($im);
imagedestroy($im);
?>