<form method="post" action="">
<br />
<strong>Domain Names: (enter each domain on a newline or separate them with commas)</strong><br />
<textarea id="dom" name="dom"></textarea><br /><br />
<input type="submit" id="sbmt" name="sbmt" value="Parse"/><br />
</form>

<?php
//now to process above info from form and insert the data in config files:
if(isset($_POST['sbmt'])) {
//collect form data:
$dom = $_POST['dom'];//raw user input text into domain names textarea needs parsed!

//parse domains entered by user into dom textarea and put in doms array:
$doms = preg_split("/[rn,]+/", $dom, -1, PREG_SPLIT_NO_EMPTY);//array of domains

    foreach($doms as $dname){
    echo $dname."<br>";
    }//end foreach domain.

}//end if form submitted.

?>