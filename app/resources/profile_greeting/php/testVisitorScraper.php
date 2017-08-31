<?php

// Testing VisitorScraper.php, not actually used anywhere important

include('VisitorScraper.php');

$visitorScraper = new VisitorScraper("l3ombyx2", false);
$visitor = $visitorScraper->getVisitor();
echo $visitor;

?>
