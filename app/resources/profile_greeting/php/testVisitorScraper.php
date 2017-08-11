<?php

// Testing VisitorScraper.php, not actually used anywhere important

include('VisitorScraper.php');

$visitorScraper = new VisitorScraper("Simplysilent", true);
$visitor = $visitorScraper->getVisitor();
echo $visitor;

?>
