<?php

// Testing VisitorScraper.php, not actually used anywhere important

include('VisitorScraper.php');

$username = "simplysilentsdf";
$visitorScraper = new VisitorScraper($username, false);
$visitor = $visitorScraper->getVisitor();
echo "<p>$username</p>";
echo $visitor;

?>
