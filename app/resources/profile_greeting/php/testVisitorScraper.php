<?php

// Testing VisitorScraper.php, not actually used anywhere important

include('VisitorScraper.php');

$visitorScraper = new VisitorScraper("all-art-wanted", false);
$visitor = $visitorScraper->getVisitor();
echo $visitor;

?>
