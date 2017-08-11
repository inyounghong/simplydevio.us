<?php

// Testing VisitorScraper.php, not actually used anywhere important

include('VisitorScraper.php');

$visitorScraper = new VisitorScraper("All-Art-Wanted", false);
$visitor = $visitorScraper->getVisitor();
echo $visitor;

?>
