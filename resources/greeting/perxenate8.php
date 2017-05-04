<?
session_start();
header('Content-type: image/png');
$visitor = exec("python ../image.py 'perxenate'");
$new_message1 = str_replace("visitor",$visitor, 'Greetings, visitor... >:D');
$new_message2 = str_replace("visitor",$visitor, 'I hope you like blood...');
$font = './uploaded_fonts/' . 'cambria.ttc';
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
$width  = (18 * strlen($longer_message));
$im = imagecreatetruecolor ($width,93);
$background = imagecolorallocate($im, 240, 245, 239);
imagefill($im,0,0,$background);
$color = imagecolorallocate($im, 0, 0, 0);
imagettftext($im, 29, 0, 0, 34, $color, $font, $new_message1);
imagettftext($im, 29, 0, 0, 73, $color, $font, $new_message2);
imagepng($im);
imagedestroy($im);
?>