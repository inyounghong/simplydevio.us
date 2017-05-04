<?
session_start();
header('Content-type: image/png');
$visitor = exec("python ../image_with_name.py 'ukulelemoon'");
$new_message1 = str_replace("visitor",$visitor, 'Welcome to the Paisley Islands . . . ');
$new_message2 = str_replace("visitor",$visitor, 'Hey, visitor! My name is Ukulele Moon!');
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
$width  = (50 * strlen($longer_message));
$im = imagecreatetruecolor ($width,200);
$background = imagecolorallocate($im, 224, 250, 113);
imagefill($im,0,0,$background);
$color = imagecolorallocate($im, 243, 61, 110);
imagettftext($im, 50, 0, 69, 90, $color, $font, $new_message1);
imagettftext($im, 50, 0, 142, 164, $color, $font, $new_message2);
imagepng($im);
imagedestroy($im);
?>